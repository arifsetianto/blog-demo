<?php

declare(strict_types=1);

namespace Blog\Post\Model;

use Pandawa\Component\Ddd\AbstractModel;
use Blog\User\Relation\BelongsToUser;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
class Post extends AbstractModel
{
    use BelongsToUser;

    protected $casts = [
        'publish' => 'boolean',
    ];
}