<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5ec5ba6cea84ccf38f49ae7e6d9eb5dc
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Anishdcruz\\Watcher\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Anishdcruz\\Watcher\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5ec5ba6cea84ccf38f49ae7e6d9eb5dc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5ec5ba6cea84ccf38f49ae7e6d9eb5dc::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
