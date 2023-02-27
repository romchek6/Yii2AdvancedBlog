<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row d-flex">

                <div class="col-xl-8 py-5 px-md-5">
                    <div class="row pt-md-4">

                        <?php if(!empty($models)): ?>
                            <?php foreach ($models as $model): ?>
                            <div class="col-md-12">
                                <div class="blog-entry ftco-animate d-md-flex">
                                    <a href="<?= \yii\helpers\Url::to(["article/$model->id"])?>" class="img img-2" style="background-image: url(images/image_1.jpg);"></a>
                                    <div class="text text-2 pl-md-4">
                                        <h3 class="mb-2"><a href="<?= \yii\helpers\Url::to(["article/$model->id"])?>"><?= $model->title ?></a></h3>
                                        <div class="meta-wrap">
                                            <p class="meta">
                                                <span><i class="icon-calendar mr-2"></i><?= $model->date ?></span>
                                                <span><a href="<?= \yii\helpers\Url::to(["category/" . $model->category->name])?>"><i class="icon-folder-o mr-2"></i><?= $model->category->name ?></a></span>
                                                <span><i class="icon-comment2 mr-2"></i><?= $model->hits ?> Просмотров</span>
                                            </p>
                                        </div>
                                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                        <p><a href="<?= \yii\helpers\Url::to(["article/$model->id"])?>" class="btn-custom">Читать далее <span class="ion-ios-arrow-forward"></span></a></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-md-12">
                                <div class="blog-entry ftco-animate d-md-flex">
                                    <div class="text text-2 pl-md-4">
                                        <h3 class="mb-2"><a href="">Ничего не найдено</a></h3>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div><!-- END-->
                    <div class="row">
                        <div class="col">
                            <div class="block-27">
                                <?= \yii\widgets\LinkPager::widget([
                                    'pagination' => $pages,
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>

