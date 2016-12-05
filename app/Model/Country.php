<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Traits\OrderableModel;

/**
 * App\Model\Country
 *
 * @property integer $id
 * @property string $title
 * @property integer $order
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Contact[] $contacts
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Country whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Country whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Country whereOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Country whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Country orderModel()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Country findByPosition($position)
 * @mixin \Eloquent
 */
class Country extends Model
{
    use OrderableModel;

    protected $fillable = ['title', 'test'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function getOrderField()
    {
        return 'order';
    }

}
