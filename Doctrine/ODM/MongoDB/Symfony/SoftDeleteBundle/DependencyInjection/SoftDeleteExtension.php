<?php

namespace Doctrine\ODM\MongoDB\Symfony\SoftDeleteBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\FileLocator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class SoftDeleteExtension extends Extension
{
    public function configLoad(array $configs, ContainerBuilder $container)
    {
        if (!$container->hasDefinition('soft_delete.manager')) {
            $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
            $loader->load('soft_delete.xml');
        }
    }

    /**
     * @see Symfony\Component\DependencyInjection\Extension.ExtensionInterface::getXsdValidationBasePath()
     *
     * @codeCoverageIgnore
     */
    public function getXsdValidationBasePath()
    {
        return __DIR__.'/../Resources/config/schema';
    }

    /**
     * @see Symfony\Component\DependencyInjection\Extension.ExtensionInterface::getNamespace()
     *
     * @codeCoverageIgnore
     */
    public function getNamespace()
    {
        return 'http://www.symfony-project.org/schema/dic/doctrine_mongodb_softdelete';
    }

    /**
     * @see Symfony\Component\DependencyInjection\Extension.ExtensionInterface::getAlias()
     *
     * @codeCoverageIgnore
     */
    public function getAlias()
    {
        return 'doctrine_mongodb_softdelete';
    }
}