<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopicRequest;
use App\Post;
use App\Topic;
use App\Transformers\TopicTransformer;
use Illuminate\Http\Request;

/**
 * Class TopicController
 * @package App\Http\Controllers
 */
class TopicController extends Controller
{
    /**
     * @param StoreTopicRequest $request
     * @return array
     */
    public function store(StoreTopicRequest $request)
    {
        $topic = new Topic;
        $topic->title = $request->title;
        $topic->user()->associate($request->user());

        $post = new Post;
        $post->body = $request->body;
        $post->user()->associate($request->user());

        $topic->save();
        $topic->posts()->save($post);

        return fractal()
            ->item($topic)
            ->parseIncludes(['user'])
            //->parseIncludes(['user', 'posts', 'posts.user'])
            ->transformWith(new TopicTransformer)
            ->toArray();
    }
}
