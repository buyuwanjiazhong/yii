<?php
namespace app\controllers;
use yii\web\Controller;
use Yii;
use app\models\Index;
use app\models\Menu;
use app\models\Zhichu;
use app\models\Year;
class YearController extends Controller
{	
	public function actionIndex()
	{
		$this->layout = "layout1";
		$month = $this->getMonth();
		return $this->render("index",['month' => $month]);
	}

	

	public function actionMonthincome()
	{
		$this->layout = "layout1";
		$month_id = Yii::$app->request->get('month_id');
		$monthIncome = $this->getMonthIncome($month_id);
		$menu = $this->getMenu();
		return $this->render("month_income",['month_id'=> $month_id, 'monthIncome' => $monthIncome, 'menu' => $menu]);
	}

	public function actionMonthoutcome()
	{
		$this->layout = "layout1";
		$month_id = Yii::$app->request->get('month_id');
		$monthOutcome = $this->getMonthOutcome($month_id);
		return $this->render("month_outcome",['month_id'=> $month_id, 'monthOutcome' => $monthOutcome]);
	}


	public function getMonth()
	{
		$month =date("m");
		$count = intval($month);
		$res = array();
		for($i = 0; $i < $count; $i++) {
			$mid = strval($i + 1);
			$res[$i]['month_id'] = "0".$mid;
		}

		return $res;
	}

	public function getMenu()
	{
		$menu = Menu::find()->asArray()->all();
		return $menu;
	}

	public function getMonthIncome($month_id)
	{
		$income = Index::find()->where("month_id = (:mid)",[':mid' => $month_id])->asArray()->all();

		$count = count($income);
		$c = 1;
		$day_income = array();

		for ($i = 0; $i < $count; $i++) {
			if (empty($day_income)) {
				$day_income[$c] = $income[$i];
				unset($day_income[$c]['id'],$day_income[$c]['month_id'],$day_income[$c]['order_id']);
				//print_r($day_income);exit;
				continue;
			}

			if ($day_income[$c]['day_id'] == $income[$i]['day_id']) {
					while(list($name, $value) = each($income[$i])) {
						if (!isset($day_income[$c][$name])) {
							continue;
						}
						$day_income[$c][$name] += $value;
						$day_income[$c]['day_id'] = $income[$i]['day_id'];
					}						
			}

			if ($day_income[$c]['day_id'] != $income[$i]['day_id']) {
				$day_income[++$c] = $income[$i];
				unset($day_income[$c]['id'],$day_income[$c]['month_id'],$day_income[$c]['order_id']);
				continue;
			}
		}

		return $day_income;
	}

	public function getMonthOutcome($month_id)
	{	
		$outcome = Zhichu::find()->where('month_id = (:mid)', [':mid' => $month_id])->asArray()->all();
		return $outcome;
	}
}