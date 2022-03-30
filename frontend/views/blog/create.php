<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Blog */

$this->title = 'Створити новину';

?>
<div class="blog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
