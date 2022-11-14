<?php

/**
 * This is the model class for table "ctgory".
 *
 * The followings are the available columns in table 'ctgory':
 * @property integer $id
 * @property string $title
 */
class Ctgory extends CActiveRecord
{	
	public function tableName()
	{
		return 'ctgory';
	}
	
	public function rules()
	{		
		return array(
			array('title', 'required'),
			array('title', 'length', 'max'=>55),
			
			array('id, title', 'safe', 'on'=>'search'),
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
                        			'title' => Yii::t("translation", "title"),
		);
	}
	
	public function search()
	{		
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
