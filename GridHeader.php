<?php

namespace Zet\Grid;

/**
 * Class GridHeader
 * @author Zechy <email@zechy.cz>
 * @package Zet\Grid
 */
class GridHeader extends GridRow {

	/**
	 * @var string
	 */
	protected $htmlTemplate = "tr";

	/**
	 * @var string
	 */
	protected $cellHtmlTemplate = "th";

	/**
	 * @param string $cellHtmlTemplate
	 */
	public function setCellHtmlTemplate($cellHtmlTemplate) {
		$this->cellHtmlTemplate = $cellHtmlTemplate;
	}

	/**
	 * @return \Nette\Utils\Html
	 */
	public function render() {
		foreach($this->columns as &$column) {
			$column->setHtmlTemplate($this->cellHtmlTemplate);
		}

		$tr = parent::render();
		$thead = \Nette\Utils\Html::el("thead");
		$thead->add($tr);

		return $thead;
	}
}