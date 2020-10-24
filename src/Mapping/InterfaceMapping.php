<?php

namespace YuriGress\BoaCompra\Mapping;

use YuriGress\BoaCompra\Entity\InterfaceEntity;

interface InterfaceMapping {
	public function __construct();
	
	/** Obtem um registro através do seu identificador
	 * @param $identity mixed
	 * @return InterfaceEntity|null
	 */
	public function find($identity): ?InterfaceEntity;
	
	/**
	 * Obtem os registro através de algum critério
	 * @param \Closure $extraCriteria
	 * @return mixed
	 */
	public function search(\Closure $extraCriteria): ?array;
	
	/**
	 * Insere um novo registro
	 * @param InterfaceEntity $entity
	 * @return mixed
	 */
	public function insert(InterfaceEntity $entity);
	
	/**
	 * Atualiza um registro
	 * @param InterfaceEntity $entity
	 * @return mixed
	 */
	public function update(InterfaceEntity $entity);
	
	/**
	 * Remove um registro através do seu identificador
	 * @param $identity
	 * @return mixed
	 */
	public function delete($identity);
}