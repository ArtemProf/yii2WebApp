<?php

	$baseDir = dirname(BASE_PATH);

	Yii::setAlias('@common', $baseDir.'/common');
	Yii::setAlias('@frontend', $baseDir.'/frontend');
	Yii::setAlias('@admin', $baseDir.'/admin');
	Yii::setAlias('@console', $baseDir.'/console');
