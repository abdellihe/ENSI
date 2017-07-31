<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/** @var ClassLoader $loader */
$loader = require __DIR__.'/../vendor/autoload.php';
//add name bundle for site
$loader->add('Site',   __DIR__ . '/../src');
$loader->add('Dashboard',   __DIR__ . '/../src');


AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
