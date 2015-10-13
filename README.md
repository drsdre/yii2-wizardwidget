Yii2 Wizard Widget
==================
Multi step wizard widget using tabs to guide a user through steps to complete a form

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist drsdre/yii2-wizardwidget "*"
```

or add

```
"drsdre/yii2-wizardwidget": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php
$wizard_config = [
	'id' => 'stepwizard',
	'button_previous' => Yii::t('Previous'),
	'button_next' => Yii::t('Next'),
	'button_save' => Yii::t('Save'),
	'button_skip' => Yii::t('Skip'),
	'steps' => [
		[
			'title' => 'Step 1',
			'icon' => 'glyphicon glyphicon-cloud-download',
			'content' => '<h3>Step 1</h3>This is step 1',
		],
		[
			'title' => 'Step 2',
			'icon' => 'glyphicon glyphicon-cloud-upload',
			'content' => '<h3>Step 2</h3>This is step 2',
		],
		[
			'title' => 'Step 3',
			'icon' => 'glyphicon glyphicon-transfer',
			'content' => '<h3>Step 3</h3>This is step 3',
		],
	],
	'complete_content' => "You are done!", // Optional final screen
];
?>

<?= \drsdre\wizardwidget\AutoloadExample::widget($wizard_config); ?>
```