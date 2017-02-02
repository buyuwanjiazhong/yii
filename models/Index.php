<?php
namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use app\models\Zhichu;
class Index extends ActiveRecord
{
	public static function tableName()
	{
		return "{{every_day}}";
	}


	public function saveAndUpdate($data){
		$post = $data;
		$model = Index::find()->where('day_id = :did and order_id = :oid',[":did" => $post['day_id'], ":oid" => $post['order_id']])->one();
		foreach ($post as $name => $value) {
			$model->$name = $value;
		}
		$model->save();
		return true;
	}


	public function getMenu()
	{
		$data = Menu::find()->asArray()->all();
		//var_dump($data);exit;
		$menu = array();
		foreach ($data as $list) {

			unset($list['id']);
			$menu[$list['en']] = $list;
			$menu[$list['en']]['price'] = round($menu[$list['en']]['price'],1);
			if (strlen($menu[$list['en']]['cn']) == 6) {
				$menu[$list['en']]['cn'] .= "&nbsp&nbsp&nbsp&nbsp";
			}
		}
		return $menu;
	}

	public function getOrder()
	{
		$model = new Index();
		$day_id = date("Ymd");
		$orders = $model->findBySql("SELECT order_id FROM every_day WHERE day_id={$day_id}")->asArray()->all();
		//print_r($orders);exit;
		$res = [];
		$count = count($orders);
		for($i = 0; $i < $count; $i++){
			$res[$i+1] = $orders[$i]['order_id']."单";
		}
		$res['get_order_key'] = $count;
		return $res;
	}

	public function createOrder()
	{
		$day_id = date("Ymd");
		$count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM every_day WHERE day_id={$day_id}")->queryScalar();
		if(Yii::$app->request->isPost){
			$post = Yii::$app->request->post();
			Yii::$app->db->createCommand()->insert('every_day', [
				'month_id' =>date("m"),
    			'day_id' => date("Ymd"),
    			'order_id' => $count+1,
			])->execute();
			$data = ['status' => 1];
		}else{
			$data = ['status' => 0];
		}
		return json_encode($data);
	}

	public function totalBill()
	{
		$post = yii::$app->request->post();
		$post['day_id'] = date("Ymd");
		if (Index::saveAndUpdate($post)) {
			$status = ['status' => 1];
			return json_encode($status);
		}
	}


	public function getIncome()
	{
		$data = Index::find()->where('day_id = :did',[":did" => date("Ymd")])->asArray()->all();
		return $data;
	}

	public function createOutcome()
	{	
		$day_id = date("Ymd");
		$zhichuModel = new Zhichu();
		$z_id = $zhichuModel->find()->select('zhichu_id')->orderBy('id DESC')->limit(1)->asArray()->one();
		if (!$z_id['zhichu_id']) {
			$z_id['zhichu_id'] = 1;
		} else {
			$z_id['zhichu_id'] += 1;
		}
		$zhichuModel->day_id = $day_id;
		$zhichuModel->month_id = date("m");
		$zhichuModel->zhichu_id = $z_id['zhichu_id'];
		if ($zhichuModel->save()) {
			$status = ['status' => 1];
		} else {
			$status = ['status' => 0];
		}
		return json_encode($status);
	}

	public function getOutcome()
	{
		$day_id = date("Ymd");
		$outcome = Zhichu::find()->where("day_id = :did",[':did' => $day_id])->asArray()->all();
		return $outcome;
	}

	public function saveZhichu($post)
	{
		foreach ($post as $save) {
			$model = Zhichu::find()->where('zhichu_id = :zid',[":zid" => $save['zhichu_id']])->one();
			foreach ($save as $name => $value){
				$model->$name = $value;
			}
			$model->save();
		}
		return true;
	}

	public function deleteZhichu($post)
	{
		$rtn = Yii::$app->db->createCommand('DELETE FROM zhichu WHERE zhichu_id = (:zid)', [':zid' => $post['zhichu_id'],])->execute();
		
		return true;
	}

	public function deleteOrder($post)
	{
		$rtn = Yii::$app->db->createCommand('DELETE FROM every_day WHERE order_id = (:rid) and day_id = (:did)', [':rid' => $post['order_id'], ':did' => $post['day_id']])->execute();
	}
}