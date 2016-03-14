<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\history\models\CommitHistory */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Commit History',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Commit Histories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="commit-history-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
