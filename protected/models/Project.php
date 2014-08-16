<?php

/**
 * This is the model class for table "Project".
 *
 * The followings are the available columns in table 'Project':
 * @property integer $id
 * @property string $projectName
 * @property string $projectDescription
 * @property string $projectCategory
 * @property string $projectCreationDate
 * @property string $projectLink
 * @property string $dateAdded
 * @property integer $ownerID
 */
class Project extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Project the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('projectName, projectDescription, projectCategory, projectCreationDate, dateAdded', 'required'),
			array('projectName, projectCategory', 'length', 'max'=>128),
			array('projectDescription, projectLink', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, projectName, projectDescription, projectCategory, projectCreationDate, projectLink, dateAdded, ownerID', 'safe', 'on'=>'search'),
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
                    'user' => array(self::BELONGS_TO, 'User', 'ownerID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'projectName' => 'Project Name',
			'projectDescription' => 'Project Description',
			'projectCategory' => 'Project Category',
			'projectCreationDate' => 'Project Creation Date',
			'projectLink' => 'Project Link',
			'dateAdded' => 'Date Added',
                        'ownerID' => 'Owner ID'
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

		$criteria->compare('id',$this->id);
		$criteria->compare('projectName',$this->projectName,true);
		$criteria->compare('projectDescription',$this->projectDescription,true);
		$criteria->compare('projectCategory',$this->projectCategory,true);
		$criteria->compare('projectCreationDate',$this->projectCreationDate,true);
		$criteria->compare('projectLink',$this->projectLink,true);
		$criteria->compare('dateAdded',$this->dateAdded,true);
                $criteria->compare('OwnerID',$this->ownerID,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}