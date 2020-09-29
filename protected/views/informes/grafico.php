
<table id="resultadografico" style="font-size: 0.9em;background: #0078cc;border-collapse: collapse;width: 100%;border: 1px #D0E3EF solid;" >

<?php

//var_dump($resultados);

foreach ($resultados as $resultado) {
    $test[] = array($resultado['descripcion'], (int)$resultado['valor']);    
    
}


//var_dump($test);

     $this->widget('ext.highcharts.HighchartsWidget',array(
        'options' => array(
            'credits' => array('enabled' => false),   
            'chart' => array('renderTo' => 'grafico', 'width' => 900, 'height' => 600),
                'title' => array('text' => $titulo),
                'series' => array(array(
                        'type' => 'pie',
                        'data' => $test,
                ))
        	)
		));

?>

 <div id="grafico">

     </div>          

    </table>