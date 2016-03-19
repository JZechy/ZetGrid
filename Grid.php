<?php

namespace Zet\Grid;

/**
 * Class Grid
 * @author Zechy <email@zechy.cz>
 * @package Zet\Grid
 */
class Grid extends \Nette\Application\UI\Control {

	/**
	 * @var string
	 */
	private $htmlTemplate = "table class='table table-hover'";

	/**
	 * @var GridRow[]
	 */
	private $rows = array();

	/**
	 * @param string $htmlTemplate
	 */
	public function setHtmlTemplate($htmlTemplate) {
		$this->htmlTemplate = $htmlTemplate;
	}

	/**
	 * @return \Components\Common\Grid\GridRow
	 * @throws \Exception
	 */
	public function addRow() {
		$row = new GridRow();
		$this->rows[] = $row;

		return $row;
	}

	/**
	 * @return \Components\Common\Grid\GridHeader
	 * @throws \Exception
	 */
	public function addHeader() {
		$header = new GridHeader();
		array_unshift($this->rows, $header);

		return $header;
	}

	/**
	 * render description
	 */
	public function render() {
		$table = \Nette\Utils\Html::el($this->htmlTemplate);
		foreach($this->rows as $row) {
			$table->add($row->render());
		}

		echo (string) $table;
	}
}

/**
 * Interface IGridFactory
 * @author Zechy <email@zechy.cz>
 * @package Zet\Grid
 */
interface IGridFactory {

	/**
	 * @return Grid
	 */
	public function create();
}