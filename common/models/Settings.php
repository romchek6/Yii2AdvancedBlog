<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string|null $title_first
 * @property string|null $title_second
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $about
 * @property string|null $keywords
 */
class settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['about', 'keywords'], 'string'],
            [['title_first', 'title_second', 'phone', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_first' => 'Title First',
            'title_second' => 'Title Second',
            'phone' => 'Phone',
            'email' => 'Email',
            'about' => 'About',
            'keywords' => 'Keywords',
        ];
    }
}
