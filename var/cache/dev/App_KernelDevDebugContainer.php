<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerLkGwZKK\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerLkGwZKK/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerLkGwZKK.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerLkGwZKK\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerLkGwZKK\App_KernelDevDebugContainer([
    'container.build_hash' => 'LkGwZKK',
    'container.build_id' => '2836ca97',
    'container.build_time' => 1686409321,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerLkGwZKK');
