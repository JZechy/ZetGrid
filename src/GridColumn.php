<?php

namespace Zet\Grid;

/**
 * Class GridColumn
 * @author Zechy <email@zechy.cz>
 * @package Zet\Grid
 */
class GridColumn extends GridComponent {

	/**
	 * @var string
	 */
	private $htmlTemplate = "td";

	/**
	 * @var mixed
	 */
	private $content;

	/**
	 * @var string
	 */
	private $link = "";

	/**
	 * @var array
	 */
	private $buttons = array();

	/**
	 * @var string
	 */
	private $labelClass = "";

	/**
	 * @var string
	 */
	private $labelText = "";

	/**
	 * GridColumn constructor.
	 * @param $content
	 */
	public function __construct($content) {
		$this->content = $content;
	}

	/**
	 * @param string $htmlTemplate
	 */
	public function setHtmlTemplate($htmlTemplate) {
		$this->htmlTemplate = $htmlTemplate;
	}

	/**
	 * @return string
	 */
	public function getHtmlTemplate() {
		return $this->htmlTemplate;
	}

	/**
	 * @param string $link
	 */
	public function setLink($link) {
		$this->link = $link;
	}

	/**
	 * @param string $label
	 * @return \Components\Common\Grid\GridButton
	 */
	public function addButton($label = "") {
		$button = new GridButton();
		$button->setLabel($label);
		$this->buttons[] = $button;

		return $button;
	}

	/**
	 * @param string $class
	 * @param string $text
	 * @return $this
	 */
	public function setLabel($class, $text) {
		$this->labelClass = $class;
		$this->labelText = $text;
		return $this;
	}

	/**
	 * @return \Nette\Utils\Html
	 */
	public function render() {
		$td = parent::render();
		if(!empty($this->link)) {
			$a = \Nette\Utils\Html::el("a");
			$a->href($this->link);
			$a->setText($this->content);
			$td->add($a);
		} else {
			$td->setText($this->content);
		}

		if(!empty($this->labelText) && !empty($this->labelClass)) {
			$label = \Nette\Utils\Html::el("span");
			$label->class[] = $this->labelClass;
			$label->setText($this->labelText);
			$td->add("&nbsp;" . $label->render());
		}

		if(!empty($this->buttons)) {
			foreach($this->buttons as $button) {
				$td->add($button->render() . "&nbsp;");
			}
		}

		return $td;
	}


}