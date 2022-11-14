<?php

/**
 * This is the model class for table "auth".
 *
 * The followings are the available columns in table 'auth':
 * @property integer $id
 * @property string $full_name
 */
class Auth extends CActiveRecord
{	
	public function tableName()
	{
		return 'auth';
	}
	
	public function rules()
	{		
		return array(
			array('full_name', 'required'),
			array('full_name', 'length', 'max'=>55),
			
			array('id, full_name', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{		
		return array(
		);
	}
	
	public function attributeLabels()
	{
		return array(
                        			'id' => Yii::t("translation", "id"),
                        			'full_name' => Yii::t("translation", "full_name"),
		);
	}
	
	public function search()
	{		
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('full_name',$this->full_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
