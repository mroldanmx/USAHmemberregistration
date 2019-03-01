<?php

namespace App\Models;

    use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

    /**
 * @property Address address
 */
    class Member extends Model
{

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'gender',
        'citizenship',
        'email',
        'phone_1',
        'phone_2',
    ];

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'member';


    /**
     * The address of this member.
     */
    public function address()
    {
        return $this->hasOne(\App\Models\Address::class);
    }

    /**
     * Accessor for Age.
     */
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['dob'])->age;
    }

    public function getDobDayAttribute()
    {
        if (!$this->dob) {
            return '';
        }
        return (new Carbon($this->dob))->day;
    }

    public function getDobMonthAttribute()
    {
        if (!$this->dob) {
            return '';
        }
        return (new Carbon($this->dob))->month;
    }

    public function getDobYearAttribute()
    {
        if (!$this->dob) {
            return '';
        }
        return (new Carbon($this->dob))->year;
    }

        public function getDobEnglish()
        {
            if (!$this->getDobDayAttribute()) {
                return '';
            }
            return Carbon::parse($this->dob)->format('M d Y');
        }

    public function getFullNameAttribute()
    {
        return sprintf("%s %s", $this->first_name, $this->last_name);
    }

    public function getFriendlyDobAttribute()
    {
        if (!$this->dob) {
            return '';
        }
        return (new Carbon($this->dob))->toFormattedDateString();
    }

        public function registration()
        {
            return $this->belongsTo(Registration::class);
        }
}
