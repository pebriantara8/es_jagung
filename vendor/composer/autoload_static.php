<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita194223ed6a7aa38248fd80cba5d1792
{
    public static $prefixesPsr0 = array (
        'o' => 
        array (
            'org\\bovigo\\vfs' => 
            array (
                0 => __DIR__ . '/..' . '/mikey179/vfsStream/src/main/php',
            ),
        ),
    );

    public static $classMap = array (
        'MY_Loader' => __DIR__ . '/../..' . '/application/core/MY_Loader.php',
        'MY_Router' => __DIR__ . '/../..' . '/application/core/MY_Router.php',
        'MY_backend' => __DIR__ . '/../..' . '/application/core/MY_backend.php',
        'MY_frontend' => __DIR__ . '/../..' . '/application/core/MY_frontend.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInita194223ed6a7aa38248fd80cba5d1792::$prefixesPsr0;
            $loader->classMap = ComposerStaticInita194223ed6a7aa38248fd80cba5d1792::$classMap;

        }, null, ClassLoader::class);
    }
}
