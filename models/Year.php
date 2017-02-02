<?php
namespace app\models;
use yii\db\ActiveRecord;
use Yii;
class Year extends ActiveRecord
{
	public static function tableName()
	{
		return "zongbiao";
	}
}