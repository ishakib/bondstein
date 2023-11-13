<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitde4315d61ed2bc51f4967f1f0f73ad94
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitde4315d61ed2bc51f4967f1f0f73ad94', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitde4315d61ed2bc51f4967f1f0f73ad94', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitde4315d61ed2bc51f4967f1f0f73ad94::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
