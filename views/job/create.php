<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Job $model */

$this->title = Yii::t('app', 'Добавление дела');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Спиок дел'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
