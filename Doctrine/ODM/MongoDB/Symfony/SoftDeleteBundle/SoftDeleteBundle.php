<?php

namespace Doctrine\ODM\MongoDB\Symfony\SoftDeleteBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SoftDeleteBundle extends Bundle
{
    public function getNamespace()
    {
        return __NAMESPACE__;
    }

    public function getPath()
    {
        return strtr(__DIR__, '\\', '/');
    }
}