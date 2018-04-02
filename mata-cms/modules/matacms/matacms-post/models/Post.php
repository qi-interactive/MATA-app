<?php

/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

namespace matacms\post\models;

use Yii;
use mata\media\models\Media;
use matacms\interfaces\CalendarInterface;
use matacms\carousel\clients\CarouselClient;

/**
 * This is the model class for table "post".
 *
 * @property integer $Id
 * @property string $Title
 * @property string $Subtitle
 * @property string $Text
 * @property string $PublicationDateStart
 * @property string $URI
 */
class Post extends \matacms\db\ActiveRecord implements CalendarInterface
{

    public static function tableName()
    {
        return 'mata_post';
    }

    public function behaviors()
    {
        return \yii\helpers\ArrayHelper::merge([
            [
                'class' => \yii\behaviors\SluggableBehavior::className(),
                'slugAttribute' => 'URI',
                'attribute' => 'Title'
            ]
        ], parent::behaviors());
    }

    public function rules()
    {
        return [
            [['Title', 'Body', 'URI', 'Priority', 'Category_One', 'Category_Two'], 'required'],
            [['Title', 'Lead', 'Body'], 'string'],
            [['Author'], 'string', 'max' => 128],
            [['URI'], 'string', 'max' => 255],
            [['PublicationDateEnd', 'PublicationDate'], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Title' => 'Tytuł',
            'Lead' => 'Lead',
            'Body' => 'Tekst',
            'Author' => 'Autor',
            'PublicationDateEnd' => 'Data zakończenia',
            'PublicationDate' => 'Data wydarzenia',
            'URI' => 'URI',
            'Category_One' => 'Kategoria pierwsza',
            'Category_Two' => 'Kategoria druga',
            'Priority' => 'Priorytet'
        ];
    }

//    public function getCategories()
//    {
//        return CategoryItem::find()->with("category")->where(["DocumentId" => $this->getDocumentId()])->one();
//    }


    public function getImage() {
        return Media::find()->where(["For" => $this->getDocumentId('Image')])->one();
    }

    public function getCarouselItems()
    {
        $carouselClient = new CarouselClient;
        $carouselModel = $carouselClient->findByRegion($this->getDocumentId('Carousel')->getId());
        return $carouselModel ? $carouselModel->items : null;
    }


    public static function getEventDateAttribute()
    {
        return 'PublicationDate';
    }

    public function getEventDate()
    {
        return $this->PublicationDate;
    }

    public function filterableAttributes() {
        return ["Title", "PublicationDate"];
    }

}