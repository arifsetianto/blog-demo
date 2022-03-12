<?php

declare(strict_types=1);

namespace Blog\Api\Presenter;

use Illuminate\Http\Request;
use Pandawa\Component\Presenter\NameablePresenterInterface;
use Pandawa\Component\Presenter\NameablePresenterTrait;
use Pandawa\Component\Presenter\PresenterInterface;
use Pandawa\Module\Api\Http\Controller\InteractsWithRendererTrait;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
final class PingPresenter implements PresenterInterface, NameablePresenterInterface
{
    use NameablePresenterTrait;
    use InteractsWithRendererTrait {
        InteractsWithRendererTrait::render as response;
    }

    public function render(Request $request)
    {
        return $this->response($request, ['status' => 'pong']);
    }
}