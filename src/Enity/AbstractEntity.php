<?php

namespace YuriGress\BoaCompra\Entity;

use YuriGress\BoaCompra\Mapping\InterfaceMapping;

abstract class AbstractEntity implements InterfaceEntity {
	/** @var array Atributos que são expansíveis */
	protected $expandable = [];
	
	/** @var string|null Nome da classe mapping referente a entidade */
	protected $mapping = null;
	
	public function __construct($data = null) {
		if (!is_null($data) && is_array($data)) {
			$this->fillFromArray($data);
		}
		
		$this->setMapping();
		$this->validateExpandable();
	}
	
	/**
	 * Preenche as propriedades da classe através de um array.
	 * 
	 * Exemplo: [
	 *     'name' => 'Teste',
	 *     'weight' => 10.0 
	 * ]
	 * @param array $data
	 */
	public function fillFromArray(array $data) {
		foreach ($data as $field => $value) {
			if (!property_exists($this, $field)) {
				continue;
			}
			
			$field = ucfirst($field);
			$method = "set{$field}";
			$this->$method($value);
		}
	}
	
	/**
	 * Obtem um cópia da classe no formato array
	 * @return array
	 */
	public function toArray(): array {
		$output = [];
		$methods = get_class_methods($this);
		foreach ($methods as $method) {
			if (substr($method, 0, 3) === 'get') {
				$field = lcfirst(substr($method, 3));
				$output[$field] = $this->$method();
			}
		}
		return $output;
	}
	
	/**
	 * Verifica se há atributos expansíveis 
	 * @return bool
	 */
	public function hasExpandable(): bool {
		return !empty($this->expandable);
	}
	
	/**
	 * Valida se os atributos expansível são do formato array e se os itens são do tipo correto
	 */
	private function validateExpandable() {
		if (!empty($this->expandable) && !is_array($this->expandable)) {
			throw new \InvalidArgumentException('Atributos expansíveis devem ser do tipo array');
		}
		
		foreach ($this->expandable as $item) {
			if (!(new $item() instanceof InterfaceEntity)) {
				throw new \InvalidArgumentException('O atributo expansível não é do tipo correto');
			}
		}
	}
	
	/**
	 * @return array
	 */
	public function getExpandable(): ?array {
		return $this->expandable;
	}
	
	public function getMapping(): ?string {
		return $this->mapping;
	}
	
	/**
	 * @return $this
	 */
	abstract public function setMapping(): self;
}