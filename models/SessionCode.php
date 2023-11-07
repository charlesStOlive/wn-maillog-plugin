<?php namespace Waka\MailLog\Models;

use Model;
use Carbon\Carbon;

/**
 * sessionCode Model
 */
class SessionCode extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'waka_maillog_session_codes';

     

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['id'];

    
    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'code' => 'unique'
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $hasOneThrough = [];
    public $hasManyThrough = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [
        'sessioneable' => [],
    ];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];


    /**
     *EVENTS=========================================
     **/
    public function beforeSave() {
        if(!$this->end_type) {
            $this->end_type = '5m';
        }
        $this->code = \Waka\Wutils\Classes\TinyUuid::simple(12);
        $this->end_at = $this->getEndKeyAt();
    }
    

    /**
     * LISTS=========================================
     **/
    

    /**
     * GETTERS=========================================
     **/


    /**
     * SCOPES=========================================
     */


    /**
     * SETTERS=========================================
     */


    /**
     * OTHERS=========================================
     */
    public function getEndKeyAt()
    {
        
        $date = Carbon::now();
        switch ($this->end_type) {
            case '5m':
                return $date->addMinutes(5)->toDateTimeString();
                break;
            case '30m':
                return $date->addMinutes(30)->toDateTimeString();
                break;
            case '1h':
                return $date->addHour()->toDateTimeString();
                break;
            case '24h':
                return $date->addDay()->toDateTimeString();
                break;
            case '1w':
                return $date->addWeek()->toDateTimeString();
                break;
            case '1Mo':
                return $date->addMonth()->toDateTimeString();
                break;
        }
    }


}
