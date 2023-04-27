<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit589ebc389b8f4529943ec3629b5a4ced
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit589ebc389b8f4529943ec3629b5a4ced::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit589ebc389b8f4529943ec3629b5a4ced::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit589ebc389b8f4529943ec3629b5a4ced::$classMap;

        }, null, ClassLoader::class);
    }
}