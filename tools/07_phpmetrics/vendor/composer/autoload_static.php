<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5e82cc6405a4fc0f88cf9fabd4a34d31
{
    public static $files = array (
        '5f0e95b8df5acf4a92c896dc3ac4bb6e' => __DIR__ . '/..' . '/phpmetrics/phpmetrics/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpParser\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpParser\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/php-parser/lib/PhpParser',
        ),
    );

    public static $prefixesPsr0 = array (
        'H' => 
        array (
            'Hal\\' => 
            array (
                0 => __DIR__ . '/..' . '/phpmetrics/phpmetrics/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5e82cc6405a4fc0f88cf9fabd4a34d31::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5e82cc6405a4fc0f88cf9fabd4a34d31::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit5e82cc6405a4fc0f88cf9fabd4a34d31::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit5e82cc6405a4fc0f88cf9fabd4a34d31::$classMap;

        }, null, ClassLoader::class);
    }
}