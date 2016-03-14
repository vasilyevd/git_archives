<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\history\models\CommitHistory */

$this->title = Yii::t('app', 'Create Commit History');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Commit Histories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="commit-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
