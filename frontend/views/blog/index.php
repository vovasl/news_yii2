<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider ActiveDataProvider */
/* @var $firstModel */

$this->title = 'Головна';

?>
<div class="blog-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Додати новину', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}{pager}",
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_item', [
                'model' => $model,
                'key' => $key,
            ]);
        },
        'emptyText' => '',
        'pager' => [
            'class' => LinkPager::class,
            'pageCssClass' => 'page-item',
            'linkOptions' => [
                'class' => 'page-link'
            ],
            'prevPageLabel' => false,
            'nextPageLabel' => false,
        ]
    ]) ?>

</div>
