<?php

namespace YuriGress\BoaCompra\Business;

use YuriGress\BoaCompra\Entity\Product;
use YuriGress\BoaCompra\Entity\Rate;
use YuriGress\BoaCompra\Entity\Transporter;
use YuriGress\BoaCompra\Entity\Trip;
use YuriGress\BoaCompra\Entity\TripProduct;
use YuriGress\BoaCompra\Mapping\ProductMapping;
use YuriGress\BoaCompra\Mapping\RateMapping;
use YuriGress\BoaCompra\Mapping\TransporterMapping;

class TripBusiness {
	/** @var ProductMapping */
	private $_productMapping;
	
	/** @var TransporterBusiness */
	private $_transporterBusiness;
	
	public function __construct(ProductMapping $productMapping, TransporterBusiness $transporterBusiness) {
		$this->_productMapping = $productMapping;
		$this->_transporterBusiness = $transporterBusiness;
	}
	
	/**
	 * Calcula os valores da viagem através de um array
	 * @param array $trips
	 * @return array
	 */
	public function calculateFromArray(array $trips): array {
		$budgets = [];
		
		/** @var Trip $trip */
		foreach ($trips as $trip) {
			$products = $this->_getTripProducts($trip);
			
			/** @var Product $product */
			foreach ($products as $product) {
				$budgets[] = [
					'budget' => $this->_rankBudgets($this->_transporterBusiness->makeBudget($trip, $product)),
					'product' => $product->toArray(),
					'trip' => $trip->toArray(),
				];
			}
		}
		
		return $budgets;
	}
	
	private function _getTripProducts(Trip $trip) {
		$products = [];
		/** @var TripProduct $tripProduct */
		foreach ($trip->getTripProducts() as $tripProduct) {
			$products[] = $this->_productMapping->find($tripProduct->getIdProduct());
		}
		
		return $products;
	}
	
	/**
	 * 
	 * @param array $budget
	 * @return array
	 */
	private function _rankBudgets(array $budget): array {
		usort($budget, function ($a, $b) {
			return !($a['value'] < $b['value']);
		});
		return $budget;
	}
}