<?php

declare(strict_types=1);

namespace Blog\Web;

use Pandawa\Component\Module\AbstractModule;
use Pandawa\Component\Module\Provider\RouteProviderTrait;
use Pandawa\Component\Module\Provider\ViewProviderTrait;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
final class BlogWebModule extends AbstractModule
{
    use RouteProviderTrait, ViewProviderTrait;

    protected function routes(): array
    {
        return [
            [
                'type'       => 'group',
                'children'   => $this->getCurrentPath() . '/Resources/routes/routes.yaml',
            ],
        ];
    }
}