<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2f85f2f60e0b5c76a3b914b75d3e5698
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2f85f2f60e0b5c76a3b914b75d3e5698::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2f85f2f60e0b5c76a3b914b75d3e5698::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2f85f2f60e0b5c76a3b914b75d3e5698::$classMap;

        }, null, ClassLoader::class);
    }
}
