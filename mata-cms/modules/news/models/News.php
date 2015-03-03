<?php

namespace matacms\modules\news\models;

use Yii;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property integer $Id
 * @property string $Title
 * @property string $Author
 * @property string $Lead
 * @property string $Body
 * @property string $URI
 * @property integer $LeadMediaId
 * @property integer $BodyMediaId
 */
class News extends \matacms\post\models\Post {
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return array_merge(parent::rules(), [
            [['LeadMediaId', 'BodyMediaId'], 'integer'],
            ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), [
            'LeadMediaId' => 'Lead Media ID',
            'BodyMediaId' => 'Body Media ID',
            ]);
    }
}