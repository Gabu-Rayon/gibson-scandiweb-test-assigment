<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf4b96da75033ee203226da4db43bbb42
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf4b96da75033ee203226da4db43bbb42::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf4b96da75033ee203226da4db43bbb42::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf4b96da75033ee203226da4db43bbb42::$classMap;

        }, null, ClassLoader::class);
    }
}
