<?php

namespace Zet\Grid;

/**
 * Class GridButton
 * @author Zechy <email@zechy.cz>
 * @package Zet\Grid
 */
class GridButton extends GridComponent {

	/**
	 * @var string
	 */
	private $htmlTemplate = "a class='btn'";

	/**
	 * @var string
	 */
	private $label;

	/**
	 * @var string
	 */
	private $icon = "";

	/**
	 * @var string
	 */
	private $link = "#";

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setLabel($label) {
		$this->label = $label;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getLabel() {
		return $this->label;
	}

	/**
	 * @param string $link
	 * @return $this
	 */
	public function setLink($link) {
		$this->link = $link;

		return $this;
	}

	/**
	 * @param $icon
	 * @return $this
	 */
	public function setIcon($icon) {
		$this->icon = $icon;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getHtmlTemplate() {
		return $this->htmlTemplate;
	}

	/**
	 * @param string $htmlTemplate
	 * @return $this
	 */
	public function setHtmlTemplate($htmlTemplate) {
		$this->htmlTemplate = $htmlTemplate;

		return $this;
	}

	/**
	 * @return \Nette\Utils\Html
	 */
	public function render() {
		$a = parent::render();

		$a->href = $this->link;
		if(!empty($this->icon)) {
			$icon = \Nette\Utils\Html::el("i");
			$icon->class[] = $this->icon;
			$a->setHtml($icon->render() . " " . $this->label);
		} else {
			$a->setText($this->label);
		}

		return $a;
	}
}