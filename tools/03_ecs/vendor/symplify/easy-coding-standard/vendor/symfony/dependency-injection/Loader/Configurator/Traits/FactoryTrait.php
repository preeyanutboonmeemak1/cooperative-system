<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ECSPrefix20220220\Symfony\Component\DependencyInjection\Loader\Configurator\Traits;

use ECSPrefix20220220\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use ECSPrefix20220220\Symfony\Component\DependencyInjection\Loader\Configurator\ReferenceConfigurator;
trait FactoryTrait
{
    /**
     * Sets a factory.
     *
     * @return $this
     * @param mixed[]|string|\Symfony\Component\DependencyInjection\Loader\Configurator\ReferenceConfigurator $factory
     */
    public final function factory($factory)
    {
        if (\is_string($factory) && 1 === \substr_count($factory, ':')) {
            $factoryParts = \explode(':', $factory);
            throw new \ECSPrefix20220220\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException(\sprintf('Invalid factory "%s": the "service:method" notation is not available when using PHP-based DI configuration. Use "[service(\'%s\'), \'%s\']" instead.', $factory, $factoryParts[0], $factoryParts[1]));
        }
        $this->definition->setFactory(static::processValue($factory, \true));
        return $this;
    }
}
