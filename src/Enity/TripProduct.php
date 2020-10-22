<?php

namespace YuriGress\BoaCompra\Entity;

class TripProduct {
	
	/** @var string Identificador do registro */
	private $id;
	
	/** @var string Identificador da viagem. "Foreign key" com Trip */
	private $idTrip;
	
	/** @var string Identificador do produto. "Foreign key" com Product */
	private $idProduct;
	
	/** @var float Peso do produto para a viagem */
	private $weight;
	
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
	
	public function getWeight(): float {
		return $this->weight;
	}
	
	public function setWeight(float $weight): TripProduct {
		$this->weight = $weight;
		return $this;
	}
}