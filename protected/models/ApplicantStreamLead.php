<?php

/**
 * This is the model class for table "applicant_stream_leads".
 *
 * The followings are the available columns in table 'applicant_stream_leads':
 * @property string $id
 * @property string $first_name
 * @property string $last_name
 * @property string $job_board
 * @property string $email_address
 * @property string $main_phone
 * @property string $cell_phone
 */
class ApplicantStreamLead extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ApplicantStreamLead the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return CDbConnection database connection
	 */
	public function getDbConnection()
	{
		return Yii::app()->db_misc_data;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'applicant_stream_leads';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, job_board, email_address', 'length', 'max'=>64),
			array('main_phone, cell_phone', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, last_name, job_board, email_address, main_phone, cell_phone', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'job_board' => 'Job Board',
			'email_address' => 'Email Address',
			'main_phone' => 'Main Phone',
			'cell_phone' => 'Cell Phone',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('job_board',$this->job_board,true);
		$criteria->compare('email_address',$this->email_address,true);
		$criteria->compare('main_phone',$this->main_phone,true);
		$criteria->compare('cell_phone',$this->cell_phone,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array(
                            'pageSize'=>50,
                        ),
		));
	}
}