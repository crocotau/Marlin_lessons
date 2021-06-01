<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3ed0c37916ec2cc2a5ca08fcb2519cd3
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Database\\' => 9,
        ),
        'A' => 
        array (
            'Aura\\SqlQuery\\' => 14,
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Database\\' => 
        array (
            0 => __DIR__ . '/../..' . '/database',
        ),
        'Aura\\SqlQuery\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/sqlquery/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3ed0c37916ec2cc2a5ca08fcb2519cd3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3ed0c37916ec2cc2a5ca08fcb2519cd3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3ed0c37916ec2cc2a5ca08fcb2519cd3::$classMap;

        }, null, ClassLoader::class);
    }
}
