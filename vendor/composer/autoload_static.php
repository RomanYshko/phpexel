<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4de7e5b76cf7b3fab0a2ca9b854b9ef9
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'avadim\\FastExcelReader\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'avadim\\FastExcelReader\\' => 
        array (
            0 => __DIR__ . '/..' . '/avadim/fast-excel-reader/src/FastExcelReader',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4de7e5b76cf7b3fab0a2ca9b854b9ef9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4de7e5b76cf7b3fab0a2ca9b854b9ef9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4de7e5b76cf7b3fab0a2ca9b854b9ef9::$classMap;

        }, null, ClassLoader::class);
    }
}