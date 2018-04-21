<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Murodjon
 * Date: 16.02.18
 * Time: 15:12
 * To change this template use File | Settings | File Templates.
 */
$variant = Secglobal::model()->findByPk($var);
?>
<div class="span-5 last">
    <div id="sidebar">
        <?php
        foreach($model as $val)
        {
            echo "<p><a href='/students/sgcontent/$id?var=$val->id'>".Yii::t("strings",$val->title)."</a></p>";
        }
        ?>
    </div><!-- sidebar -->
</div>
<div class="span-18" style="float: right !important; ">
    <div id="content">
        <?php echo $variant->content; ?>
    </div><!-- content -->
</div>
