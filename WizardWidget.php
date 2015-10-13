<?php
/**
 * @copyright Copyright &copy; A.F.Schuurman, 2015
 * @package yii2-wizardwidget
 * @version 1.0.0
 */
namespace drsdre\wizardwidget;

use yii;
use yii\base\Widget;
use yii\web\View;
use yii\bootstrap\Tabs;

/**
 * Widget for wizard widget
 *
 * @author A.F.Schuurman <andre.schuurman+yii2-wizardwidget@gmail.com>
 * @since 1.0
 */
class WizardWidget extends Widget {

	public $id = 'wizard';

	public $button_previous = 'Previous';

	public $button_next = 'Next';

	public $button_save = 'Save';

	public $button_skip = 'Skip';

	public $steps = [];

	public $complete_content = '';

	public function run() {
		parent::run();
		WizardWidgetAsset::register($this->getView());

		// Start widget
		echo '<div class="wizard" id="'.$this->id.'">';

		// Render the steps line
		echo '<div class="wizard-inner"><div class="connecting-line"></div><ul class="nav nav-tabs" role="tablist">';
		$first = true;
		foreach ($this->steps as $id => $step) {
			echo '<li role="presentation" class="'.($first?"active":"disabled").'">
						<a href="#step'.$id.'" data-toggle="tab" aria-controls="step'.$id.'" role="tab" title="'.$step['title'].'">
                        <span class="round-tab">
                            <i class="'.$step['icon'].'"></i>
                        </span>
						</a>
					</li>';
			$first = false;
		}
		// Add a complete step if defined
		if ($this->complete_content) {
			echo '<li role="presentation" class="disabled">
						<a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                        <span class="round-tab">
                            <i class="glyphicon glyphicon-ok"></i>
                        </span>
						</a>
					</li>';
		}

		echo '</ul></div>';

		// Render the tabs
		echo '<div class="tab-content">';

		$first = true;
		$tabs['items'] = [];
		end($this->steps);
		$last_id = key($this->steps);

		foreach ($this->steps as $id => $step) {

			echo '<div class="tab-pane '.($first?"active":"disabled").'" role="tabpanel" id="step'.$id.'">';
			echo $step['content'];

			// Navigation buttons
			echo '<ul class="list-inline pull-right">';
			if (!$first) {
				echo '<li><button id="'.$this->id.'_step'.$id.'_prev" type="button" class="btn btn-default prev-step">'.$this->button_previous.'</button></li>';
			}
			if (array_key_exists('skip', $step) and $step('skip') === true) {
				echo '<li><button id="'.$this->id.'_step'.$id.'_skip" type="button" class="btn btn-default next-step">'.$this->button_skip.'</button></li>';
			}
			if ($id == $last_id) {
				echo '<li><button id="'.$this->id.'_step'.$id.'_save" type="button" class="btn btn-primary next-step">'.$this->button_save.'</button></li>';
			} else {
				echo '<li><button id="'.$this->id.'_step'.$id.'_next" type="button" class="btn btn-primary next-step">'.$this->button_next.'</button></li>';
			}
			echo '</ul>';

			echo '</div>';
			$first = false;
		}

		// Add a complete tab if defined
		if ($this->complete_content) {
			echo '<div class="tab-pane" role="tabpanel" id="complete">';
			echo $this->complete_content;
			echo '</div>';
		}
		// Finish tabs
		echo '</div>';

		// Finalize the content tabs
		echo '<div class="clearfix"></div>';

		// Finish widget
		echo '</div>';
	}
}