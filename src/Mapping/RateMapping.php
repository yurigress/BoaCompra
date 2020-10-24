<?php

namespace YuriGress\BoaCompra\Mapping;

use YuriGress\BoaCompra\Entity\InterfaceEntity;
use YuriGress\BoaCompra\Entity\Rate;

class RateMapping extends AbstractMapping {
	protected function setEntityName(): void {
		$this->entityName = Rate::class;
	}
	
	protected function setData(): void {
		$this->data = new \ArrayIterator([
			[
				'id' => 'dd51311c-774e-428c-94fd-078f006d696f',
				'idTransporter' => '2b312b53-f8fa-4d79-92d5-ca53728ab2d4',
				'fixedValue' => 10.00,
				'unitaryValue' => 0.05,
				'criteriaValue' => null,
				'criteriaType' => null,
				'criteriaOperator' => null,
			],
			[
				'id' => 'fdd0bec2-70c6-4e79-bd2e-5ec86963e125',
				'idTransporter' => '8e34c708-f8ac-4fff-8242-f146182f8559',
				'fixedValue' => 4.30,
				'unitaryValue' => 0.12,
				'criteriaValue' => null,
				'criteriaType' => null,
				'criteriaOperator' => null,
			],
			[
				'id' => '1d1fcdc8-34bd-46d0-92df-7bbaff2b0e0e',
				'idTransporter' => '07330558-d6e0-4ae5-9a80-47d855325903',
				'fixedValue' => 2.10,
				'unitaryValue' => 1.10,
				'criteriaValue' => 5,
				'criteriaType' => 'KG',
				'criteriaOperator' => 'LESS_THAN_OR_EQUAL_TO',
			],
			[
				'id' => '00bc9c37-3b78-44f6-a452-1d03eda5de7e',
				'idTransporter' => '07330558-d6e0-4ae5-9a80-47d855325903',
				'fixedValue' => 10.00,
				'unitaryValue' => 0.01,
				'criteriaValue' => 5,
				'criteriaType' => 'KG',
				'criteriaOperator' => 'GREATER_THAN',
			],
		]);
	}
}