<?php

use yii\helpers\Html;

echo Html::beginForm(['/customers'], 'get');
echo Html::label('Phone number to search:', 'phoneNumber');
echo Html::textInput('phoneNumber');
echo Html::submitButton('Search');
echo Html::endForm();