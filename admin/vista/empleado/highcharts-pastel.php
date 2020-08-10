<?php

include("HighCharts.php");

$chart = new HighChartsPie();

$chart->name = "Tipo";
$chart->colorByPoint = true;

//Inicializar datos
$chart->data = array();

$archivo = fopen('C:\Users\Gabriel Leonardo Chu\Documents\proyectoanalisisdatos-master\apiAnalisis\Datasets\DatasetBanco\3.DatasetBanco.csv', "r");
$contadorUnos = 0;
$contadorDos = 0;
while ($data = fgetcsv($archivo, 1000, ";")) {
    $num = count($data);
    if ($data[17] == '1') {
        $contadorUnos += 1;
    } else {
        $contadorDos += 1;
    }
}



//Agregar 20 Fresas
$chart_column = new Data();
$chart_column->name = "Buenos clientes";
$chart_column->y = $contadorUnos;
$chart_column->color = "#00FF00";
array_push($chart->data, $chart_column); //col1
//Agregar 5 Manzanas
$chart_column = new Data();
$chart_column->name = "Malos clientes";
$chart_column->y = $contadorDos;
$chart_column->color = "#FF0000";
$chart_column->sliced = true;
$chart_column->selected = true;
array_push($chart->data, $chart_column); //col1

echo json_encode($chart);
