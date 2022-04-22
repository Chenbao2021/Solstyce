import sys
import subprocess
import warnings

warnings.filterwarnings("ignore")

# Installation des bibliothèques nécessaires
subprocess.check_call([sys.executable, '-m', 'pip', 'install', 'pymodbus'], stdout=subprocess.DEVNULL, stderr= subprocess.STDOUT)
subprocess.check_call([sys.executable, '-m', 'pip', 'install', 'pyModbusTCP'], stdout=subprocess.DEVNULL, stderr= subprocess.STDOUT)
subprocess.check_call([sys.executable, '-m', 'pip', 'install', 'mysql-connector-python'], stdout=subprocess.DEVNULL, stderr= subprocess.STDOUT)
subprocess.check_call([sys.executable, '-m', 'pip', 'install', 'datetime'], stdout=subprocess.DEVNULL, stderr= subprocess.STDOUT)
subprocess.check_call([sys.executable, '-m', 'pip', 'install', 'requests'], stdout=subprocess.DEVNULL, stderr= subprocess.STDOUT)


# Importer les bibliothèques nécessaires
from pymodbus.constants import Endian
from pymodbus.payload import BinaryPayloadDecoder
from pyModbusTCP.client import ModbusClient
import datetime
import mysql.connector
from time import sleep
import requests


# Intialisation de la base de données
mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="root",
    database="comptes"
)
mycursor = mydb.cursor()

# Récupération des paramètres de connexion
mycursor.execute("SELECT * FROM modbus")
conf_modbus = mycursor.fetchall()


# Paramètres de connexion
IP_SM = conf_modbus[0][0]   # L'adresse IP du Smartlogger
PORT_SM = conf_modbus[0][1]    # Port du Smartlogger
ID_SM = conf_modbus[0][2]    # ID du SmartLogger
pas = 2  # Temps entre deux lectures des registres


# Creation des tables pour stocker les informations
mycursor.execute("CREATE TABLE IF NOT EXISTS co2 (id INT AUTO_INCREMENT PRIMARY KEY, valeur DOUBLE, date DATE, heure TIME)")
mycursor.execute("CREATE TABLE IF NOT EXISTS ejour (id INT AUTO_INCREMENT PRIMARY KEY, valeur DOUBLE, date DATE, heure TIME)")
mycursor.execute("CREATE TABLE IF NOT EXISTS puissance (id INT AUTO_INCREMENT PRIMARY KEY, valeur DOUBLE, date DATE, heure TIME)")
mycursor.execute("CREATE TABLE IF NOT EXISTS puissanceCon (id INT AUTO_INCREMENT PRIMARY KEY, valeur DOUBLE, date DATE, heure TIME)")
mycursor.execute("CREATE TABLE IF NOT EXISTS irradiance (id INT AUTO_INCREMENT PRIMARY KEY, valeur DOUBLE, date DATE, heure TIME)")


# Récupération des données des registres
mycursor.execute("SELECT * FROM modbussupplementaire WHERE dat = 'co2' ")
conf_co2 = mycursor.fetchall()
mycursor.execute("SELECT * FROM modbussupplementaire WHERE dat = 'energie_jour' ")
conf_ejour = mycursor.fetchall()
mycursor.execute("SELECT * FROM modbussupplementaire WHERE dat = 'puissance' ")
conf_ptotale = mycursor.fetchall()
mycursor.execute("SELECT * FROM modbussupplementaire WHERE dat = 'puissance_conso' ")
conf_pconso = mycursor.fetchall()

# Adresses des registres
CO2 = conf_co2[0][1]  # CO2 en kg
E_Jour = conf_ejour[0][1]    # Energie journalière en kWh
Puissance_Totale = conf_ptotale[0][1]  # Puissance totale en kW
Puissance_Conso = conf_pconso[0][1]  # Puissance consommée en kW
registres = [CO2, E_Jour, Puissance_Totale, Puissance_Conso]
registres_correction = [conf_co2[0][2], conf_ejour[0][2], conf_ptotale[0][2], conf_pconso[0][2]]
registres_decodage = [conf_co2[0][3], conf_ejour[0][3], conf_ptotale[0][3], conf_pconso[0][3]]
nombres_registres = [conf_co2[0][4], conf_ejour[0][4], conf_ptotale[0][4], conf_pconso[0][4]]
valeurs = [0] * 5
valeurs_registres = [0] * 4
was_opened = False


# Deux fonctions pour la date et l'heure des opérations
def Date_now():
    Date = datetime.date.today()
    return Date
def Time_now():
    Time = datetime.datetime.now().strftime("%H:%M:%S")
    return Time
# Fonction qui recupere des information sur la meteo
def requeteIrr ():
    params = (('include', 'minutely'), ('postal_code', '75000'), ('country', 'FR'), ('key', '416f15d5374a42a5a67e72a2cf38dae3'))
    response = requests.get('https://api.weatherbit.io/v2.0/current', params=params)
    return response


while True:

    # Connexion au SmartLogger en utilisant les paramètres déjà définis
    c = ModbusClient()
    c.host(IP_SM)
    c.port(PORT_SM)
    c.unit_id(ID_SM)

    if not c.is_open():
        if not c.open():
            print("Connexion impossible au serveur : "+ IP_SM +":"+str(PORT_SM))

    if c.is_open():
        if not was_opened:
            print("Connexion au Smartlogger réussie")
            was_opened = True

        # Récupérer les informations transmises par le smartlogger
        for i in range(len(registres)):
            valeurs_registres[i] = c.read_holding_registers(registres[i], nombres_registres[i])

            # Décoder les informations en nombres réels
            decoder = BinaryPayloadDecoder.fromRegisters(valeurs_registres[i], byteorder=Endian.Big)

            if registres_decodage[i] == "8bit":
                valeurs[i] = decoder.decode_8bit_int()
            elif registres_decodage[i] == "u8bit":
                valeurs[i] = decoder.decode_8bit_uint()
            elif registres_decodage[i] == "16bit":
                valeurs[i] = decoder.decode_16bit_int()
            elif registres_decodage[i] == "u16bit":
                valeurs[i] = decoder.decode_16bit_uint()
            elif registres_decodage[i] == "32bit":
                valeurs[i] = decoder.decode_32bit_int()
            elif registres_decodage[i] == "u32bit":
                valeurs[i] = decoder.decode_32bit_uint()
            elif registres_decodage[i] == "64bit":
                valeurs[i] = decoder.decode_64bit_int()
            elif registres_decodage[i] == "u64bit":
                valeurs[i] = decoder.decode_64bit_uint()


            valeurs[i] *= registres_correction[i]   # Correction des valeurs
        try:
            Irradiance = requeteIrr()
            parsed = Irradiance.json()
            valeurs[4] = parsed['data'][0]['solar_rad']
        except KeyError:
            mycursor.execute("SELECT valeur FROM irradiance WHERE id = (SELECT MAX(id) FROM irradiance)")
            conf_irr = mycursor.fetchall()
            valeurs[4] = conf_irr[0][0]

        # Enregistrer les données dans les tables
        date = Date_now() # recuperer la date
        time = Time_now() # recupere l'heure
        mycursor.execute("INSERT INTO co2 (valeur, date, heure) VALUES (%s , %s, %s)", (valeurs[0], date, time))
        mycursor.execute("INSERT INTO ejour (valeur, date, heure) VALUES (%s , %s, %s)", (valeurs[1], date, time))
        mycursor.execute("INSERT INTO puissance (valeur, date, heure) VALUES (%s , %s, %s)", (valeurs[2], date, time))
        mycursor.execute("INSERT INTO puissanceCon (valeur, date, heure) VALUES (%s , %s, %s)", (valeurs[3], date, time))
        mycursor.execute("INSERT INTO irradiance (valeur, date, heure) VALUES (%s , %s, %s)", (valeurs[4], date, time))
        mydb.commit()


    # Temporisation avant actualisation
    sleep(pas)