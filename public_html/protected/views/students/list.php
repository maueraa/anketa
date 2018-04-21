<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Murodjon
 * Date: 09.03.18
 * Time: 10:09
 * To change this template use File | Settings | File Templates.
 */
foreach ($model as $student){
    $url=Yii::app()->createUrl("/students/ar/$student->id");
?>
<p><a href="<?=$url?>"><?="$student->lname $student->fname"?></a></p>
<?php
}