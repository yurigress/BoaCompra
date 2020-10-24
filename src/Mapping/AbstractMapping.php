<?php

namespace YuriGress\BoaCompra\Mapping;

use YuriGress\BoaCompra\Entity\AbstractEntity;
use YuriGress\BoaCompra\Entity\InterfaceEntity;

abstract class AbstractMapping implements InterfaceMapping {
	protected $entityName = null;
	
	/** @var \ArrayIterator */
	protected $data = [];
	
	/**
	 * 
	 * AbstractMapping constructor.
	 */
	final public function __construct() {
		$this->setEntityName();
		$this->setData();
	}
	
	/**
	 * @param string|InterfaceEntity $identity
	 * @return InterfaceEntity|array|null
	 * @throws \Exception
	 */
	public function find($identity): ?InterfaceEntity {
		if (!is_string($identity) && !($identity instanceof InterfaceEntity)) {
			throw new \InvalidArgumentException();
		}
		
		if (empty($this->entityName)) {
			throw new \Exception("Entidade não informada");
		}
		
		if ($identity instanceof InterfaceEntity) {
			$identity = $identity->getId();
		}
		
		$output = current($this->search(function ($record) use ($identity) {
			return $record['id'] === $identity;
		}));
		
		if (!$output) {
			return null;
		}
		
		return $output;
	}
	
	public function search(\Closure $extraCriteria = null): ?array {
		$records = $this->data->getArrayCopy();
		if ($extraCriteria) {
			$records = array_filter($this->data->getArrayCopy(), $extraCriteria);
		}
		return array_map(function ($data) {
			/** @var AbstractEntity $entity */
			$entity = new $this->entityName($data);
			
			if (!empty($entity->hasExpandable())) {
				$mappingField = 'id' . str_replace('\\', '', strrchr($this->entityName, '\\'));
				foreach ($entity->getExpandable() as $expandableField => $expandableEntity) {
					$methodSetExpandable = 'set' . ucfirst($expandableField);
					
					/** @var AbstractEntity $expandableEntity */
					$expandableEntity = new $expandableEntity();
					$expandableMapping = $expandableEntity->getMapping();
					$expandableMapping = new $expandableMapping();
					
					$expandableData = $expandableMapping->search(function($mappingData) use ($mappingField, $entity) {
						return ($mappingData[$mappingField] == $entity->getId());
					});
					
					$entity->$methodSetExpandable(new \ArrayIterator($expandableData));
				}
			}
			
			return $entity;
		}, $records);
	}
	
	/**
	 * @inheritDoc
	 */
	public function insert(InterfaceEntity $entity) {
		// TODO: Implement insert() method.
	}
	
	/**
	 * @inheritDoc
	 */
	public function update(InterfaceEntity $entity) {
		// TODO: Implement update() method.
	}
	
	/**
	 * @inheritDoc
	 */
	public function delete($identity) {
		// TODO: Implement delete() method.
	}
	
	abstract protected function setEntityName(): void;
	
	abstract protected function setData(): void;
}