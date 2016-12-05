<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Company
 *
 * @property integer $id
 * @property string $title
 * @property string $address
 * @property string $phone
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Contact[] $contacts
 * @property-write mixed $contact_id
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Company whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Company whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Company whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Company wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Company withContact($contactId)
 * @mixin \Eloquent
 */
class Company extends Model
{

    protected $fillable = [
        'title',
        'address',
        'phone'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function contacts()
    {
        return $this->belongsToMany(Contact::class);
    }

    public function scopeWithContact($query, $contactId)
    {
        $query->whereHas('contacts', function ($q) use ($contactId) {
            $q->where('contact_id', $contactId);
        });
    }

    public function setContactIdAttribute($contactId)
    {
        $this->save();
        $contact = Contact::find($contactId);
        $this->contacts()->attach($contact);
    }

}
