<?php namespace App\Model;

/**
 * App\Model\Contact2
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
 * @property-read mixed $full_name
 * @property-write mixed $companies
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact2 whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact2 whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact2 whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact2 wherePhoto($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact2 whereBirthday($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact2 wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact2 whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact2 whereCountryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact2 whereComment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact2 whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact2 whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact2 whereHeight($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contact2 whereUserId($value)
 * @mixin \Eloquent
 */
class Contact2 extends Contact
{

}
