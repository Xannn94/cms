<?php namespace App\Model;

use Baum\Extensions\Eloquent\Model;

/**
 * App\Model\Post
 *
 * @property integer $id
 * @property string $title
 * @property string $preview
 * @property string $content
 * @property string images
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $likes
 * @property integer $dislikes

 * @mixin \Eloquent
 */
class Post extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'preview',
        'content',
        'images',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'likes',
        'dislikes'
    ];

}
