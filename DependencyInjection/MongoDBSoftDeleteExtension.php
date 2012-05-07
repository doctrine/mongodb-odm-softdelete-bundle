<?php

namespace Doctrine\Bundle\MongoDBSoftDeleteBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * @author Igor Golovanov <igor.golovanov@gmail.com>
 * @author Chris Jones <leeked@gmail.com>
 */
class MongoDBSoftDeleteExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('soft_delete.xml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('doctrine.odm.mongodb.soft_delete.deleted_field_name', $config['deleted_field_name']);
    }

    public function getAlias()
    {
        return 'doctrine_mongodb_softdelete';
    }
}

