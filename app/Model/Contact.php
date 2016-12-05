<?php namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Contact
 *
 * @property integer $id
 * @property string $firstName
 * @property string $lastName
 * @property string $photo
 * @property string $birthday
 * @property string $phone
 * @property string $address
 * @property integer $country_id
 * @property string $comment
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $height
 * @property integer $user_id
 * @property-read \App\Model\Country $country
 * @property-read \App\User $author
 * @property \Illuminate\Database\Eloquent\Collection|\App\Model\Company[] $companies
 * @property-read mixed $full_name
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact wherePhoto($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact whereBirthday($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact whereCountryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact whereComment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact whereHeight($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact whereUserId($value)
 * @mixin \Eloquent
 */
class Contact extends Model
{
    /**
     * @var string
     */
    protected $table = 'contacts';

    /**
     * @var array
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'photo',
        'birthday',
        'phone',
        'address',
        'country_id',
        'comment',
        'companies',
        'height',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @param User $user
     *
     * @return bool
     */
    public function isAuthor(User $user)
    {
        return ! is_null($author = $this->author) && $author->id == $user->id;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_contact', 'contact_id');
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->firstName.' '.$this->lastName;
    }

    /**
     * @param array $companies
     */
    public function setCompaniesAttribute($companies)
    {
        $this->companies()->detach();
        if (! $companies) {
            return;
        }

        if (! $this->exists) {
            $this->save();
        }

        $this->companies()->attach($companies);
    }

}
