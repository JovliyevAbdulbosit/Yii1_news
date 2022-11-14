<?php

/**
 * This is the model class for table "posts".
 *
 * The followings are the available columns in table 'posts':
 * @property integer $id
 * @property string $image
 */
class Posts extends CActiveRecord {

    public function tableName() {
        return 'posts';
    }

    public function rules() {
        return array(
            array('id', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t("translation", "id"),
            'image' => Yii::t("translation", "image"),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('image', $this->image, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

   public function behaviors() {
        return array(
            'uploadableFile' => array(
                'class' => 'application.components.UploadableImageBehavior',
                'savePathAlias' => 'webroot.upload_file.' . $this->tableName(),
                'allowEmpty' => TRUE
            )
        );
    }

}
