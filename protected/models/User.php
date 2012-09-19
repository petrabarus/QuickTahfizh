<?php

/**
 * This is the model class for table "Users".
 *
 * The followings are the available columns in table 'Users':
 * 
 * @property int $id the ID of the user's record in the database.
 * @property string $username the user's handle name.
 * @property string $fullName user's full name.
 * @property string $email user's email address.
 * 
 * @author Petra Barus <petra.barus@gmail.com>
 * @package application.models
 */
class User extends \CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'Users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
          array('username', 'match', 'pattern' => '/^[a-zA-Z][a-zA-Z0-9_]+$/', 'message' => Yii::t('rules', '{attribute} is invalid. Only alphabet, number, and underscore allowed')),
          array('username, fullName, email', 'required'),
          array('username', 'length', 'max' => 64, 'min' => 5),
          array('email', 'email'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
          'id' => Yii::t('label', 'ID'),
          'username' => Yii::t('label', 'Username'),
          'fullName' => Yii::t('label', 'Full Name'),
          'email' => Yii::t('label', 'Email'),
        );
    }
}