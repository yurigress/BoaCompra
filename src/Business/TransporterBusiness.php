<?php

namespace YuriGress\BoaCompra\Business;

use YuriGress\BoaCompra\Entity\Product;
use YuriGress\BoaCompra\Entity\Rate;
use YuriGress\BoaCompra\Entity\Transporter;
use YuriGress\BoaCompra\Entity\Trip;
use YuriGress\BoaCompra\Mapping\TransporterMapping;

class TransporterBusiness {
	/** @var TransporterMapping */
	private $_mapping;
	
	/** @var RateBusiness */
	private $_rateBusiness;
	
	public function __construct(TransporterMapping $transporterMapping, RateBusiness $rateBusiness) {
		$this->_mapping = $transporterMapping;
		$this->_rateBusiness = $rateBusiness;
	}
	
	public function makeBudget(Trip $trip, Product $product): array {
		$output = [];
		$transporters = $this->_mapping->search();
		
		/** @var Transporter $transporter */
		foreach ($transporters as $transporter) {
			$rates = $transporter->getRates();
			/** @var Rate $rate */
			foreach ($rates as $rate) {
				$output[] = [
					'value' => $value = $this->_rateBusiness->applyRate($rate, $product, $trip),
					'transporter' => $transporter->getName()
				];
			}
		}
		
		return $output;
	}
}