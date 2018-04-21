<?php
$feedback = Feedback::model()->findAll('scale=1');
$fright=is_array($feedback)?count($feedback):0;
$feedback = Feedback::model()->findAll('scale=2');
$fwrong=is_array($feedback)?count($feedback):0;
unset($feedback);

?>
<center><?=Yii::t("strings","Ўз фикрини қолдирган талабалар")?>:</center>
<div style="text-align: center;">
    <?php
    $this->widget(
        'chartjs.widgets.ChDoughnut',
        array(
            'width' => 600,
            'height' => 200,
            'htmlOptions' => array(),
            'drawLabels' => true,
            'datasets' => array(
                array(
                    "value" => $fright,
                    "color" => "rgba(0,180,0,1)",
                    "fcolor"=> "rgba(0,0,0,1)",
                    "label" => Yii::t("strings","Тўғри: $fright та")
                ),
                array(
                    "value" => $fwrong,
                    "color" => "rgba(255,0, 0,1)",
                    "fcolor"=> "rgba(255,255,0,1)",
                    "label" => Yii::t("strings","Нотўғри: $fwrong та")
                ),
            ),
            'options' => array()
        )
    );
    ?>
</div>
<br>
<?php

$student=Students::model()->findAll();
foreach($student as $student)
{
    $model=Check::model()->findAll("student_id='$student->id'");
    $active=0;
    $reflective=0;
    $sensing=0;
    $intuitive=0;
    $verbal=0;
    $visual=0;
    $sequencial=0;
    $global=0;

    $SG = Sgvariation::model()->find("student_id='$student->id'");
    if (is_object($SG)) $SP = SgPosibility::model()->find("posibility='$SG->sgvariation'");
    if (isset($SP) and is_object($SP))
    {$sequencial=3; $global=0.2;}
    else
    {$sequencial=0.2; $global=3;}
    if ($student->sg=="") {$student->sg=($sequencial==3)?-1:1; $student->save();}
    ?>
<h1><?=Yii::t("strings","{name}нинг кўрсаткичлари",array('{name}'=>Yii::t("strings","{$student->lname} {$student->fname}")))?>:</h1>
<div style="text-align: center;">
    <style>
        .dimensions{border-collapse: collapse;}
        .dimensions td, .dimensions th{ border: 1px solid #d3d3d3; text-align: center;}
    </style>
    <table style="width: 100%;" class="dimensions">
        <tr>
            <th>Dimensions</th>
            <th>
                Active/Reflective
            </th>
            <th>
                Sensing / Intuitive
            </th>
            <th>
                Verbal / Visual
            </th>
            <th>
                Sequencial / Global
            </th>
        </tr>
        <tr>
            <th>Values</th>
            <th>
                <?=$student->ar?>
            </th>
            <th>
                <?=$student->si?>
            </th>
            <th>
                <?=$student->vv?>
            </th>
            <th>
                <?=$student->sg?>
            </th>
        </tr>
    </table>

    <?php
    foreach($model as $value){
        switch ($value->variation_id){
            case 1:
            case 2:
            case 3:
                $active+=($value->measure_type=="+")?1:0;
                $reflective+=($value->measure_type=="-")?1:0;
                break;
            case 4:
            case 5:
            case 6:
                $intuitive+=($value->measure_type=="+")?1:0;
                $sensing+=($value->measure_type=="-")?1:0;
                break;
            case 7:
            case 8:
            case 9:
                $visual+=($value->measure_type=="+")?1:0;
                $verbal+=($value->measure_type=="-")?1:0;
                break;
        }
    }


    /**
    $active=1;
    $reflective=2;
    $sensing=3;
    $intuitive=4;
    $verbal=5;
    $visual=6;
    $sequencial=7;
    $global=8;

    /**/
    $this->widget(
        'chartjs.widgets.ChBars',
        array(
            'width' => 700,
            'height' => 150,
            'htmlOptions' => array(),
            'labels' => array(
                Yii::t("strings","Active / Reflective"),
                Yii::t("strings","Intuitive / Sensing"),
                Yii::t("strings","Visual / Verbal"),
                Yii::t("strings","Global / Sequencial")
            ),
            'datasets' => array(
                array(
                    "fillColor" => "#1dcc7f",
                    "strokeColor" => "rgba(220,220,220,1)",
                    "data" => array($active, $intuitive, $visual, $global),
                ),
                array(
                    "fillColor" => "#ff00ff",
                    "strokeColor" => "rgba(220,220,220,1)",
                    "data" => array($reflective, $sensing, $verbal, $sequencial,3),
                )

            ),
            'options' => array()
        )
    );
    /**/
    ?>
</div>

<?php
    /**
    $this->widget(
    'chartjs.widgets.ChRadar',
    array(
    'width' => 910,
    'height' => 500,
    'htmlOptions' => array(),
    'labels' => array(
    Yii::t("strings","Active / Reflective"),
    Yii::t("strings","Intuitive / Sensing"),
    Yii::t("strings","Visual / Verbal"),
    Yii::t("strings","Global / Sequencial")
    ),
    'datasets' => array(
    array(
    "fillColor" => "rgba(255,00,255,0.5)",
    "strokeColor" => "rgba(220,220,220,1)",
    "pointColor" => "rgba(0,0,255,1)",
    "pointStrokeColor" => "#000",
    "data" => array($sensing*10, $verbal*10, $sequencial*10, $active*10),
    ),
    array(
    "fillColor" => "#1dcc7f88",
    "strokeColor" => "rgba(220,220,220,1)",
    "pointColor" => "rgba(220,220,220,1)",
    "pointStrokeColor" => "#ffffff",
    "data" => array($reflective*10, $intuitive*10, $visual*10, $global*10),
    ),
    array("data"=>array(0)),
    ),
    'options' => array()
    )
    );
    /**/
}
?>
