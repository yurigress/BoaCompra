<?php

namespace YuriGress\BoaCompra\Entity;

interface InterfaceEntity {
	public function getId();
	
	/**
	 * Obtem um cópia da classe no formato array
	 * @return array
	 */
	public function toArray(): array;
}