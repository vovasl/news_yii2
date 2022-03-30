<?php

use common\models\Blog;
use yii\helpers\Url;

/* @var $model Blog */
/* @var $key int */

?>

<div class="card mb-3">
    <div class="card-header"><?= "Новина #{$model->id}" ?></div>
    <div class="card-body">
        <!-- <h5 class="card-title"></h5> -->
        <p class="card-text">
            <?= (Blog::checkModelById($this->params['firstModel'], $key)) ? Blog::shuffleWords($model->text) : $model->text ?>
        </p>
        <p class="card-text">
            <?php if($model->viewed_time): ?>
                Переглянуто: <?= $model->viewed_time ?>
            <?php else: ?>
                Не переглянута
            <?php endif; ?>
        </p>
        <a href="<?= Url::to(['blog/view', 'id' => $model->id]) ?>" class="btn btn-primary" target="_blank">Переглянути новину</a>
    </div>
</div>