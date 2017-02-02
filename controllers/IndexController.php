<?php
namespace app\controllers;
use yii\web\Controller;
use Yii;
use app\models\Index;
use app\models\Menu;
class IndexController extends Controller
{	
	public $enableCsrfValidation = false;//JavaScript提交文件时关闭csrf

	public function actionIndex()
	{	
		$this->layout = "layout1";
		$menu = Index::getMenu();
		$orders = Index::getOrder();
		$get_order_key = $orders['get_order_key'];
		unset($orders['get_order_key']);
		if (Yii::$app->request->get('order-id')){
			$get_order_key = Yii::$app->request->get('order-id');
		}
		
		$model = new Index;
		$order_info = $model->find()->where('day_id = :did and order_id = :oid',[":did" => date("Ymd"), ":oid" => $get_order_key])->asArray()->one();
		//var_dump($order_info);exit;
		return $this->render("index",['orders' => $orders, 'model' => $model, 'menus' => $menu, 'get_order_key' => $get_order_key, 'order_info' => $order_info]);
	}


	public function actionOutcome()
	{
		$this->layout = "layout1";
		$zhichu = Index::getOutcome();
		//print_r($zhichu);exit;
		return $this->render("outcome",['zhichu' => $zhichu]);
	}

	
	public function actionCreateorder()
	{
		$data = Index::createOrder();
		return $data;
		
	}
 

	public function actionTotalbill()
	{
		$status = Index::totalBill();
		return $status;
	}

	public function actionCreateoutcome()
	{
		$res = Index::createOutcome();
		return $this->redirect(['index/outcome']);
	}

	public function actionSavezhichu()
	{
		if (Yii::$app->request->isPost) {
			$res = Index::saveZhichu(Yii::$app->request->post());
			if ($res) {
				return $this->redirect(['index/outcome']);
			} else {
				return $this->redirect(['index/index']);
			}
		} else {
			return $this->redirect(['index/index']);
		}
	}

	public function actionDeletezhichu()
	{
		if (Yii::$app->request->isPost) {
			Index::deleteZhichu(Yii::$app->request->post());			
		} 

		return json_encode(['status' == 1]);
	}

	public function actionDeleteorder()
	{
		if (Yii::$app->request->isPost) {
			Index::deleteOrder(Yii::$app->request->post());			
		}
	}
}