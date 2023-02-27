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
 * @property Author $author
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
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::class, 'targetAttribute' => ['author_id' => 'id']],
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
            'keywords' =>'Keywords',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::class, ['id' => 'author_id']);
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

    public function getPopular(){

        return $this->find()->orderBy('hits desc')->limit(3)->with('author')->all();

    }

    public function getCountArticles(){

        return Yii::$app->db->createCommand("SELECT category.id, category.name , category.alias , COUNT(articles.id) as count
        FROM category
        JOIN articles
        ON articles.category_id = category.id
        GROUP BY category.id")->queryAll();

    }

    public function getOne($id){

        return $this->find()->where(['id' => $id])->one();

    }

}
