<?php

namespace YuriGress\BoaCompra\Entity;

use YuriGress\BoaCompra\Mapping\TransporterMapping;

class Transporter extends AbstractEntity {
	
	/** @var string Identificar da transportadora */
	private $id;
	
	/** @var string Nome da transportadora */
	private $name;
	
	/** @var \ArrayIterator */
	private $rates;
	
	protected $expandable = ['rates' => Rate::class];
	
	public function __construct($data = null) {
		parent::__construct($data);
		
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
	
	public function setRates(\ArrayIterator $rates): Transporter {
		$this->rates = $rates;
		return $this;
	}
	
	public function getRates(): array {
		return $this->rates->getArrayCopy();
	}
	
	public function getRate(string $idRate): ?Rate {
		$this->rates->rewind();
		while ($this->rates->valid()) {
			/** @var Rate $current */
			$current = $this->rates->current();
			if ($idRate == $current->getId()) {
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
	
	public function setMapping(): AbstractEntity {
		$this->mapping = TransporterMapping::class;
		return $this;
	}
}