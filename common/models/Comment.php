<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int|null $article_id
 * @property string|null $name
 * @property string|null $text
 * @property int|null $date
 *
 * @property Articles $article
 */
class Comment extends \yii\db\ActiveRecord
{

    public function behaviors(){

        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date'],
                ],
                'value' => time()
            ]
        ];

    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text' , 'name' , 'email'], 'required' ],
            [['article_id', 'date'], 'integer'],
            [['text' , 'name' , 'email'], 'string' ],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Articles::class, 'targetAttribute' => ['article_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'text' => 'Сообщение',
            'date' => 'Date',
            'name' => 'Имя',
            'email' => 'E-mail'
        ];
    }

    /**
     * Gets query for [[Article]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Articles::class, ['id' => 'article_id']);
    }
}
