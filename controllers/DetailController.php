<?php
namespace app\controllers;
use yii\web\Controller;
use Yii;
use app\models\Index;
use app\models\Menu;
use app\models\Zhichu;
class DetailController extends Controller
{	

	public function actionIncome()
	{
		$this->layout ="layout1";
		$income = Index::getIncome();
		$menu = Menu::find()->asArray()->all();
		
		return $this->render("income",['income' => $income, 'menu' => $menu]);
	}

	public function actionOutcome()
	{
		$this->layout ="layout1";
		$zhichu = Zhichu::find()->where('day_id = :did', [':did' => date("Ymd")])->asArray()->all();

		return $this->render("outcome",['zhichu' => $zhichu]);
	}
}