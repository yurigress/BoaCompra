<?php

namespace YuriGress\BoaCompra\Business;

use YuriGress\BoaCompra\Entity\Product;
use YuriGress\BoaCompra\Entity\Rate;
use YuriGress\BoaCompra\Entity\Trip;

class RateBusiness {
	/**
	 * Aplica a taxa sobre o produto
	 * @param Rate $rate
	 * @param Product $product
	 * @param Trip $trip
	 * @return float|int
	 */
	public function applyRate(Rate $rate, Product $product, Trip $trip) {
		$value = $rate->getFixedValue() + ($product->getWeight() * $trip->getDistance() * $rate->getUnitaryValue());
		if ($rate->hasCriteria() && $rate->getCriteriaType() == $product->getUnitaryType()) {
			switch ($rate->getCriteriaOperator()) {
				case Rate::CRITERIA_OPERATOR_EQUAL_TO:
					if ($product->getWeight() == $rate->getUnitaryValue()) {
						$value = $rate->getFixedValue() + ($product->getWeight() * $trip->getDistance() * $rate->getUnitaryValue());
					}
					break;
				case Rate::CRITERIA_OPERATOR_LESS_THAN:
					if ($product->getWeight() < $rate->getUnitaryValue()) {
						$value = $rate->getFixedValue() + ($product->getWeight() * $trip->getDistance() * $rate->getUnitaryValue());
					}
					break;
				case Rate::CRITERIA_OPERATOR_GREATER_THAN:
					if ($product->getWeight() > $rate->getUnitaryValue()) {
						$value = $rate->getFixedValue() + ($product->getWeight() * $trip->getDistance() * $rate->getUnitaryValue());
					}
					break;
				case Rate::CRITERIA_OPERATOR_LESS_THAN_OR_EQUAL_TO:
					if ($product->getWeight() <= $rate->getUnitaryValue()) {
						$value = $rate->getFixedValue() + ($product->getWeight() * $trip->getDistance() * $rate->getUnitaryValue());
					}
					break;
				case Rate::CRITERIA_OPERATOR_GREATER_THAN_OR_EQUAL_TO:
					if ($product->getWeight() >= $rate->getUnitaryValue()) {
						$value = $rate->getFixedValue() + ($product->getWeight() * $trip->getDistance() * $rate->getUnitaryValue());
					}
					break;
				default:
					$value = $rate->getFixedValue() + ($product->getWeight() * $trip->getDistance() * $rate->getUnitaryValue());
					break;
			}
		}
		return $value;
	}
}