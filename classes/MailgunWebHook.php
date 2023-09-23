<?php

namespace Waka\Maillog\Classes;

use ApplicationException;
use Event;
use Closure;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Waka\Mailer\Models\MailLog;

class MailgunWebHook
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * [user-variables] => Array
     * [id] => 9
     * [ds] => Wcli\Crm\Models\Contact
     * [ds_id] => 52
     * 
     */
    public function messageType(Request $request, $type)
    {
        //trace_log('message reception');
        //trace_log($request->all());
        //trace_log('messageType');
        $logVars = $request->input('event-data.user-variables');

        if (!$logVars) {
            //\Log::error('Pas de log var on enregistre rien dans MailgunWebHook');
            return response()->json('Success!', 200);
        } else {
            //trace_log($logVars);
        }
        $email = $request->input('event-data.recipient');
        //trace_log($email);

        $mailLogData = [
            'name' => $email,
            'send_box_id' => $logVars['send_box_id'] ?? null,
            'maileable_id' => $logVars['mail_id'] ?? null,
            'maileable_type' => $logVars['mail_type'] ?? null, //todotargeteable
            'logeable_type' => $logVars['ds'] ?? null,
            'logeable_id' => $logVars['ds_id'] ?? null,
            'type' => $type,
        ];
        $meta = $request->input('event-data') ?? null;

        
        $mailLog = MailLog::where($mailLogData)->first();

        if ($mailLog) {
            $mailLog->count++;
            $mailLog->meta = $meta;
            $mailLog->save();
        } else {
            $mailLogData['count'] = 1; // Initialisez à 1 si un nouvel enregistrement est créé
            $mailLogData['meta'] = $meta;
            MailLog::create($mailLogData);
        }
        Event::fire('waka.maillog.mailgun_web_hook', [$mailLogData]);
        return response()->json('Success!', 200);
    }

    // public function checkMorphMap($className, $name = false)
    // {
    //     if (!$className) return;
    //     if (substr($className, 0, 1) === "\\") {
    //         $className = substr($className, 1);
    //     }
    //     $morphClassMaps = \Winter\Storm\Database\Relations\Relation::morphMap();
    //     foreach ($morphClassMaps as $morphName => $morphClass) {
    //         // trace_log($morphClass ."  ==  ".$className."  ==  ".$morphName);
    //         if ($morphClass ==  $className) {
    //             return $name ? $morphName : $morphClass;
    //         } else if ($morphName ==  $className) {
    //             return $name ? $morphName : $morphClass;
    //         }
    //     }
    //     return $className;
    // }
}
