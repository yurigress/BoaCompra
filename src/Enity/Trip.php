<?php

namespace YuriGress\BoaCompra\Entity;

use YuriGress\BoaCompra\Mapping\TripMapping;
use YuriGress\BoaCompra\Mapping\TripProductMapping;

class Trip extends AbstractEntity {
	
	/** @var string Identificado da viagem */
	private $id;
	
	/** @var float Distância da viagem */
	private $distance;
	
	/** @var float Pesso total da viagem */
	private $totalWeight;
	
	/** @var \ArrayIterator */
	private $tripProducts;
	
	protected $expandable = ['tripProducts' => TripProduct::class];
	
	public function __construct($data = null) {
		parent::__construct($data);
		
		$this->tripProducts = new \ArrayIterator();
	}
	
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
	
	public function getTripProducts(): array {
		return $this->tripProducts->getArrayCopy();
	}
	
	public function setTripProducts(\ArrayIterator $tripProducts): Trip {
		$this->tripProducts = $tripProducts;
		return $this;
	}
	
	public function addTripProduct(TripProduct $tripProduct): Trip {
		$this->tripProducts->append($tripProduct);
		return $this;
	}
	
	public function removeTripProduct(string $identity): Trip {
		/** @var TripProduct $tripProduct */
		foreach ($this->tripProducts as $index => $tripProduct) {
			if ($tripProduct->getId() == $identity) {
				$this->tripProducts->offsetUnset($index);
			}
		}
		return $this;
	}
	
	public function setMapping(): AbstractEntity {
		$this->mapping = TripMapping::class;
		return $this;
	}
}