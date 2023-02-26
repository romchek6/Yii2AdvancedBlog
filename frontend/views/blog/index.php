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
                                    <a href="<?= \yii\helpers\Url::to(['article/'])?>/<?= $model->id ?>" class="img img-2" style="background-image: url(images/image_1.jpg);"></a>
                                    <div class="text text-2 pl-md-4">
                                        <h3 class="mb-2"><a href="<?= \yii\helpers\Url::to(['article/'])?>/<?= $model->id ?>"><?= $model->title ?></a></h3>
                                        <div class="meta-wrap">
                                            <p class="meta">
                                                <span><i class="icon-calendar mr-2"></i><?= $model->date ?></span>
                                                <span><a href="<?= \yii\helpers\Url::to(['category/'])?>/<?= $model->category->name ?>"><i class="icon-folder-o mr-2"></i><?= $model->category->name ?></a></span>
                                                <span><i class="icon-comment2 mr-2"></i><?= $model->hits ?> Просмотров</span>
                                            </p>
                                        </div>
                                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                        <p><a href="<?= \yii\helpers\Url::to(['article/'])?>/<?= $model->id ?>" class="btn-custom">Читать далее <span class="ion-ios-arrow-forward"></span></a></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
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

                <div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
                    <div class="sidebar-box pt-md-4">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon icon-search"></span>
                                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <h3 class="sidebar-heading">Categories</h3>
                        <ul class="categories">
                            <li><a href="#">Fashion <span>(6)</span></a></li>
                            <li><a href="#">Technology <span>(8)</span></a></li>
                            <li><a href="#">Travel <span>(2)</span></a></li>
                            <li><a href="#">Food <span>(2)</span></a></li>
                            <li><a href="#">Photography <span>(7)</span></a></li>
                        </ul>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3 class="sidebar-heading">Popular Articles</h3>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3 class="sidebar-heading">Tag Cloud</h3>
                        <ul class="tagcloud">
                            <a href="#" class="tag-cloud-link">animals</a>
                            <a href="#" class="tag-cloud-link">human</a>
                            <a href="#" class="tag-cloud-link">people</a>
                            <a href="#" class="tag-cloud-link">cat</a>
                            <a href="#" class="tag-cloud-link">dog</a>
                            <a href="#" class="tag-cloud-link">nature</a>
                            <a href="#" class="tag-cloud-link">leaves</a>
                            <a href="#" class="tag-cloud-link">food</a>
                        </ul>
                    </div>

                    <div class="sidebar-box subs-wrap img py-4" style="background-image: url(images/bg_1.jpg);">
                        <div class="overlay"></div>
                        <h3 class="mb-4 sidebar-heading">Newsletter</h3>
                        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia</p>
                        <form action="#" class="subscribe-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email Address">
                                <input type="submit" value="Subscribe" class="mt-2 btn btn-white submit">
                            </div>
                        </form>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3 class="sidebar-heading">Archives</h3>
                        <ul class="categories">
                            <li><a href="#">Decob14 2018 <span>(10)</span></a></li>
                            <li><a href="#">September 2018 <span>(6)</span></a></li>
                            <li><a href="#">August 2018 <span>(8)</span></a></li>
                            <li><a href="#">July 2018 <span>(2)</span></a></li>
                            <li><a href="#">June 2018 <span>(7)</span></a></li>
                            <li><a href="#">May 2018 <span>(5)</span></a></li>
                        </ul>
                    </div>


                    <div class="sidebar-box ftco-animate">
                        <h3 class="sidebar-heading">Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut.</p>
                    </div>
                </div><!-- END COL -->
            </div>
        </div>
    </section>
</div>
