<?php

namespace YuriGress\BoaCompra\Mapping;

use YuriGress\BoaCompra\Entity\InterfaceEntity;
use YuriGress\BoaCompra\Entity\Trip;

class TripMapping extends AbstractMapping {
	protected function setEntityName(): void {
		$this->entityName = Trip::class;
	}
	
	protected function setData(): void {
		$this->data = new \ArrayIterator([
			['id' => 'df7bb88f-3b67-49de-8dab-9a946c738615', 'distance' => 1, 'totalWeight' => 1],
			['id' => '524d79ae-5c2a-4c05-887b-a68471116bd9', 'distance' => 1, 'totalWeight' => 3],
			['id' => '1b807c0b-aa0f-45f3-9e4b-d7c2e98da3e2', 'distance' => 1, 'totalWeight' => 35],
			['id' => '9455585f-1f13-43b6-80a6-f28f3e633adf', 'distance' => 430, 'totalWeight' => 1],
			['id' => '91e7e9d5-a2e6-46ca-9a77-974febfe9699', 'distance' => 33, 'totalWeight' => 1],
			['id' => '4edd93f8-6539-4309-b644-cb1f39c42318', 'distance' => 50, 'totalWeight' => 1],
			['id' => 'ca0c9d17-4c08-4923-9dba-8682119f2390', 'distance' => 100, 'totalWeight' => 3],
			['id' => 'fc1f9a6d-8b73-45fd-b4a0-c6cd7a1cd481', 'distance' => 1000, 'totalWeight' => 5],
			['id' => 'ffa7a27d-fb20-4a75-adb7-4abeb8743710', 'distance' => 5, 'totalWeight' => 6],
			['id' => '7d3ebd8d-1349-4650-b475-86bf5d3aca53', 'distance' => 1000, 'totalWeight' => 35],
		]);
	}
}