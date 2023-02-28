<?php

namespace frontend\controllers;

use common\models\Articles;
use common\models\Author;
use common\models\Category;
use common\models\Comment;
use yii\data\Pagination;
use yii\web\Controller;
use Yii;

class BlogController extends Controller
{

    public $categories;

    public $countArticles;

    public $popular;

    public function beforeAction($action)
    {

        $this->categories = Category::find()->all();

        $art = new Articles();

        $this->countArticles  = $art->getCountArticles();

        $this->popular = $art->getPopular();

        return parent::beforeAction($action);

    }

    public function actionIndex()
    {

        $query = Articles::find()->with('category')->with('author')->orderBy('date DESC');

        $pages = new Pagination(['totalCount' => $query->count() , 'pageSize' => 10,'forcePageParam' => false , 'pageSizeParam' => false]);

        $models = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index' , compact('models' , 'pages'));

    }

    public function actionCategory($alias){

        $id = Category::find()->where(['alias' => $alias])->one()->id;

        $query = Articles::find()->where(['category_id' => $id])->with('category')->with('author')->orderBy('date DESC');

        $pages = new Pagination(['totalCount' => $query->count() , 'pageSize' => 10,'forcePageParam' => false , 'pageSizeParam' => false]);

        $models = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index' , compact('models' , 'pages'));

    }

    public function actionArticle($id){

        $model = new Comment();

        if($model ->load(Yii::$app->request->post()) && $model->save()){

            Yii::$app->session->setFlash('123465');

            return $this->refresh();

        }

        $comments = $model->find()->where(['article_id' => $id])->orderBy('date asc')->all();

        $art = new Articles();

        $aut = new Author();

        $article = $art->getOne($id);

        $article->hits++;

        $article->save();

        $author = $aut->getOne($article->author_id);

        $keywords = explode('|',$article->keywords);

        return $this->render('single', compact('article' , 'keywords','author' , 'model' , 'comments'));

    }

    public function actionSearch($query){

        $query = Articles::find()
            ->where(['like' , 'keywords' , $query])
            ->orFilterWhere(['like', 'text',$query])
            ->orFilterWhere(['like', 'title',$query])
            ->with('category')
            ->with('author')
            ->orderBy('date DESC');

        $pages = new Pagination(['totalCount' => $query->count() , 'pageSize' => 10,'forcePageParam' => false , 'pageSizeParam' => false]);

        $models = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index' , compact('models' , 'pages'));

    }

}