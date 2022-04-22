<canvas id="myChart" style="width:100%;max-width:700px"></canvas>
<script type='text/javascript'>
    <?php 
        require_once './php/config.php';
            $list=[];
            $check=$bdd->prepare('select id,valeur from co2');
            $check->execute();
            $data=$check->fetch();
            //Fetch permet d'obtenir le résultat suivant d'une rêquete .
            while($data!= false){
                $list[]=array('x'=>"$data[0]" ,'y'=>"$data[1]");
                $data=$check->fetch();
            }
            //Récupérer tous les résultats de la rêquete et de la sauvegarder dans $list
            $js_array = json_encode($list);
            echo "var js_array = ". $js_array . ";\n";
    ?>
    console.log("123");
    console.log(js_array);
    new Chart("myChart", {
        type: "scatter",
        data: 
        {
        datasets: 
        [{
            label:"CO2",
            pointRadius: 4,
            pointBackgroundColor: "rgb(0,0,255)",
            data: js_array
        }]
        },
        borderColor: "blue",
        options: {
            legend: {display: false},
            scales: {
                xAxes: [{ticks: {min: 0, max:200}}],
                yAxes: [{ticks: {min: 0, max:50000}}],
            }
        }
    });
</script>

 