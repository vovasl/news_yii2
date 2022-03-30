<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Blog */

$this->title = "Новина #{$model->id}";

?>

<div class="blog-view">

    <h1><?= $this->title ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'text:ntext',
            [
                'attribute'=>'viewed_time',
                'value' => function () {
                    return date('d-m-y H:i:s');
                },
            ]
        ],
    ]) ?>

</div>
