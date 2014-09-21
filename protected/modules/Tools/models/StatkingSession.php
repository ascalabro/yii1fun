<?php

class StatkingSession extends CActiveRecord
{
        public $id;
        public $user_id;
        public $date;
        public $location;
        public $game;
        public $session_length;
        public $profit_loss;
        public $comments;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'StatkingSession';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, location, session_length, profit_loss, comments', 'safe'),
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
//                    'githubaccount' => array(self::HAS_ONE, 'GitHubAccount', 'GitHubOwnerID'),
//                    'profile' => array(self::HAS_ONE, 'UserProfile', 'UserID'),
//                    'projects' => array(self::HAS_MANY, 'Project', 'ownerID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'date' => 'ID',
			'location' => 'Username',
			'game' => 'Password',
                        'session_length' => 'Session Length',
                        'profit_loss' => 'Profit/Loss',
                        'comments' => 'Comments'
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
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('date',$this->password,true);
                $criteria->compare('location',$this->location,true);
                $criteria->compare('game',$this->game,true);
                $criteria->compare('session_length',$this->session_length,true);
                $criteria->compare('profit_loss',$this->profit_loss,true);
                $criteria->compare('comments',$this->comments,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public static function getAllSessionsByMonth() {
            $command = Yii::app()->db->createCommand("
                SELECT 
                COUNT(id) as Count, 
                YEAR(date) as Year, 
                MONTH(date) as Month, 
                ROUND(SUM(session_length), 2) as TotalHours, 
                SUM(profit_loss) as Profit_Loss 
                FROM  `southeastclub`.`StatkingSession`
                WHERE user_id =  " . Yii::app()->user->id . "
                GROUP BY EXTRACT(YEAR_MONTH FROM DATE)");
            return $command->queryAll();
        }
        
}