<?php

namespace App\Policies;

use App\Topic;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class TopicPolicy
 * @package App\Policies
 */
class TopicPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Topic $topic
     * @return mixed
     */
    public function update(User $user, Topic $topic)
    {
        return $user->ownsTopic($topic);
    }

    /**
     * @param User $user
     * @param Topic $topic
     * @return bool
     */
    public function destroy(User $user, Topic $topic)
    {
        return $user->ownsTopic($topic);
    }
}
