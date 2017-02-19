<?php
use yii\widgets\DetailView;

echo DetailView::widget([
    'model'      => $model,
    'attributes' => [
        ['attribute' => 'name'],
        [
            'attribute' => 'birthDate',
            'value'     => $model->birthDate->format('Y-m-d')
        ],
        'notes:text',
        [
            'label'     => 'Phone Number',
            'attribute' => 'phones.0.number'
        ]
    ]
]);