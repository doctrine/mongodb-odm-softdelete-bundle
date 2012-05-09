<?php

namespace Doctrine\Bundle\MongoDBSoftDeleteBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This class contains the configuration information for the bundle
 *
 * This information is solely responsible for how the different configuration
 * sections are normalized, and merged.
 *
 * @author Chris Jones <leeked@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('doctrine_mongodb_softdelete');

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('deleted_field_name')
                    ->defaultValue('deletedAt')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
