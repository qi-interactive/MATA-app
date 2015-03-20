<?php

namespace matacms\post\models;

use Yii;

/**
 * This is the model class for table "mata_post".
 *
 * @property integer $Id
 * @property string $Title
 * @property string $Author
 * @property string $Lead
 * @property string $Body
 * @property string $URI
 */


echo "OK";
exit;
class Post extends \matacms\db\ActiveRecord {


	public $LeadMedia;

	    /**
	     * @inheritdoc
	     */
	    public static function tableName()
	    {
	    	return 'mata_post';
	    }

	    /**
	     * @inheritdoc
	     */
	    public function rules()
	    {
	    	return [
	    	[['Title', 'Body', 'URI', 'PublicationDate'], 'required'],
	    	[['Title', 'Lead', 'Body'], 'string'],
	    	[['Author'], 'string', 'max' => 128],
	    	[['URI'], 'string', 'max' => 255]
	    	];
	    }

	    /**
	     * @inheritdoc
	     */
	    public function attributeLabels()
	    {
	    	return [
	    	'Id' => 'ID',
	    	'Title' => 'Title',
	    	'Author' => 'Author',
	    	'Lead' => 'Lead',
	    	'Body' => 'Body',
	    	'URI' => 'Uri',
	    	];
	    }

	}