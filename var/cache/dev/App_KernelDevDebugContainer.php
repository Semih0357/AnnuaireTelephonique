<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerXn8x7d6\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerXn8x7d6/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerXn8x7d6.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerXn8x7d6\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerXn8x7d6\App_KernelDevDebugContainer([
    'container.build_hash' => 'Xn8x7d6',
    'container.build_id' => '26d4e75c',
    'container.build_time' => 1685473768,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerXn8x7d6');
