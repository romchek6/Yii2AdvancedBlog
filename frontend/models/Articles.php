<?php

namespace app\models;

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
            [['author_id', 'hits'], 'integer'],
            [['date'], 'safe'],
            [['title', 'alias', 'likes'], 'string', 'max' => 200],
            [['text'], 'string', 'max' => 255],
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
        ];
    }

    public function getOne($id){

        return $this->find()->where(['id' => $id])->one();

    }

    public function getAll(){

        return $this->find()->all();

    }

    public function getDescription($a , $text){

        return "$text: $a";

    }

}
