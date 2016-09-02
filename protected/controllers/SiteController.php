<?php

class SiteController extends Controller {

    public function actionIndex() {

		if(Yii::app()->user->isGuest)
			$this->redirect(array('site/login'));
		$modelDAU=new RealisasiFisikDanKeuanganDauDpa('skpdPelaporBulanIni');
		$modelDAK=new RealisasiFisikDanKeuanganDakDpa('skpdPelaporBulanIni');
		$modelEvaluasiRkpd=new EvaluasiRkpd('skpdPelaporBulanIni');
			$this->render('index',array('modelDAU'=>$modelDAU,'modelDAK'=>$modelDAK,'modelEvaluasiRkpd'=>$modelEvaluasiRkpd));
    }
	public function actionLogin()
	{
		//$this->redirect(Yii::app()->homeUrl);
		$this->layout='//layouts/login';
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
    public function actionWidgets() {
        $this->render('pages/widgets');
    }

    public function actionMorris() {
        $this->render('pages/charts/morris');
    }
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	public function actionError()
	{
		$this->layout='//layouts/column2';
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

}