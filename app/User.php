<?php

namespace App;

use App\Model\Contact;
use Illuminate\Foundation\Auth\User as Authenticatable;
use KodiComponents\Support\Upload;
use Illuminate\Http\UploadedFile;

/**
 * App\User
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $avatar
 * @property-read mixed $avatar_url_or_blank
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Contact[] $contacts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereAvatar($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasRoles, Upload;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'avatar' => 'image',
    ];
    
    /**
     * @return array
     */
    public function getUploadSettings()
    {
        return [
            'avatar' => [
                'fit' => [300, 300, function ($constraint) {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                }],
            ],
        ];
    }

    /**
     * @param UploadedFile $file
     *
     * @return string
     */
    protected function getUploadFilename(UploadedFile $file)
    {
        return md5($this->id).'.'.$file->getClientOriginalExtension();
    }

    /**
     * @return bool
     */
    public function isSuperAdmin()
    {
        return $this->hasRole('admin');
    }

    /**
     * @return bool
     */
    public function isManager()
    {
        return $this->hasRole('manager');
    }

    /**
     * @param string $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * @return string
     */
    public function getAvatarUrlOrBlankAttribute()
    {
        if (empty($url = $this->avatar_url)) {
            return asset('images/blank.png');
        }

        return $url;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'contact_id');
    }
}
