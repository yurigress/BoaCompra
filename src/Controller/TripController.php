<?php

namespace YuriGress\BoaCompra\Controller;

use YuriGress\BoaCompra\Business\TripBusiness;
use YuriGress\BoaCompra\Mapping\TripMapping;

class TripController {
	/** @var TripBusiness */
	private $_tripBusiness;
	
	private $_tripMapping;
	
	public function __construct(TripBusiness $tripBusiness, TripMapping $tripMapping) {
		$this->_tripBusiness = $tripBusiness;
		$this->_tripMapping = $tripMapping;
	}
	
	public function calculateFromArray(): void {
		try {
			$data = $this->_tripMapping->search();
			$calculed = $this->_tripBusiness->calculateFromArray($data);
			$this->makeView($calculed);
		} catch (\Exception $e) {
			echo $e->getMessage();
		}
	}
	
	private function makeView(array $calculed) {
		foreach ($calculed as $item) {
			$product = $item['product'];
			$trip = $item['trip'];
			
			print "<strong>Produto:</strong> {$product['name']} - <strong>Peso:</strong> {$product['weight']} {$product['unitaryType']} - <strong>Distância:</strong> {$trip['distance']} KM <br><br>";
			foreach ($item['budget'] as $budget) {
				$value = numfmt_format_currency(numfmt_create( 'pt_BR', \NumberFormatter::CURRENCY), $budget['value'], 'BRL');
				print "<strong>Transportadora:</strong> {$budget['transporter']} - <strong>Valor:</strong> {$value} <br>";
			}
			
			print '<br> ======================================================== <br>';
		}
	}
}