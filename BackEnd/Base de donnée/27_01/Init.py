import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="Solstyce",
  password="Solstcye2022",
   database="solstyce"
)


def read_to_list(ch):
	f = open(ch, "r")
	L = f.read().split(", ")
	R = [float(i) for i in L]
	return R
	
mycursor = mydb.cursor()




mycursor.execute("CREATE TABLE IF NOT EXISTS co2 (id INT AUTO_INCREMENT PRIMARY KEY, valeur DOUBLE)")
mycursor.execute("CREATE TABLE IF NOT EXISTS consomation (id INT AUTO_INCREMENT PRIMARY KEY, valeur DOUBLE)")
mycursor.execute("CREATE TABLE IF NOT EXISTS production (id INT AUTO_INCREMENT PRIMARY KEY, valeur DOUBLE)")
mycursor.execute("CREATE TABLE IF NOT EXISTS puissancejour (id INT AUTO_INCREMENT PRIMARY KEY, valeur DOUBLE)")




CO2_l = read_to_list("./data/Co2/2021-03-15.txt")
CONSO_l = read_to_list("./data/Consomation/2020-11-20.txt")
PROD_l = read_to_list("./data/Production/2021-03-15.txt")
PJOUR_l = read_to_list("./data/Puissance journaliere/2020-11-20.txt")

sql = "INSERT INTO co2 (valeur) VALUES (%s)"
for i in CO2_l:
	mycursor.execute(sql, (i,))
	mydb.commit()
	
		
sql = "INSERT INTO consomation (valeur) VALUES (%s)"
for i in CONSO_l:
	mycursor.execute(sql, (i,))
	mydb.commit()
	
	
sql = "INSERT INTO  production (valeur) VALUES (%s)"
for i in PROD_l:
	mycursor.execute(sql, (i,))
	mydb.commit()
	
	
sql = "INSERT INTO puissancejour (valeur) VALUES (%s)"
for i in PJOUR_l:
	mycursor.execute(sql, (i,))
	mydb.commit()
	
	
