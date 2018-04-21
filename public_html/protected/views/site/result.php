<h1><?=Yii::t("strings","Сўровномада қатнашганингиз учун ташаккур")?></h1>
<h1><?=Yii::t("strings","Сизнинг кўрсаткичларингиз")?>:</h1>
<div style="text-align: center;">
    <?php
    $active=0;
    $reflective=0;
    $sensing=0;
    $intuitive=0;
    $verbal=0;
    $visual=0;
    $sequencial=0;
    $global=0;
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
    $SG = Sgvariation::model()->find("student_id='$id'");
    if (is_object($SG)) $SP = SgPosibility::model()->find("posibility='$SG->sgvariation'");
    if (isset($SP) and is_object($SP))
    {$sequencial=3; $global=0.2;}
    else
    {$sequencial=0.2; $global=3;}


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
    ?>
</div>
<?php
$feedback = Feedback::model()->find("student_id='$id'");
if (!is_object($feedback)) $feedback = new Feedback();

if (!$feedbacksaved)
{
    ?>
<div class="form">

    <?php

    $form=$this->beginWidget('CActiveForm', array(
        'id'=>'feedback-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>

    <div class="row">
        <?=Yii::t("strings","Ҳурматли талаба, Сиз ҳақингиздаги ушбу маълумотлар қанчалик тўғри эканлигини ўз фикрингиз билан тасдиқлашингизни истаймиз")?>
        <?php echo $form->hiddenField($feedback,'student_id',array('value'=>$id)); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($feedback,'scale'); ?>
        <?php echo $form->dropDownList($feedback,'scale', array('1'=>"Тўғри",'2'=>"Нотўғри")); ?>
        <?php echo $form->error($feedback,'scale'); ?>
        <?php echo $form->labelEx($feedback,'comment'); ?>
        <?php echo $form->textArea($feedback,'comment', array('cols'=>103,'rows'=>5)); ?>
        <?php echo $form->error($feedback,'comment'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($feedback->isNewRecord ? Yii::t('strings','Қўшиш') : Yii::t('strings','Сақлаш')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<?php
}
else
    echo "Талабанинг шахсий фикри: $feedback->comment";
?>
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
?>