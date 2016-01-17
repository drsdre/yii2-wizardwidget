<?php
/**
 * @copyright Copyright &copy; A.F.Schuurman, 2015
 * @package yii2-wizardwidget
 * @version 1.0.0
 */
namespace drsdre\wizardwidget;

use yii\web\AssetBundle;

/**
 * Asset bundle for Wizard Widget
 *
 * @author A.F.Schuurman <andre.schuurman+yii2-wizardwidget@gmail.com>
 * @since 1.0
 */
class WizardWidgetAsset extends AssetBundle
{
	public $sourcePath = '@drsdre/wizardwidget';
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset'
	];
	public $css = [
		'css/wizardwidget.css',
	];
	public $js = [
		'js/wizardwidget.js'
	];
}