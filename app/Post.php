<?php

namespace App;

use App\Traits\Orderable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App
 */
class Post extends Model
{
    use Orderable;

    protected $fillable = ['body'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
