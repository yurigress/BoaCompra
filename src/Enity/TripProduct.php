<?php

namespace YuriGress\BoaCompra\Entity;

use YuriGress\BoaCompra\Mapping\TripProductMapping;

class TripProduct extends AbstractEntity {
	
	/** @var string Identificador do regis\tro */
	private $id;
	
	/** @var string Identificador da viagem. "Foreign key" com Trip */
	private $idTrip;
	
	/** @var string Identificador do produto. "Foreign key" com Product */
	private $idProduct;
	
	public function getId(): string {
		return $this->id;
	}
	
	public function setId(string $id): TripProduct {
		$this->id = $id;
		return $this;
	}
	
	public function getIdTrip(): string {
		return $this->idTrip;
	}
	
	public function setIdTrip(string $idTrip): TripProduct {
		$this->idTrip = $idTrip;
		return $this;
	}
	
	public function getIdProduct(): string {
		return $this->idProduct;
	}
	
	public function setIdProduct(string $idProduct): TripProduct {
		$this->idProduct = $idProduct;
		return $this;
	}
	
	public function setMapping(): AbstractEntity {
		$this->mapping = TripProductMapping::class;
		return $this;
	}
}