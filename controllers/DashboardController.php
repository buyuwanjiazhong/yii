<?php
namespace app\controllers;
use yii\web\Controller;
class DashboardController extends Controller
{	
	public function actionIndex()
	{
		$this->layout = "layout1";
		return $this->render("index");
	}
}