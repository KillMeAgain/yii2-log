<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model bigm\log\models\Log */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'level',
            [
                'attribute' => 'ip',
                'format'    => 'raw',
                'value'     => Html::tag('label', long2ip($model->ip),['class' => 'label label-success'])
            ],
            [
                'attribute' => 'data',
                'format'    => 'raw',
                'value'     => Html::tag('div',$model->data,['class' => '',])
            ],
            [
                'attribute' => 'tag',
                'format'    => 'raw',
                'value'     => Html::tag('label', $model->tag,['class' => 'label label-info'])
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
