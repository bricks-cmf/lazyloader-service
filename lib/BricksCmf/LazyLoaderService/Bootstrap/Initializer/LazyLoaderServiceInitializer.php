<?php

/** @copyright Sven Ullmann <kontakt@sumedia-webdesign.de> **/namespace BricksCmf\LazyLoaderService\Bootstrap\Initializer;

use BricksCmf\LazyLoaderService\LazyLoaderService;
use BricksFramework\Bootstrap\Initializer\AbstractInitializer;
use BricksFramework\Bootstrap\BootstrapInterface;

class LazyLoaderServiceInitializer extends AbstractInitializer
{
    public function initialize(BootstrapInterface $bootstrap): void
    {
        if (in_array(LazyLoaderService::SERVICE_NAME, $bootstrap->getServices())) {
            return;
        }

        $config = $bootstrap->getBootstrapConfig()->getModuleConfig(LazyLoaderService::SERVICE_NAME);
        $compileDir = $config['compileDir'] ?? $bootstrap->getEnvironment()->getApplicationDirectory() .
            DIRECTORY_SEPARATOR . 'compile';

        $lazyloaderService = $bootstrap->getInstance('BricksCmf\\LazyLoaderService\\LazyLoaderService', [
            $bootstrap->getEnvironment()->getAutoloader(),
            $compileDir
        ]);

        $bootstrap->setService(LazyLoaderService::SERVICE_NAME, $lazyloaderService);
    }

    public function getPriority(): int
    {
        return -9900;
    }
}
