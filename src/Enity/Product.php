<?php

namespace YuriGress\BoaCompra\Entity;

class Product {
	
	/** @var string Identificado de produto */
	private $id;
	
	/** @var string Nome do produto */
	private $name;
	
	/** @var string Tipo da unidade do produto (KG|UN|...) */
	private $unitaryType;
	
	public const UNITARY_TYPE_KG = 'KG';
	
	public function getId(): string {
		return $this->id;
	}
	
	public function setId(string $id): Product {
		$this->id = $id;
		return $this;
	}
	
	public function getName(): string {
		return $this->name;
	}
	
	public function setName(string $name): Product {
		$this->name = $name;
		return $this;
	}
	
	public function getUnitaryType(): string {
		return $this->unitaryType;
	}
	
	public function setUnitaryType(string $unitaryType): Product {
		$this->unitaryType = $unitaryType;
		return $this;
	}
}