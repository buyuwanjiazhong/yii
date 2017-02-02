<?php
namespace app\controllers;
use yii\web\Controller;
use app\models\Backup;
use Yii;
class BackupController extends Controller
{	

	public function actionIndex()
	{
		$this->layout = "layout1";
		$backupInfo = $this->getBackupInfo();
		$lastBackup = $this->getLastBackup();

		return $this->render("index",['backupInfo' => $backupInfo, 'lastBackup' => $lastBackup]);
	}

	public function actionBackup()
	{
		return Backup::createBackup(Yii::$app->request->post());
	}

	public function getBackupInfo()
	{
		return Backup::backupInfo();
	}

	public function getLastbackup()
	{
		return Backup::lastBackup();
	}


	
}