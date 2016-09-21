<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "users".
 *
 * @property integer $user_id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $state
 * @property string $register_date
 * @property string $update_date
 * @property integer $age
 * @property string $auth_key
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula', 'username', 'password', 'email', 'age'], 'required'],
            [['cedula', 'username', 'email'], 'unique'],
            [['cedula'], 'integer', 'min'=>5, 'max'=>9999999999],
            [['state'], 'integer'],
            [['register_date', 'update_date'], 'safe'],
            [['username', 'email'], 'string', 'max' => 100, 'min' => 6],
            [['password'], 'string', 'max' => 8, 'min'=> 6],
            [['age'], 'integer', 'max' => 100]
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'register_date',
                'updatedAtAttribute' => 'update_date',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function relations()
    {
        'sale' => array(self::BELONGS_TO, 'User', 'user_id'),
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'state' => 'State',
            'register_date' => 'Register Date',
            'update_date' => 'Update Date',
            'age' => 'Age',
        ];
    }

    public function getAuthKey()
    {
        // return $this->auth_key;
        throw new \yii\base\NotSupportedException();
    }

    public function getId()
    {
        return $this->user_id;
    }

    public function validateAuthKey($authKey)
    {
        // return $this->auth_key === $authKey;
        throw new \yii\base\NotSupportedException();
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new \yii\base\NotSupportedException();
    }

    public static function findByUsername($username)
    {
        return self::findOne(['username'=>$username]);
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
