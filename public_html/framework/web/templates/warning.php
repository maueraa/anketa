<?php
return "
<?php
return array(
	'excludes'=>array('uz','lat'),
	'message'=>Yii::t(
		'strings',
		'Саҳифанинг {lng} тили бўйича таржимаси мавжуд эмас, ноқулайлик учун узр сўраймиз!!!',
		array('{lng}'=>Yii::app()->getLanguage())
	),
);
?>";
?>