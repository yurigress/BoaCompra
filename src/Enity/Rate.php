<?php

namespace YuriGress\BoaCompra\Entity;

use YuriGress\BoaCompra\Mapping\RateMapping;

class Rate extends AbstractEntity {
	
	/** @var string Identificador da taxa. Utilizado uuid como identificador */
	private $id;
	
	/** @var string Transportadora "dona" da taxa */
	private $idTransporter;
	
	/** @var float Valor fixo da taxa. Sempre sera adicionado ao custa da viagem como um custo inicial */
	private $fixedValue;
	
	/** @var float Valor unitário da taxa. Ex: 0.12 */
	private $unitaryValue;
	
	/** @var float|null Valor para validação da taxa */
	private $criteriaValue;
	
	/** @var string|null Operador para validao da taxa */
	private $criteriaOperator;
	
	/** @var string|null Tipo do critério para validação da taxa (KG|KM) */
	private $criteriaType;
	
	public const CRITERIA_OPERATOR_LESS_THAN = 'LESS_THAN';
	public const CRITERIA_OPERATOR_GREATER_THAN = 'GREATER_THAN';
	public const CRITERIA_OPERATOR_EQUAL_TO = 'EQUAL_TO';
	public const CRITERIA_OPERATOR_LESS_THAN_OR_EQUAL_TO = 'LESS_THAN_OR_EQUAL_TO';
	public const CRITERIA_OPERATOR_GREATER_THAN_OR_EQUAL_TO = 'GREATER_THAN_OR_EQUAL_TO';
	
	public const CRITERIA_TYPE_KG = 'KG';
	public const CRITERIA_TYPE_KM = 'KM';
	
	public function getId(): string {
		return $this->id;
	}
	
	public function setId(string $id): Rate {
		$this->id = $id;
		return $this;
	}
	
	public function getIdTransporter(): string {
		return $this->idTransporter;
	}
	
	public function setIdTransporter(string $idTransporter): Rate {
		$this->idTransporter = $idTransporter;
		return $this;
	}
	
	public function getFixedValue(): float {
		return $this->fixedValue;
	}
	
	public function setFixedValue(float $fixedValue): Rate {
		$this->fixedValue = $fixedValue;
		return $this;
	}
	
	public function getUnitaryValue(): float {
		return $this->unitaryValue;
	}
	
	public function setUnitaryValue(float $unitaryValue): Rate {
		$this->unitaryValue = $unitaryValue;
		return $this;
	}
	
	public function getCriteriaValue(): ?float {
		return $this->criteriaValue;
	}
	
	public function setCriteriaValue(?float $criteriaValue): Rate {
		$this->criteriaValue = $criteriaValue;
		return $this;
	}
	
	public function getCriteriaOperator(): ?string {
		return $this->criteriaOperator;
	}
	
	public function setCriteriaOperator(?string $criteriaOperator): Rate {
		$this->criteriaOperator = $criteriaOperator;
		return $this;
	}
	
	public function getCriteriaType(): ?string {
		return $this->criteriaType;
	}
	
	public function setCriteriaType(?string $criteriaType): Rate {
		$this->criteriaType = $criteriaType;
		return $this;
	}
	
	/**
	 * Verifica se taxa possui critérios para validação
	 * @return bool
	 */
	public function hasCriteria(): bool {
		return !empty($this->criteriaOperator) && !empty($this->criteriaType) && !empty($this->criteriaValue);
	}
	
	/**
	 * @return string[]
	 */
	public static function getCriteriaOperators(): array {
		return [
			self::CRITERIA_OPERATOR_EQUAL_TO,
			self::CRITERIA_OPERATOR_LESS_THAN, self::CRITERIA_OPERATOR_LESS_THAN_OR_EQUAL_TO,
			self::CRITERIA_OPERATOR_GREATER_THAN, self::CRITERIA_OPERATOR_GREATER_THAN_OR_EQUAL_TO
		];
	}
	
	/**
	 * @return string[]
	 */
	public static function getCriteriaTypes(): array {
		return [self::CRITERIA_TYPE_KG, self::CRITERIA_TYPE_KM];
	}
	
	public function setMapping(): AbstractEntity {
		$this->mapping = RateMapping::class;
		return $this;
	}
}