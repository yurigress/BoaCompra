<?php
declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';

use YuriGress\BoaCompra;

$builder = new DI\ContainerBuilder();
$builder->addDefinitions([
	BoaCompra\Mapping\TransporterMapping::class => new BoaCompra\Mapping\TransporterMapping(),
	BoaCompra\Mapping\RateMapping::class => new BoaCompra\Mapping\RateMapping(),
	BoaCompra\Mapping\ProductMapping::class => new BoaCompra\Mapping\ProductMapping(),
	BoaCompra\Mapping\TripMapping::class => new BoaCompra\Mapping\TripMapping(),
	BoaCompra\Mapping\TripProductMapping::class => new BoaCompra\Mapping\TripProductMapping(),
]);
$builder->ignorePhpDocErrors(true);
$container = $builder->build();

$controller = $container->get(BoaCompra\Controller\TripController::class);
$controller->calculateFromArray();


