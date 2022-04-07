<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ECSPrefix20220220\Symfony\Component\DependencyInjection;

use ECSPrefix20220220\Psr\Container\ContainerInterface as PsrContainerInterface;
use ECSPrefix20220220\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use ECSPrefix20220220\Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException;
use ECSPrefix20220220\Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;
/**
 * ContainerInterface is the interface implemented by service container classes.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
interface ContainerInterface extends \ECSPrefix20220220\Psr\Container\ContainerInterface
{
    public const RUNTIME_EXCEPTION_ON_INVALID_REFERENCE = 0;
    public const EXCEPTION_ON_INVALID_REFERENCE = 1;
    public const NULL_ON_INVALID_REFERENCE = 2;
    public const IGNORE_ON_INVALID_REFERENCE = 3;
    public const IGNORE_ON_UNINITIALIZED_REFERENCE = 4;
    /**
     * @param object|null $service
     */
    public function set(string $id, $service);
    /**
     * @throws ServiceCircularReferenceException When a circular reference is detected
     * @throws ServiceNotFoundException          When the service is not defined
     *
     * @see Reference
     * @return object|null
     */
    public function get(string $id, int $invalidBehavior = self::EXCEPTION_ON_INVALID_REFERENCE);
    public function has(string $id) : bool;
    /**
     * Check for whether or not a service has been initialized.
     */
    public function initialized(string $id) : bool;
    /**
     * @return array|bool|string|int|float|null
     *
     * @throws InvalidArgumentException if the parameter is not defined
     */
    public function getParameter(string $name);
    public function hasParameter(string $name) : bool;
    /**
     * @param mixed[]|bool|float|int|string|null $value
     */
    public function setParameter(string $name, $value);
}
