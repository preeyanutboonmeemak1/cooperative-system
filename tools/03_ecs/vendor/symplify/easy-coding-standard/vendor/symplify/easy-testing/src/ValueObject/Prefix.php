<?php

declare (strict_types=1);
namespace ECSPrefix20220220\Symplify\EasyTesting\ValueObject;

final class Prefix
{
    /**
     * @var string
     * @see https://regex101.com/r/g4ozU6/1
     */
    public const SKIP_PREFIX_REGEX = '#^(skip|keep)#i';
}