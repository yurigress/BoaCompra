<?php

namespace YuriGress\BoaCompra\Entity;

class Trip {
	
	/** @var string Identificado da viagem */
	private $id;
	
	/** @var float Distância da viagem */
	private $distance;
	
	/** @var float Pesso total da viagem */
	private $totalWeight;
	
	public function getId(): string {
		return $this->id;
	}
	
	public function setId(string $id): Trip {
		$this->id = $id;
		return $this;
	}
	
	public function getDistance(): float {
		return $this->distance;
	}
	
	public function setDistance(float $distance): Trip {
		$this->distance = $distance;
		return $this;
	}
	
	public function getTotalWeight(): float {
		return $this->totalWeight;
	}
	
	public function setTotalWeight(float $totalWeight): Trip {
		$this->totalWeight = $totalWeight;
		return $this;
	}
}