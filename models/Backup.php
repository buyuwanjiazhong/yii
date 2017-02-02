<?php
namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use app\models\Zhichu;
class Backup extends ActiveRecord
{
	public static function tableName()
	{
		return "backup";
	}

	public function backupInfo()
	{
		$backup = Backup::find()->orderBy("id DESC")->limit(10)->asArray()->all();
		return $backup;
	}

	public function createBackup($post)
	{	

		$incomeStop = Backup::saveIncomeData();
		
		$outcomeStop = Backup::saveOutcomeData();		
		

		$model = new Backup();
		$model->day_id = $incomeStop['day_id'];
		$model->order_id = $incomeStop['order_id'];
		$model->zhichu_id = $outcomeStop['zhichu_id'];
		$model->create_time = time();
		if ($model->save()) {
			return json_encode(['status' => 1]);
		}
			return json_encode(['status' => 0]);	
	}



	public function lastBackup()
	{
		return Backup::find()->orderBy("id DESC")->asArray()->one();
		
	}


	public function getSavePoint()
	{
		$savePoint = Backup::find()->orderBy("id DESC")->limit(1)->asArray()->one();
		if (empty($savePoint)) {
			$firstPoint = Yii::$app->db->createCommand("SELECT * FROM every_day ORDER BY id LIMIT 1")->queryAll();
			$savePoint = $firstPoint[0];
		}
		return $savePoint;
	}

	public function getSaveData($point)
	{	
		$day_id = $point['day_id'];
		
		$save = Yii::$app->db->createCommand("SELECT * FROM every_day WHERE day_id >= $day_id")->queryAll();
		return $save;
	}


	public function makeSaveSql($s)
	{
		$columns = array_keys($s);
		$columns = array_map('addslashes',$columns);
		$columns = join('`,`',$columns);
		$columns = '`'.$columns.'`';
		
		$values = array_values($s);
		$values = array_map('addslashes',$values);
		$values = join("','",$values);
		$values = "'".$values."'";
		return "INSERT INTO `every_day`($columns) VALUES($values);\r\n";
	}

	public function writeInFile($filename,$saveSql) 
	{	
		$fp = file_put_contents($filename,$saveSql);
	}
			
	public function saveIncomeData()
	{
		$savePoint = Backup::getSavePoint();
		$saveData = Backup::getSaveData($savePoint);

		$saveSql = "";
		$saveStart = $saveData[0];
		$dataCount = count($saveData);
		$saveStop = $saveData[$dataCount - 1];

		foreach ($saveData as $s) {	
			
			if ($saveStart['day_id'] == $s['day_id']) {
				$saveSql .= Backup::makeSaveSql($s);
			}

			if ($saveStart['day_id'] != $s['day_id']) {
				$filename = "../sqlBackup/income/".date("m")."/".$saveStart['day_id'].".sql";
				Backup::writeInFile($filename,$saveSql);
				$saveStart = $s;
				$saveSql = "";
				$saveSql .= Backup::makeSaveSql($s);
			}
		}

	    $filename = "../sqlBackup/income/".date("m")."/".$saveStart['day_id'].".sql";
		Backup::writeInFile($filename,$saveSql);

		return $saveStop;
	}

	public function saveOutcomeData()
	{
		$savePoint = Backup::find()->orderBy("id DESC")->limit(1)->asArray()->one();
		if (empty($savePoint)) {
			$savePoint['zhichu_id'] = 0;
		}
		$zhichu_id = $savePoint['zhichu_id'];

		$outCome = Yii::$app->db->createCommand("SELECT * FROM zhichu WHERE zhichu_id > $zhichu_id")->queryAll();
		
		if (empty($outCome)) {
			$outStop['zhichu_id'] = $zhichu_id;
			return $outStop;
		}

		$countOut = count($outCome);
		$outStop = $outCome[$countOut - 1];
		
		$outSql = "";
		foreach ($outCome as $out) {
			$outSql .= Backup::makeSaveSql($out);
		}
		$filename = "../sqlBackup/outcome/".date("m")."/".date("His").".sql";
		Backup::writeInFile($filename,$outSql);
		
		return $outStop;
	}
	
}