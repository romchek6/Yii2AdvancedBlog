<?php

namespace frontend\controllers;

use common\models\Articles;
use common\models\Category;
use yii\data\Pagination;
use yii\web\Controller;
use Yii;

class BlogController extends Controller
{

    public $categories;

    public function beforeAction($action)
    {

        $this->categories = Category::find()->all();

        return parent::beforeAction($action);

    }

    public function actionIndex()
    {

        $query = Articles::find()->with('category');

        $pages = new Pagination(['totalCount' => $query->count() , 'pageSize' => 1,'forcePageParam' => false , 'pageSizeParam' => false]);

        $models = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index' , compact('models' , 'pages'));

    }


}