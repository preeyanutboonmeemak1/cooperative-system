<?php

declare (strict_types=1);
namespace ECSPrefix20220220;

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use ECSPrefix20220220\Symplify\PackageBuilder\Reflection\ClassLikeExistenceChecker;
use ECSPrefix20220220\Symplify\Skipper\ValueObject\Option;
use ECSPrefix20220220\Symplify\SmartFileSystem\Normalizer\PathNormalizer;
return static function (\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\ECSPrefix20220220\Symplify\Skipper\ValueObject\Option::SKIP, []);
    $parameters->set(\ECSPrefix20220220\Symplify\Skipper\ValueObject\Option::ONLY, []);
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire()->autoconfigure();
    $services->load('ECSPrefix20220220\Symplify\Skipper\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/ValueObject']);
    $services->set(\ECSPrefix20220220\Symplify\PackageBuilder\Reflection\ClassLikeExistenceChecker::class);
    $services->set(\ECSPrefix20220220\Symplify\SmartFileSystem\Normalizer\PathNormalizer::class);
};
