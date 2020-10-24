<?php

namespace YuriGress\BoaCompra\Mapping;

use YuriGress\BoaCompra\Entity\InterfaceEntity;
use YuriGress\BoaCompra\Entity\Transporter;

class TransporterMapping extends AbstractMapping {
	protected function setEntityName(): void {
		$this->entityName = Transporter::class;
	}
	
	protected function setData(): void {
		$this->data = new \ArrayIterator([
			['id' => '2b312b53-f8fa-4d79-92d5-ca53728ab2d4', 'name' => 'BoaDex'],
			['id' => '8e34c708-f8ac-4fff-8242-f146182f8559', 'name' => 'BoaLog'],
			['id' => '07330558-d6e0-4ae5-9a80-47d855325903', 'name' => 'Transboa'],
		]);
	}
}