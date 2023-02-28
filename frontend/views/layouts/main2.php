<?php

use frontend\assets\AppAsset;
use yii\helpers\Html;


AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div id="colorlib-page">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
    <aside id="colorlib-aside" role="complementary" class="js-fullheight">
        <nav id="colorlib-main-menu" role="navigation">
            <ul>
                <li class="colorlib-active"><a href="/">Главная</a></li>
                <?php $controller = $this->context ?>
                <?php if(!empty($controller->categories)): ?>
                    <?php foreach ($controller->categories as $category): ?>
                        <li><a href="<?= \yii\helpers\Url::to(["category/$category->alias"])?>"><?= $category->name ?></a></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </nav>

        <div class="colorlib-footer">
            <h1 id="colorlib-logo" class="mb-4"><a href="/" >Блог<span>Таксиста</span></a></h1>

        </div>
    </aside> <!-- END COLORLIB-ASIDE -->

    <?= $content ?>
    <div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
        <div class="sidebar-box pt-md-4">
            <form action="<?= \yii\helpers\Url::to(['search']) ?>" method="get" class="search-form">
                <div class="form-group">
                    <span class="icon icon-search"></span>
                    <input type="text" class="form-control" name="query" placeholder="Введите слово и нажмите enter">
                </div>
            </form>
        </div>
        <div class="sidebar-box ftco-animate">
            <h3 class="sidebar-heading">Категории</h3>
            <ul class="categories">
                <?php if(!empty($controller->countArticles)): ?>
                    <?php foreach ($controller->countArticles as $value): ?>
                        <li><a href="<?= \yii\helpers\Url::to(["category/".$value['alias']]) ?>"><?= $value['name'] ?><span>(<?= $value['count'] ?>)</span></a></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>

        <div class="sidebar-box ftco-animate">
            <h3 class="sidebar-heading">Популярные посты</h3>
            <?php if(!empty($controller->popular)): ?>
                <?php foreach ($controller->popular as $value): ?>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#"><?= $value->title ?></a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> <?= $value->date ?></a></div>
                                <div><a href="#"><span class="icon-person"></span> <?= $value->author->name ?></a></div>
                                <div><a href="#"><span class="icon-chat"></span> <?= $value->hits ?></a></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>

        <div class="sidebar-box subs-wrap img py-4" style="background-image: url(images/bg_1.jpg);">
            <div class="overlay"></div>
            <h3 class="mb-4 sidebar-heading">Подпишись на рассылку</h3>
            <p class="mb-4">Узнавай первым, когда выходит новая статья</p>
            <form action="#" class="subscribe-form">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email">
                    <input type="submit" value="Подписаться" class="mt-2 btn btn-white submit">
                </div>
            </form>
        </div>


        <div class="sidebar-box ftco-animate">
            <h3 class="sidebar-heading">Paragraph</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut.</p>
        </div>
    </div>
</div><!-- END COLORLIB-PAGE -->

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
<?php $this->endBody() ?>
</body>
<?= $this->endPage() ?>
</html>
