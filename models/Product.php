<?php

/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

namespace matacms\product\models;

use Yii;
use yii\db\ActiveQuery;
use mata\category\models\CategoryItem;
use matacms\interfaces\CalendarInterface;
use mata\media\models\Media;

/**
 * This is the model class for table "matacms_product".
 *
 * @property integer $Id
 * @property string $Name
 * @property string $Text
 * @property string $URI
 */
class Product extends \matacms\db\ActiveRecord implements CalendarInterface
{
    
    public static function tableName()
    {
        return 'matacms_product';
    }

    public function rules()
    {
        return [
        [['Name', 'Text', 'URI', 'PublicationDate'], 'required'],
        [['Name', 'Text'], 'string'],
        [['URI'], 'string', 'max' => 255],
        // [['SnippetImage'], '\mata\media\validators\MandatoryMediaValidator'],
        // [['Category'], '\mata\category\validators\MandatoryCategoryValidator'],
        ];
    }

    public static function find() {
        return new ProductQuery(get_called_class());
    }
    
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Name' => 'Name',
            'Text' => 'Text',
            'URI' => 'Uri',
        ];
    }

    public function getCategories()
    {
        return CategoryItem::find()->with("category")->where(["DocumentId" => $this->getDocumentId()])->all();
    }

    public function getProductImage() {
        return Media::find()->where(["DocumentId" => $this->getDocumentId('SnippetImage')])->one();
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
        return ["Name", "PublicationDate"];
    }

}
