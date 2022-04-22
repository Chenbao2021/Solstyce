<canvas id="myChart4" style="width:100%;max-width:700px"></canvas>
<script type='text/javascript'>
    <?php 
        require_once './php/config.php';
            $list=[];
            $check=$bdd->prepare('select id,valeur from puissance');
            $check->execute();
            $data=$check->fetch();
            //Fetch permet d'obtenir le résultat suivant d'une rêquete .
            while($data!= false){                
                $list[]=array('x'=>"$data[0]" ,'y'=>"$data[1]");
                for($i=0;$i<30;$i++) $data=$check->fetch();
                $data=$check->fetch();
            }
            //Récupérer tous les résultats de la rêquete et de la sauvegarder dans $list
            $js_array = json_encode($list);
            echo "var js_array = ". $js_array . ";\n";
    ?>
    new Chart("myChart4", {
        type:'line',
        data: 
        {
        datasets: 
        [{
            label:"Puissance Jour",
            backgroundColor: "rgba(0,0,255,1.0)",
            borderColor: "rgba(0,0,255,0.1)",
            data: js_array
        }]
        },
        borderColor: "blue",
        options: {
            legend: {display: false},
            scales: {
                xAxes: [{ticks: {min: 0, max:2000}}],
                yAxes: [{ticks: {min: 0, max:1000}}],
            }
        }
    });
</script>

 