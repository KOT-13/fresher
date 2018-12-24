<?php

namespace App\Transformers;

use App\User;

/**
 * Class UserTransformer
 * @package App\Transformers
 */
class UserTransformer extends \League\Fractal\TransformerAbstract
{
    /**
     * @param User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'username' => $user->username,
            'avatar' => $user->avatar(),
        ];
    }
}