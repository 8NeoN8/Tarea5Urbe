<?php

    $query = "SELECT * FROM measures ORDER BY date_measured DESC";
    $result_values = mysqli_query($conn, $query);

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['','Valor Medido'],
                <?php
                
                    if(mysqli_num_rows($result_values)>0){

                        while($row = mysqli_fetch_array($result_values)){
                            echo "['".$row['date_measured']."',"; echo $row['value_measured']."],";
                        }

                    }
                ?>
                ]);
            
            var options = {
                chart: {
                    title: 'Historico de registros',
                    subtitle: 'Presion en los pozos de petroleo',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
</script>