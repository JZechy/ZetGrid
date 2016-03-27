# ZetGrid nette component

[![Latest stable](https://img.shields.io/packagist/v/jzechy/zetgrid.svg?style=flat-square)](https://packagist.org/packages/jzechy/zetgrid)
[![Downloads Total](https://img.shields.io/packagist/dt/jzechy/zetgrid.svg?style=flat-square)](https://packagist.org/packages/jzechy/zetgrid)
[![Open Issues](https://img.shields.io/github/issues/jzechy/zetgrid.svg?style=flat-square)](https://github.com/JZechy/ZetGrid/issues)

ZetGrid je jednoduchá komponenta v Nette, která umožňuje vytváření tzv. datagridu a kterou programátor plní za běhu dle svých potřeb,
např. při iteraci nad seznamem entit.

Komponenta funguje jako továrnička, kterou přidáte do konfiguračního souboru a pak už jen vytváříte její instanci.

```
services:
	- Zet\Grid\IGridFactory
```
* [Rychlá dokumentace](https://github.com/JZechy/ZetGrid/wiki/Rychl%C3%A1-dokumentace)

## Composer
```
composer require jzechy/zetgrid
```

## Ukázový kod
```php
protected function createComponentUserGrid() {
		$grid = $this->gridFactory->create();

		$header = $grid->addHeader();
		$header->addColumn("#");
		$header->addColumn("Uživatelské jméno");
		$header->addColumn("Email");
		$header->addColumn();

		foreach($this->getUsers() as $user) {
			$row = $grid->addRow();
			$row->addColumn($user->getId());
			$row->addColumn($user->getUsername());
			$row->addColumn($user->getEmail())
				->setLink("mailto:". $user->getEmail());

			$buttons = $row->addColumn()->addClass("text-right");
			$buttons->addButton()
				->addAttribute("title", "Upravit uživatele")
				->addClass("btn btn-warning btn-xs")
				->setIcon("glyphicon glyphicon-pencil")
				->setLink($this->link("edit", $user->getId()));
			$buttons->addButton()
				->addAttribute("title", "Smazat uživatele")
				->addClass("btn btn-danger btn-xs")
				->setIcon("glyphicon glyphicon-remove")
				->setLink($this->link("delete", $user->getId()));
		}

		return $grid;
	}
```
