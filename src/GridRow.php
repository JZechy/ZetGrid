<?php

namespace Zet\Grid;

/**
 * Class GridRow
 * @author Zechy <email@zechy.cz>
 * @package Zet\Grid
 */
class GridRow extends GridComponent {

	/**
	 * @var string
	 */
	protected $htmlTemplate = "tr";

	/**
	 * @var GridColumn[]
	 */
	protected $columns = array();

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
	 * @param string $content
	 * @return \Components\Common\Grid\GridColumn
	 * @throws \Exception
	 */
	public function addColumn($content = "") {
		$column = new GridColumn($content);
		$this->columns[] = $column;

		return $column;
	}

	/**
	 * @return \Nette\Utils\Html
	 */
	public function render() {
		$tr = parent::render();

		foreach($this->columns as $column) {
			$tr->add($column->render());
		}

		return $tr;
	}

}