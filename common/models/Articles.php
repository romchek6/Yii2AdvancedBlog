<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $text
 * @property int|null $author_id
 * @property string|null $alias
 * @property string|null $date
 * @property string|null $likes
 * @property int|null $hits
 * @property int|null $category_id
 *
 * @property Category $category
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'hits', 'category_id'], 'integer'],
            [['date'], 'safe'],
            [['title', 'alias', 'likes'], 'string', 'max' => 200],
            [['text'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'author_id' => 'Author ID',
            'alias' => 'Alias',
            'date' => 'Date',
            'likes' => 'Likes',
            'hits' => 'Hits',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}
