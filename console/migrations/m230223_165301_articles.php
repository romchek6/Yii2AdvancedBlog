<?php

use yii\db\Migration;

/**
 * Class m230223_165301_articles
 */
class m230223_165301_articles extends Migration
{
//    /**
//     * {@inheritdoc}
//     */
//    public function safeUp()
//    {
//
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function safeDown()
//    {
//        echo "m230223_165301_articles cannot be reverted.\n";
//
//        return false;
//    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('articles' , [
            'id' => $this->primaryKey(),
            'title' => $this->string(200),
            'text' => $this->string(),
            'author_id' => $this->integer(),
            'alias' => $this->string(200),
            'date' => $this->date("Y-m-d"),
            'likes' => $this->string(200),
            'hits' => $this->integer(),
        ]);
    }

    public function down()
    {
        echo "m230223_165301_articles cannot be reverted.\n";

        return false;
    }

}
