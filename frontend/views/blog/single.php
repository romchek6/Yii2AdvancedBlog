<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-8 px-md-5 py-5">
                    <?php if(!empty($article)): ?>
                    <div class="row pt-md-4">
                        <h1 class="mb-3"><?= $article->title ?></h1>
                        <p><?= $article->text ?></p>
                        <div class="tag-widget post-tag-container mb-5 mt-5">
                            <div class="tagcloud">
                                <?php if(!empty($keywords)): ?>
                                    <?php foreach ($keywords as $keyword): ?>
                                        <a href="/search?query=<?= $keyword ?>" class="tag-cloud-link"><?= $keyword ?></a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if(!empty($author)): ?>
                        <div class="about-author d-flex p-4 bg-light">
                            <div class="bio mr-5">
                                <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
                            </div>
                            <div class="desc">
                                <h3><?= $author->name ?></h3>
                                <p><?= $author->about ?></p>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="pt-5 mt-5">
                            <h3 class="mb-5 font-weight-bold">6 Comments</h3>
                            <ul class="comment-list">
                                <?php if(!empty($comments)): ?>
                                    <?php foreach ($comments as $comment): ?>
                                        <li class="comment">
                                            <div class="vcard bio">
                                                <img src="images/person_1.jpg" alt="Image placeholder">
                                            </div>
                                            <div class="comment-body">
                                                <h3><?= $comment->name ?></h3>
                                                <div class="meta"><?= Yii::$app->formatter->asDate($comment->date) ?></div>
                                                <p><?= $comment->text ?></p>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                            <!-- END comment-list -->

                            <div class="comment-form-wrap pt-5">
                                <h3 class="mb-5">Оставьте свой коментарий</h3>
                                <?php $form = \yii\widgets\ActiveForm::begin([
                                    'id' => 'comment-form',
                                    'options' => ['class' => 'p-3 p-md-5 bg-light'],
                                ]) ?>
                                <?= $form->field($model, 'article_id',['template' => '{input}'])->hiddenInput(['value'=>$article->id]) ?>
                                <div class="form-group">
                                    <?= $form->field($model , 'name')->input('text' , ['class' => 'form-control']) ?>
                                </div>
                                <div class="form-group">
                                    <?= $form->field($model , 'email')->input('email' , ['class' => 'form-control']) ?>
                                </div>
                                <div class="form-group">
                                    <?= $form->field($model , 'text')->textarea(['rows' => '6' , 'class'=> 'form-control', 'style' => ['resize' => 'none']])?>
                                </div>
                                <div class="form-group">
                                    <?= \yii\helpers\Html::submitButton('Отправить', ['class' => 'btn py-3 px-4 btn-primary']) ?>
                                </div>
                                <?php \yii\widgets\ActiveForm::end() ?>
                            </div>
                        </div>
                    </div><!-- END-->
                    <?php endif; ?>
                </div>