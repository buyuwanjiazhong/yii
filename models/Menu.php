<?php
namespace app\models;
use yii\db\ActiveRecord;
use Yii;
class Menu extends ActiveRecord
{
	public static function tableName()
	{
		return "menu";
	}
}