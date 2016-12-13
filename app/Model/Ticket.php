<?php namespace App\Model;

use App\User;
use Baum\Extensions\Eloquent\Model;

/**
 * App\Model\Post
 *
 * @property integer $id
 * @property string $ticket
 * @property integer $in_play
 * @property integer $user_id
 * @property integer $play_id
 * @mixin \Eloquent
 */
class Ticket extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'ticket',
        'in_play',
        'user_id',
        'play_id'
    ];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Plays()
    {
        return $this->belongsTo(Play::class);
    }
}
