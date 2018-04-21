<?php

class StudentsController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column1';
    public $addmenu="";
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
        );
    }

    /**
     * @return array action filters
     */
    /**/
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    /**/
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('view','create','update','delet','index','reflective','detail','active','test','ar','si','intuitive','sensing','vv','vvcheck','visual','verbal','sg','sgcontent','list'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('up'),
                'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete'),
                'users'=>array('admin'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('results'),
                'users'=>array('ilmiyor'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->layoutTitle=Yii::t('strings','Operations');
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $this->layout='//layouts/column1';
        $this->layoutTitle=Yii::t('strings','Operations');
        $model=new Students;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Students']))
        {
            $model->attributes=$_POST['Students'];
            $model->regdate=date("Y-m-d");
            //$model->password=md5($model->password);
            if($model->save())
                $this->redirect(array('/students/ar','id'=>$model->id));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $this->layoutTitle=Yii::t('strings','Operations');
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Students']))
        {
            $model->attributes=$_POST['Students'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->layoutTitle=Yii::t('strings','Operations');
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        /**
        $this->layoutTitle=Yii::t('strings','Operations');
        $dataProvider=new CActiveDataProvider('Students');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
        /**/
        $this->redirect(array('students/create'));
    }
    public function actionReflective($id,$vt=0)
    {
        $this->layout='//layouts/column1';
        $model = $this->loadModel($id);
        $model->ar=$model->ar-1;
        if ($model->save()){
            if ($vt!=0)
            {
                $mod = new Check;
                $mod->student_id=$id;
                $mod->variation_id=$vt;
                $mod->measure_type="-";
                if ($mod->save())
                    $this->redirect(array('/students/detail','id'=>$mod->id));
            }
        }

    }
    public function actionDetail($id){
        $model=Check::model()->findByPk($id);
        $variant=Variation::model()->findByPk($model->variation_id);
        if ($variant->id==3)
            $this->redirect(array('/students/si','id'=>$model->student_id));
        else
            $this->render('detail',array('id'=>$id, 'model'=>$model, 'variant'=>$variant));
    }

    public function actionActive($id,$vt=0)
    {
        $this->layout='//layouts/column1';
        $model = $this->loadModel($id);
        $model->ar=$model->ar+1;
        if ($model->save())
        {
            if ($vt!=0)
            {
                $mod = new Check;
                $mod->student_id=$id;
                $mod->variation_id=$vt;
                $mod->measure_type="+";
                if ($mod->save())
                    $this->redirect(array('/students/test','id'=>$mod->id));
            }
        }
    }
    public function actionTest($id){
        $model=Check::model()->findByPk($id);
        if (isset($_POST['Comments'])){
            $comment = new Comments();
            $comment->student_id=$model->student_id;
            $comment->comment=$_POST['Comments']['comment'];
            if ($comment->save()) $this->redirect(array('/students/si','id'=>$model->student_id));
            //echo "<pre>"; print_r($_POST);exit;
        }
        $variant=Variation::model()->findByPk($model->variation_id);
        $this->render('test',array('id'=>$id, 'model'=>$model, 'variant'=>$variant));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $this->layoutTitle=Yii::t('strings','Operations');
        $model=new Students('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Students']))
            $model->attributes=$_GET['Students'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Students the loaded model
     * @throws CHttpException
     */
    public function loadModel($id,$class="Students")
    {
        $model=Students::model($class)->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Students $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='students-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionAr($id){
        $this->layout='//layouts/column1';
        $model = Variation::model()->findAll("check_type=1 and not(id in (select variation_id from tbl_check where student_id='$id'))");
        if (count($model))
            $this->render('ar',array('id'=>$id, 'model'=>$model));
        else
            $this->redirect(array('si','id'=>$id));
    }

    public function actionSi($id){
        //$this->layout='//layouts/column1';
        $model = Variation::model()->findAll("check_type=2 and not(id in (select variation_id from tbl_check where student_id='$id'))");
        if (count($model))
            $this->render('si',array('id'=>$id, 'model'=>$model));
        else
            $this->redirect(array('vv','id'=>$id));
    }
    public function actionIntuitive($id,$vt=0)
    {
        $this->layout='//layouts/column1';
        $model = $this->loadModel($id);
        $model->si=$model->si+1;
        if ($model->save())
        {
            if ($vt!=0)
            {
                $mod = new Check;
                $mod->student_id=$id;
                $mod->variation_id=$vt;
                $mod->measure_type="+";
                if ($mod->save())
                {
                    if ($vt==4)
                        $this->redirect(array('/students/vv','id'=>$id));
                    else
                        $this->redirect(array('/students/test','id'=>$mod->id));
                }
            }
        }
    }
    public function actionSensing($id,$vt=0)
    {
        $this->layout='//layouts/column1';
        $model = $this->loadModel($id);
        $model->si=$model->si-1;
        if ($model->save()){
            if ($vt!=0)
            {
                $mod = new Check;
                $mod->student_id=$id;
                $mod->variation_id=$vt;
                $mod->measure_type="-";
                if ($mod->save())
                {
                    if ($vt==4)
                        $this->redirect(array('/students/vv','id'=>$id));
                    else
                        $this->redirect(array('/students/detail','id'=>$mod->id));
                }
            }
        }

    }
    public function actionVv($id){
        //$this->layout='//layouts/column1';
        $model = Variation::model()->findAll("check_type=3 and not(id in (select variation_id from tbl_check where student_id='$id'))");
        if (count($model))
            $this->render('vv',array('id'=>$id, 'model'=>$model));
        else
            $this->redirect(array('sg','id'=>$id));
    }
    public function actionVvcheck($id,$vt=0)
    {
        if (!empty($_POST))
        {
            if ($_POST['test1']=='visual')
            {
                $model = $this->loadModel($id);
                $model->vv=$model->vv+1;
                if ($model->save())
                {
                    if ($vt!=0)
                    {
                        $mod = new Check;
                        $mod->student_id=$id;
                        $mod->variation_id=$vt;
                        $mod->measure_type="+";
                        $mod->save();
                    }
                }
            }
            else
            {
                $model = $this->loadModel($id);
                $model->vv=$model->vv-1;
                if ($model->save())
                {
                    if ($vt!=0)
                    {
                        $mod = new Check;
                        $mod->student_id=$id;
                        $mod->variation_id=$vt;
                        $mod->measure_type="-";
                        $mod->save();
                    }
                }
            }
            if ($_POST['test2']=='visual')
            {
                $model = $this->loadModel($id);
                $model->vv=$model->vv+1;
                if ($model->save())
                {
                    if ($vt!=0)
                    {
                        $mod = new Check;
                        $mod->student_id=$id;
                        $mod->variation_id=$vt;
                        $mod->measure_type="+";
                        $mod->save();
                    }
                }
            }
            else
            {
                $model = $this->loadModel($id);
                $model->vv=$model->vv-1;
                if ($model->save())
                {
                    if ($vt!=0)
                    {
                        $mod = new Check;
                        $mod->student_id=$id;
                        $mod->variation_id=$vt;
                        $mod->measure_type="-";
                        $mod->save();
                    }
                }
            }
            $this->redirect(array('/students/ar','id'=>$id));
        }
        $variant = Variation::model()->findByPk($vt);
        $this->render('vvcheck',array('variant'=>$variant,'id'=>$id));
    }
    public function actionVisual($id,$vt=0)
    {
        $this->layout='//layouts/column1';
        $model = $this->loadModel($id);
        $model->vv=$model->vv+1;
        if ($model->save())
        {
            if ($vt!=0)
            {
                $mod = new Check;
                $mod->student_id=$id;
                $mod->variation_id=$vt;
                $mod->measure_type="+";
                if ($mod->save())
                    $this->redirect(array('/students/test','id'=>$mod->id));
            }
        }
    }
    public function actionVerbal($id,$vt=0)
    {
        $this->layout='//layouts/column1';
        $model = $this->loadModel($id);
        $model->vv=$model->vv-1;
        if ($model->save()){
            if ($vt!=0)
            {
                $mod = new Check;
                $mod->student_id=$id;
                $mod->variation_id=$vt;
                $mod->measure_type="-";
                if ($mod->save())
                    $this->redirect(array('/students/detail','id'=>$mod->id));
            }
        }

    }

    public function actionSg($id){
        //$this->layout='//layouts/column1';
        $model = Secglobal::model()->findAll();
        if (count($model))
            $this->render('sg',array('id'=>$id, 'model'=>$model));
    }
    public function actionSgcontent($id,$var=0){

        if ($var!=0){
            $stg = Sgvariation::model()->find("student_id=$id");
            if (!is_object($stg)) $stg = new Sgvariation();
            $stg->student_id=$id;
            if (strlen($stg->sgvariation)<4) {
                $stg->sgvariation.=$var;
                if (strlen($stg->sgvariation)==4)
                    $this->addmenu=array('label'=>Yii::t('strings','Шахсий натижани кўриш'), 'url'=>array("/site/result/$id"));
            }
            else
                $this->addmenu=array('label'=>Yii::t('strings','Шахсий натижани кўриш'), 'url'=>array("/site/result/$id"));
            $stg->save();
        }
        $model = Secglobal::model()->findAll();
        if (count($model))
            $this->render('sgvariant',array('id'=>$id, 'model'=>$model, 'var'=>$var));
    }
    public function actionResults(){
        $this->render('results');

    }
    public function actionList(){
        $model=Students::model()->findAll('true order by lname');
        $this->render('list',array('model'=>$model));

    }
}
