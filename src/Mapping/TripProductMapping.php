<?php

namespace YuriGress\BoaCompra\Mapping;

use YuriGress\BoaCompra\Entity\TripProduct;

class TripProductMapping extends AbstractMapping {
	protected function setEntityName(): void {
		$this->entityName = TripProduct::class;
	}
	
	protected function setData(): void {
		$this->data = new \ArrayIterator([
			[
				'id' => '9955cf85-0ae1-41a9-a659-d2f96a42aab6',
				'idProduct' => '6917fbe0-5169-4019-95bb-6d621fefb4a9',
				'idTrip' => 'df7bb88f-3b67-49de-8dab-9a946c738615'
			],
			[
				'id' => '0e84ef87-fb74-4852-b5db-5e2e9726b329',
				'idProduct' => 'c9620995-9665-45aa-a279-2f0a1a141f34',
				'idTrip' => '524d79ae-5c2a-4c05-887b-a68471116bd9'
			],
			[
				'id' => '0258453c-46e6-4900-8d1d-916cb698bb8a',
				'idProduct' => 'c11c4901-0d14-49aa-b2f9-096845269a3e',
				'idTrip' => '1b807c0b-aa0f-45f3-9e4b-d7c2e98da3e2'
			],
			[
				'id' => '568a655a-70c5-4a7a-a859-daef81157508',
				'idProduct' => '6917fbe0-5169-4019-95bb-6d621fefb4a9',
				'idTrip' => '9455585f-1f13-43b6-80a6-f28f3e633adf'
			],
			[
				'id' => '032ee250-7523-4570-990c-3a4ca8e58041',
				'idProduct' => '6917fbe0-5169-4019-95bb-6d621fefb4a9',
				'idTrip' => '91e7e9d5-a2e6-46ca-9a77-974febfe9699'
			],
			[
				'id' => '0625bb7e-8f4c-4544-8c1d-25f6c235575c',
				'idProduct' => '6917fbe0-5169-4019-95bb-6d621fefb4a9',
				'idTrip' => '4edd93f8-6539-4309-b644-cb1f39c42318'
			],
			[
				'id' => '90bdc0a6-068f-4235-9137-ca20d9066723',
				'idProduct' => 'c9620995-9665-45aa-a279-2f0a1a141f34',
				'idTrip' => 'ca0c9d17-4c08-4923-9dba-8682119f2390'
			],
			[
				'id' => '06b8e855-625e-4182-9c03-54df5c0bb3fd',
				'idProduct' => 'a0792e6d-3d5b-4cfb-8b4c-9f5c51ea4aa9',
				'idTrip' => 'fc1f9a6d-8b73-45fd-b4a0-c6cd7a1cd481'
			],
			[
				'id' => '3f967160-fa13-4090-83dd-f583058b3ee4',
				'idProduct' => 'a9770dd8-0510-4618-8d20-5eb4bef2556e',
				'idTrip' => 'ffa7a27d-fb20-4a75-adb7-4abeb8743710'
			],
			[
				'id' => 'f79880b2-bf4a-48e2-ab3b-b2f24aa3d811',
				'idProduct' => 'c11c4901-0d14-49aa-b2f9-096845269a3e',
				'idTrip' => '7d3ebd8d-1349-4650-b475-86bf5d3aca53'
			],
		]);
	}
}