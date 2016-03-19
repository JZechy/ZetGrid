<?php

namespace Zet\Grid;

/**
 * Class GridComponent
 * @author Zechy <email@zechy.cz>
 * @package Zet\Grid
 */
abstract class GridComponent extends \Nette\Object {

	/**
	 * @var array
	 */
	protected $class = array();

	/**
	 * @var array
	 */
	protected $attrs = array();

	/**
	 * @param string|array $class
	 * @return $this
	 */
	public function addClass($class) {
		if(is_array($class)) {
			foreach($class as $className) {
				$this->class[] = $className;
			}
		} else {
			$this->class[] = $class;
		}

		return $this;
	}

	/**
	 * @param array $class
	 * @return $this
	 */
	public function setClass(array $class) {
		$this->class = $class;

		return $this;
	}

	/**
	 * @param string $name
	 * @param string $text
	 * @return $this
	 */
	public function addAttribute($name, $text) {
		$this->attrs[$name] = $text;
		return $this;
	}

	/**
	 * @param array $attrs
	 * @return $this
	 */
	public function setAttributes(array $attrs) {
		$this->attrs = $attrs;
		return $this;
	}

	/**
	 * @return string
	 */
	abstract public function getHtmlTemplate();

	/**
	 * @return \Nette\Utils\Html
	 */
	public function render() {
		$el = \Nette\Utils\Html::el($this->getHtmlTemplate());
		$el->class = $this->class;
		if(!empty($this->attrs)) {
			$el->addAttributes($this->attrs);
		}

		return $el;
	}
}