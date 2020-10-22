<?php

namespace YuriGress\BoaCompra\Entity;

class Transporter {
	
	/** @var string Identificar da transportadora */
	private $id;
	
	/** @var string Nome da transportadora */
	private $name;
	
	/** @var Rate[] */
	private $rates;
	
	public function __construct() {
		$this->rates = new \ArrayIterator();
	}
	
	public function getId(): string {
		return $this->id;
	}
	
	public function setId(string $id): Transporter {
		$this->id = $id;
		return $this;
	}
	
	public function getName(): string {
		return $this->name;
	}
	
	public function setName(string $name): Transporter {
		$this->name = $name;
		return $this;
	}
	
	public function getRates(): array {
		return $this->rates->getArrayCopy();
	}
	
	public function getRate(Rate $rate): ?Rate {
		$this->rates->rewind();
		while ($this->rates->valid()) {
			/** @var Rate $current */
			$current = $this->rates->current();
			if ($rate->getId() == $current->getId()) {
				return $current;
			}
			$this->rates->next();
		}
		return null;
	}
	
	public function addRate(Rate $rate): Transporter {
		$this->rates->append($rate);
		return $this;
	}
	
	public function removeRate(Rate $rate): Transporter {
		foreach ($this->rates as $index => $r) {
			if ($r->getId() == $rate->getId()) {
				$this->rates->offsetUnset($index);
			}
		};
		return $this;
	}
}