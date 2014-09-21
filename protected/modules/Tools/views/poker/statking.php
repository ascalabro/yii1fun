<?php
/* @var $this PokerController */

$this->breadcrumbs = array(
    $this->module->id => array('/' . $this->module->id . '/Categories'),
    'Poker' => array('/' . $this->module->id . '/' . $this->id),
    $this->pageTitle
);
?>
<div class="row">
    <?php
    $this->widget(
            'chartjs.widgets.ChLine', 
            array(
                'width' => 950,
                'height' => 700,
                'htmlOptions' => array(),
                'labels' => $months,
                'datasets' => array(
                    array(
                        "fillColor" => "rgba(220,220,220,0.5)",
                        "strokeColor" => "rgba(220,220,220,1)",
                        "pointColor" => "rgba(220,220,220,1)",
                        "pointStrokeColor" => "#ffffff",
                        "data" => $sessions,
                        "label" => "first data set"
                    ),
//                    array(
//                        "fillColor" => "rgba(220,220,220,0.5)",
//                        "strokeColor" => "rgba(220,220,220,1)",
//                        "pointColor" => "rgba(220,220,220,1)",
//                        "pointStrokeColor" => "#ffffff",
//                        "data" => array(55, 50, 45, 30, 20, 10)
//                    )      
                ),
                'options' => array(
                    "pointDot" => true,
                    "pointDotRadius" => 2,
                    "legendTemplate" => "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
                    "pointHitDetectionRadius" => 10,
                    "bezierCurve" => true,
                    "scaleOverride" => true,
                    "scaleSteps" => $max / ($max * .015),
                    "scaleStepWidth" =>  250/*Math.ceil(max / steps)*/,
                    "scaleStartValue" => -1000,
                    "tooltipTemplate" => "<%if (label){%><%=label%>\n<%}%>$<% if (value > 0){%>+<%}%><%= value %>"
                )
            )
        ); 
    ?>
</div>
<div class="row">
    <?php echo CHtml::link("Upload new .csv database", "statkingimport"); ?>
</div>
<?php
Yii::app()->clientScript->registerScript('charter', "
//$('body').append(chart.generateLegend());
", CClientScript::POS_READY);