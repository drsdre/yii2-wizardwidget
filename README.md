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


Wizard configuration
--------------------

-  `id`: *string* html id of the wizard widget
-  `steps`: *array* definition of the wizard steps. Array key will be used as the hyperlinks to the steps. 

Each step can have the following parameters:
-  `title`: *string required* title of the step (shown when hoovering over step icon)
-  `icon`: *string required* step icon code (see Glyphicon or Font awesome codes)
-  `content`: *string required* HTML content of the step page 
-  `skippable`: *boolean optional* allow to skip over a step 
-  `buttons`: *array optional* configuration of the buttons per step
-  `complete_content`: *string optional* the HTML content of a complete step
-  `start_step`: *string optional* the starting step when wizard is initialized

In each step four different buttons can be configured (display of a button is dependent on position of the step in the sequence):
-  `prev`: (not shown on first step)
-  `next`: (not shown on last step)
-  `skip`: (shown when skippable is set)
-  `save`: (shown on the last step)

Each button can be configured with:
-  `title`: *string optional* title as shown in the button
-  `options`: *array optional* of HTML options (see [Yii2 HTML helper documentation](http://www.yiiframework.com/doc-2.0/yii-helpers-basehtml.html#button()-detail))

or

-  `html`: *string optional* add your own button definition with HTML code (for example to save data after a step)


Usage
-----

Once the extension is installed, use it in your code like :

```php
<?php
$wizard_config = [
	'id' => 'stepwizard',
	'steps' => [
		1 => [
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
		2 => [
			'title' => 'Step 2',
			'icon' => 'glyphicon glyphicon-cloud-upload',
			'content' => '<h3>Step 2</h3>This is step 2',
			'skippable' => true,
		],
		3 => [
			'title' => 'Step 3',
			'icon' => 'glyphicon glyphicon-transfer',
			'content' => '<h3>Step 3</h3>This is step 3',
		],
	],
	'complete_content' => "You are done!", // Optional final screen
	'start_step' => 2, // Optional, start with a specific step
];
?>

<?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config); ?>
```
