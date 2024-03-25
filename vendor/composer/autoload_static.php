<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4a04694562b2974141d6d93ac2468e31
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Php\\Primeiroprojeto\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Php\\Primeiroprojeto\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4a04694562b2974141d6d93ac2468e31::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4a04694562b2974141d6d93ac2468e31::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4a04694562b2974141d6d93ac2468e31::$classMap;

        }, null, ClassLoader::class);
    }
}
