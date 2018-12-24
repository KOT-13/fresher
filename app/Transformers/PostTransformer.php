<?php

namespace App\Transformers;

use App\Post;

/**
 * Class UserTransformer
 * @package App\Transformers
 */
class PostTransformer extends \League\Fractal\TransformerAbstract
{
    protected $availableIncludes = ['user'];
    /**
     * @param Post $post
     * @return array
     */
    public function transform(Post $post)
    {
        return [
            'id' => $post->id,
            'body' => $post->body,
            'created_at' => $post->created_at->toDateTimeString(),
            'created_at_human' => $post->created_at->diffForHumans()
        ];
    }

    /**
     * @param Post $post
     * @return \League\Fractal\Resource\Item
     */
    public function includeUser(Post $post)
    {
        return $this->item($post->user, new UserTransformer);
    }
}