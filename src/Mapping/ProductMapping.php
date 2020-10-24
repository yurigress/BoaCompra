<?php

namespace YuriGress\BoaCompra\Mapping;

use YuriGress\BoaCompra\Entity\InterfaceEntity;
use YuriGress\BoaCompra\Entity\Product;

class ProductMapping extends AbstractMapping {
	protected function setEntityName(): void {
		$this->entityName = Product::class;
	}
	
	protected function setData(): void {
		$this->data = new \ArrayIterator([
			[
				'id' => '6917fbe0-5169-4019-95bb-6d621fefb4a9',
				'name' => 'Fone de ouvido',
				'unitaryType' => 'KG',
				'weight' => 1.0,
			],
			[
				'id' => 'c9620995-9665-45aa-a279-2f0a1a141f34',
				'name' => 'Controle Xbox',
				'unitaryType' => 'KG',
				'weight' => 3.0,
			],
			[
				'id' => 'c11c4901-0d14-49aa-b2f9-096845269a3e',
				'name' => 'Pc Gamer',
				'unitaryType' => 'KG',
				'weight' => 35.0,
			],
			[
				'id' => 'a0792e6d-3d5b-4cfb-8b4c-9f5c51ea4aa9',
				'name' => 'Kit Gamer',
				'unitaryType' => 'KG',
				'weight' => 5.0,
			],
			[
				'id' => 'a9770dd8-0510-4618-8d20-5eb4bef2556e',
				'name' => 'Teclado + Fone',
				'unitaryType' => 'KG',
				'weight' => 6.0,
			],
		]);
	}
}