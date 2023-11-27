<?php

namespace Waka\Maillog\Classes\Traits;

use Lang;
use \Waka\Informer\Models\Inform;
use Session;
use Waka\Maillog\Classes\Exceptions\SessionCodeException;

trait SessionCodeTrait
{

    /*
     * Constructor
     */
    public static function bootSessionCodeTrait()
    {
        static::extend(function ($model) {
            /*
             * Define relationships
             */
            $model->morphMany['session_code'] = [\Waka\Maillog\Models\SessionCode::class, 'name' => 'sessioneable'];
            // $model->bindEvent('model.beforeDelete', function () use ($model) {
            // });
            // $model->bindEvent('model.beforeValidate', function () use ($model) { 
            // });
            // $model->bindEvent('model.beforeSave', function () use ($model) {
            // });
            // $model->bindEvent('model.afterSave', function () use ($model) {
            // });
        });
    }

    public function checkExistingSessionCode($key) {
        $q = $this->session_code()->where('key', $key);
        if($q->exists()) {
            return $q;
        } else {
            return null;
        }
       
    }

    public static function findBySessionCode($code, $key = 'default')
    {
        $model = self::whereHas('session_code', function ($q) use ($code, $key) {
            return $q->where('code', $code)->where('key', $key)->where('end_at', '>=', \Carbon\Carbon::now());
        })->first();

        if (!$model) {
            throw new SessionCodeException('Code non trouvé.');
        }
        return $model;
    }

    public function createSessionCode($type, $key) {
        if($existing = $this->checkExistingSessionCode($key)) {
            $existing->delete();
        }
        $this->session_code()->create([
            'end_type' => $type,
            'key' => $key,
        ]);
    }

    

    public function createShortSessionCode($key = 'default')
    {
        $this->createSessionCode('5m', $key);
    }

    public function createHourSessionCode($key = 'default')
    {
        $this->createSessionCode('1h', $key);
    }

    public function createDaySessionCode($key = 'default')
    {
        $this->createSessionCode('24h', $key);
    }

    public function createWeekSessionCode($key = 'default')
    {
        $this->createSessionCode('1w', $key);
    }

    public function createMonthSessionCode($key = 'default')
    {
        $this->createSessionCode('1Mo', $key);
    }

}
