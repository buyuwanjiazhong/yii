<?php
namespace app\controllers;
use yii\web\Controller;
use Yii;
use app\models\Menu;
class MenuController extends Controller
{	
	public function actionIndex()
	{
		$this->layout = "layout1";
		$menu = $this->getMenu();
		return $this->render("menu",['menu' => $menu]);
	}

	public function actionAddindex()
	{
		$this->layout = "layout1";
		return $this->render("addindex");
	}

	public function getMenu()
	{
		$menu = Menu::find()->asArray()->all();
		return $menu;
	}
}