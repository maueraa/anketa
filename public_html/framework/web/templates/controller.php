<?php
return "
<?php

class ".ucfirst($this->cntlr)."Controller extends Controller
{
	public function actionIndex()
	{
		\$this->render('index');
	}

	public function actions()
	{
		return array(
			'articles'=>array(
				'class'=>'CViewAction',
				'viewParam'=>'topic',
				'basePath'=>'topics',
			),
		);
	}
}";
?>