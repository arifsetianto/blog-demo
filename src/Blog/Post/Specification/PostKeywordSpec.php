<?php

declare(strict_types=1);

namespace Blog\Post\Specification;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Pandawa\Component\Ddd\Specification\NameableSpecificationInterface;
use Pandawa\Component\Ddd\Specification\NameableSpecificationTrait;
use Pandawa\Component\Ddd\Specification\SpecificationInterface;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
class PostKeywordSpec implements SpecificationInterface, NameableSpecificationInterface
{
    use NameableSpecificationTrait;

    public function __construct(private ?string $keyword)
    {
    }

    public function match($query): void
    {
        if ($this->keyword) {
            $query->where('title', 'ilike', '%' . $this->keyword . '%');
        }
    }
}