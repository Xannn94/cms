<?php namespace App\Model;

use Baum\Extensions\Eloquent\Model;
use KodiComponents\Support\Upload;
use Illuminate\Http\UploadedFile;
use SleepingOwl\Admin\Traits\OrderableModel;

/**
 * App\Model\Play
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $mainImage
 * @property integer $price
 * @property integer $public
 * @property integer $order
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $finished_at
 * @mixin \Eloquent
 */
class Play extends Model
{
    use Upload,OrderableModel;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'main_image',
        'price',
        'public',
        'finished_at'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'main_image' => 'image',
    ];

    /**
     * @return array
     */
    public function getUploadSettings()
    {
        return [
            'main_image' => [
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

    public function getOrderField()
    {
        return 'order';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
