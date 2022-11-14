<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property string $title
 * @property integer $ctgory_id
 * @property integer $auth_id
 * @property string $news_text
 * @property string $image
 */
class News extends CActiveRecord {

    public $imageFile;
   
    public function tableName() {
        return 'news';
    }

    public function rules() {
        return array(
            array('title, ctgory_id, auth_id, news_text', 'required'),
            array('ctgory_id, auth_id', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 55),
            array('image', 'length', 'max' => 200),
            array('imageFile', 'file', 'types' => 'jpg, gif, png', 'safe' => false),
            array('id, title, ctgory_id, auth_id, news_text, image', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t("translation", "id"),
            'title' => Yii::t("translation", "title"),
            'ctgory_id' => Yii::t("translation", "ctgory"),
            'auth_id' => Yii::t("translation", "auth"),
            'news_text' => Yii::t("translation", "news_text"),
            'image' => Yii::t("translation", "image"),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('ctgory_id', $this->ctgory_id);
        $criteria->compare('auth_id', $this->auth_id);
        $criteria->compare('news_text', $this->news_text, true);
        $criteria->compare('image', $this->image, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function upload() {
        if ($this->validate()) {
            $this->imageFile->saveAs($this->image);
            
            return true;
        } else {
            return false;
        }
    }
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
