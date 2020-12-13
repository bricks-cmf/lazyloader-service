<?php

/** @copyright Sven Ullmann <kontakt@sumedia-webdesign.de> **/namespace BricksCmf\LazyLoaderService\Bootstrap;

use BricksCmf\LazyLoaderService\Bootstrap\Initializer\LazyLoaderServiceInitializer;
use BricksFramework\Bootstrap\Module\AbstractModule;

class Module extends AbstractModule
{
    public function getInitializerClasses(): array
    {
        return [
            LazyLoaderServiceInitializer::class
        ];
    }
}
