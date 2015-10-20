Yii2 Wizard Widget
==================
Multi step wizard widget using tabs to guide a user through steps to complete a task. Based on the Form wizard (using tabs) from lukepzak (see http://bootsnipp.com/snippets/featured/form-wizard-using-tabs).

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
	'steps' => [
		[
			'title' => 'Step 1',
			'icon' => 'glyphicon glyphicon-cloud-download',
			'content' => '<h3>Step 1</h3>This is step 1',
			'buttons' => [
				'next' => [
					'title' => 'Forward', 
					'options' => [
						'class' => 'disabled'
					],
				 ],
			 ],
		],
		[
			'title' => 'Step 2',
			'icon' => 'glyphicon glyphicon-cloud-upload',
			'content' => '<h3>Step 2</h3>This is step 2',
			'skippable' => true,
		],
		[
			'title' => 'Step 3',
			'icon' => 'glyphicon glyphicon-transfer',
			'content' => '<h3>Step 3</h3>This is step 3',
		],
	],
	'complete_content' => "You are done!", // Optional final screen
	'start_step' => 2,
];
?>

<?= \drsdre\wizardwidget\AutoloadExample::widget($wizard_config); ?>
```