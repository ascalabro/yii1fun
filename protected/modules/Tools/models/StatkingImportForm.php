<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class StatkingImportForm extends CFormModel
{
	public $dbaFile;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
                    array('dbaFile', 'file', 'types'=>'csv, gif, png')
                    );
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
                    'dbaFile' => 'Statking Database'
                );
	}
        
        public function deleteUserOldSessions() 
        {
            $criteria = new CDbCriteria();
            $criteria->condition = "user_id = :user_id";
            $criteria->params = array(":user_id" => Yii::app()->user->id);
            StatkingSession::model()->deleteAll($criteria);
        }
}