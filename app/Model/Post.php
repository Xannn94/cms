<?php namespace App\Model;

use Baum\Extensions\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Model\Post
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property string $text_html
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Post whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Post whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Post whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Post whereTextHtml($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'text',
        'text_html',
    ];

}
