<?php

declare(strict_types=1);

namespace Blog\User\Transformer;

use Blog\User\Model\User;
use Pandawa\Component\Transformer\TransformerInterface;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
class UserTransformer implements TransformerInterface
{
    /**
     * @param User  $data
     * @param array $tags
     *
     * @return array|\Illuminate\Support\Carbon[]
     */
    public function transform($data, array $tags = [])
    {
        return array_merge(
            $data->attributesToArray(),
            $data->getRelations(),
            [
                'current_date' => date('Y-m-d H:i:s'),
            ]
        );
    }

    public function support($data, array $tags = []): bool
    {
        return $data instanceof User;
    }
}