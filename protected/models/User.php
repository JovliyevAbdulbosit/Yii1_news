<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $role
 * @property integer $status
 * @property string $create_time
 * @property string $update_time
 * @property string $authorization_time
 * @property string $name
 * @property string $surname
 * @property string $phone
 * @property string $lang
 * @property string $recover_password
 * @property string $image
 */
class User extends CActiveRecord
{	
	public function tableName()
	{
		return 'user';
	}
	
	public function rules()
	{		
		return array(
			array('email, password, create_time', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('email, password, name, surname, phone, recover_password', 'length', 'max'=>255),
			array('role, image', 'length', 'max'=>45),
			array('lang', 'length', 'max'=>2),
			array('update_time, authorization_time', 'safe'),
			
			array('id, email, password, role, status, create_time, update_time, authorization_time, name, surname, phone, lang, recover_password, image', 'safe', 'on'=>'search'),
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
                        			'email' => Yii::t("translation", "email"),
                        			'password' => Yii::t("translation", "password"),
                        			'role' => Yii::t("translation", "role"),
                        			'status' => Yii::t("translation", "status"),
                        			'create_time' => Yii::t("translation", "create_time"),
                        			'update_time' => Yii::t("translation", "update_time"),
                        			'authorization_time' => Yii::t("translation", "authorization_time"),
                        			'name' => Yii::t("translation", "name"),
                        			'surname' => Yii::t("translation", "surname"),
                        			'phone' => Yii::t("translation", "phone"),
                        			'lang' => Yii::t("translation", "lang"),
                        			'recover_password' => Yii::t("translation", "recover_password"),
                        			'image' => Yii::t("translation", "image"),
		);
	}
	
	public function search()
	{		
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('authorization_time',$this->authorization_time,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('lang',$this->lang,true);
		$criteria->compare('recover_password',$this->recover_password,true);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
