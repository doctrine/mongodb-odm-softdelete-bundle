<?php

namespace Doctrine\ODM\MongoDB\Symfony\SoftDeleteBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class RegisterEventListenersAndSubscribersPass implements CompilerPassInterface
{
    protected $container;

    public function process(ContainerBuilder $container)
    {
        $this->container = $container;
        foreach ($container->getDefinitions() as $id => $definition) {
            if ('%doctrine.odm.mongodb.soft_delete.event_manager.class%' !== $definition->getClass()) {
                continue;
            }

            $this->registerListeners($definition);
            $this->registerSubscribers($definition);
        }
    }

    protected function registerSubscribers($definition)
    {
        $subscribers = $this->container->findTaggedServiceIds('doctrine.odm.mongodb.soft_delete.event_subscriber');
        foreach ($subscribers as $id => $instances) {
            $definition->addMethodCall('addEventSubscriber', array(new Reference($id)));
        }
    }

    protected function registerListeners($definition)
    {
        $listeners = $this->container->findTaggedServiceIds('doctrine.odm.mongodb.soft_delete.event_listener');

        foreach ($listeners as $listenerId => $instances) {
            $events = array();
            foreach ($instances as $attributes) {
                if (isset($attributes['event'])) {
                    $events[] = $attributes['event'];
                }
            }

            if (0 < count($events)) {
                $definition->addMethodCall('addEventListener', array(
                    $events,
                    new Reference($listenerId),
                ));
            }
        }
    }
}