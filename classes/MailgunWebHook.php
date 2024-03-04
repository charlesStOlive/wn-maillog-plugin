<?php

namespace Waka\Maillog\Classes;

use ApplicationException;
use Event;
use Closure;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Waka\Maillog\Models\MailLog;

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
        //trace_log('message reception---------------------------------');
        //trace_log($request->all());
        //trace_log('messageType');
        $logVars = $request->input('event-data.user-variables');

        if (!$logVars) {
            \Log::error('Pas de log var on enregistre rien dans MailgunWebHook');
            return response()->json('Success!', 200);
        } else {
            //trace_log('il y a du logvars!!!', $logVars);
        }
        $email = $request->input('event-data.recipient');
        //trace_log($email);

        $mailLogData = [
            'name' => $email,
            'send_box_id' => $logVars['send_box_id'] ?? null,
            'maileable_id' => $logVars['maileable_id'] ?? null,
            'maileable_type' => $logVars['maileable_type'] ?? null, //todotargeteable
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

    
}
