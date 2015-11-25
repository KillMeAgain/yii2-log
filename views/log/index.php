<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel bigm\log\models\LogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Log';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'layout' => "{items}\n{summary}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'     => 'id',
                'format'        => 'raw',
                'value'         => function($data){
                    return Html::a($data['id'],['view','id' => $data['id']]);
                }
            ],
           // 'level',
            'tag',
            [
                'attribute'     => 'ip',
                'format'        => 'raw',
                'value'         => function($data){
                    return Html::tag('label',long2ip($data['ip']),['class' => 'label label-success']);
                }
            ],
            [
                'attribute'     => 'data',
                'format'        => 'raw',
                'value'         => function($data){
                    return mb_substr($data['data'],0,100);
                }
            ],
            'created_at:datetime',
            //'updated_at:datetime',
        ],
    ]); ?>

</div>
