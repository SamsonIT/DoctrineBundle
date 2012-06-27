<?php

/*
 * This file is part of the Doctrine Bundle
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 * (c) Doctrine Project, Benjamin Eberlei <kontakt@beberlei.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Doctrine\Bundle\DoctrineBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class AddResolveTargetEntityListenerPass implements CompilerPassInterface
{
    
    public function process(ContainerBuilder $container)
    {
        $def = $container->findDefinition('doctrine.orm.listeners.resolve_target_entity');

        if (!$def->hasMethodCall('addResolveTargetEntity')) {
            $def->clearTag('doctrine.event_listener');
        }
    }
}
