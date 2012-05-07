<?php

namespace Doctrine\Bundle\MongoDBSoftDeleteBundle;

use Doctrine\Bundle\MongoDBSoftDeleteBundle\DependencyInjection\Compiler\RegisterEventListenersAndSubscribersPass;
use Doctrine\Bundle\MongoDBSoftDeleteBundle\DependencyInjection\MongoDBSoftDeleteExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DoctrineMongoDBSoftDeleteBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new RegisterEventListenersAndSubscribersPass(), PassConfig::TYPE_BEFORE_OPTIMIZATION);
    }

    public function getContainerExtension()
    {
        return new MongoDBSoftDeleteExtension();
    }
}