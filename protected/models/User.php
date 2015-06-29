<?php

/**
 * This is the model class for table "User".
 *
 * The followings are the available columns in table 'User':
 * @property integer $id
 * @property string $password
 * @property string $firstName
 * @property string $surName
 * @property string $age
 * @property string $city
 * @property string $phoneNumber
 * @property string $email
 * @property string $createTime
 * @property string $updateTime
 * @property string $lastLogin
 * @property integer $role
 * @property integer $active
 * @property integer $newsLetter
 *
 * The followings are the available model relations:
 * @property UserHasMessage[] $userHasMessages
 * @property UserHasMessage[] $userHasMessages1
 * @property Salt[] $salts
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'User';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('password, firstName, surName, city, phoneNumber, email', 'required', 'on'=>'registration'),
			array('role, active, newsLetter', 'numerical', 'integerOnly'=>true),
			array('password', 'length', 'max'=>255),
			array('firstName, surName', 'length', 'max'=>50),
			array('city', 'length', 'max'=>40),
			array('phoneNumber', 'length', 'max'=>20),
			array('email', 'length', 'max'=>80),
			array('age, createTime, updateTime, lastLogin', 'safe'),
                        array('email','required', 'on'=>'forgottenPassword'),
                        array('email','email'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, password, firstName, surName, age, city, phoneNumber, email, createTime, updateTime, lastLogin, role, active, newsLetter', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
            // NOTE: you may need to adjust the relation name and the related
            // forgottenPasswordclass name for the relations automatically generated below.
            return array(
                    'userHasMessages' => array(self::HAS_MANY, 'UserHasMessage', 'fromUser'),
                    'userHasMessages1' => array(self::HAS_MANY, 'UserHasMessage', 'toUser'),
                    'salt' => array(self::BELONGS_TO, 'Salt', 'id'),

            );
	}
        
        public function hashPassword($password){
            $password = md5($password);
            return $password;            
        }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'password' => 'Password',
			'firstName' => 'First Name',
			'surName' => 'Sur Name',
			'age' => 'Age',
			'city' => 'City',
			'phoneNumber' => 'Phone Number',
			'email' => 'Email',
			'createTime' => 'Create Time',
			'updateTime' => 'Update Time',
			'lastLogin' => 'Last Login',
			'role' => 'Role',
			'active' => 'Active',
			'newsLetter' => 'News Letter',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('surName',$this->surName,true);
		$criteria->compare('age',$this->age,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('phoneNumber',$this->phoneNumber,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('createTime',$this->createTime,true);
		$criteria->compare('updateTime',$this->updateTime,true);
		$criteria->compare('lastLogin',$this->lastLogin,true);
		$criteria->compare('role',$this->role);
		$criteria->compare('active',$this->active);
		$criteria->compare('newsLetter',$this->newsLetter);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
