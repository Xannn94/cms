<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Form
 *
 * @property integer $id
 * @property string $title
 * @property string $textaddon
 * @property boolean $checkbox
 * @property string $date
 * @property string $time
 * @property string $timestamp
 * @property string $image
 * @property string $images
 * @property integer $select
 * @property string $custom
 * @property string $textarea
 * @property string $ckeditor
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Form whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Form whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Form whereTextaddon($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Form whereCheckbox($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Form whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Form whereTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Form whereTimestamp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Form whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Form whereImages($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Form whereSelect($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Form whereCustom($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Form whereTextarea($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Form whereCkeditor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Form whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Form whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Form extends Model
{

    protected $fillable = [
        'title',
        'textaddon',
        'checkbox',
        'date',
        'time',
        'timestamp',
        'image',
        'images',
        'select',
        'textarea',
        'ckeditor',
    ];

    public function getImagesAttribute($value)
    {
        return preg_split('/,/', $value, -1, PREG_SPLIT_NO_EMPTY);
    }

    public function setImagesAttribute($images)
    {
        $this->attributes['images'] = implode(',', $images);
    }

}
