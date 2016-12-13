<?php namespace App\Model;

use Baum\Extensions\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Model\News
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property string $text_html
 * @method static \Illuminate\Database\Query\Builder|\App\Model\News whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\News whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\News whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\News whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\News whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\News whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\News whereTextHtml($value)
 * @mixin \Eloquent
 */
class News extends Model
{
    use SoftDeletes;


    protected $table = "news";

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'text',
        'text_html',
    ];

}
