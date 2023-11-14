<?php

return [
    'controllers' => [
        'sendboxes' => [
            'label' => 'Send Box',
        ],
    ],
    'jobs' => [
        'sendbox' => [
            'job_send' => 'Emails sent',
            'job_title' => 'Send emails',
        ],
    ],
    'menu' => [
        'sendbox' => 'Send Box',
        'sendbox_description' => 'Control of emails sent from the app',
    ],
    'models' => [
        'general' => [
            'created_at' => 'Created At',
            'id' => 'ID',
            'updated_at' => 'Updated At',
        ],
        'maillog' => [
            'clicked' => 'Clicked',
            'count' => 'Count',
            'hard_bounce' => 'Hard Bounce',
            'name' => 'Log name',
            'open' => 'Opened',
            'sended' => 'Sent',
            'soft_bounce' => 'Soft Bounce',
            'type' => 'Type',
        ],
        'sendbox' => [
            'click_log' => 'Click log',
            'content' => 'Content',
            'email' => 'Email',
            'has_pjs' => 'Has attachments',
            'is_embed' => 'Embedded images',
            'label' => 'Send Box',
            'lastlog' => 'Last log',
            'mail_logs' => 'Logs',
            'maileable_id' => 'Mail ID',
            'maileable_type' => 'Type of mail',
            'meta' => 'Meta',
            'methode' => 'Method',
            'model' => 'Model',
            'name' => 'Subject',
            'open_log' => 'Open log',
            'parsedTos' => 'Tos',
            'parsedVars' => 'Vars',
            'pjs' => 'Attachments',
            'reply_to' => 'Reply To',
            'send_at' => 'Sent on',
            'sender' => 'Sender',
            'state' => 'State',
            'tab_content' => 'Content',
            'tab_logs' => 'Logs',
            'tab_vars' => 'Vars',
            'targeteable' => [
                'name' => 'Target name',
            ],
            'targeteable_id' => 'Target ID',
            'targeteable_type' => 'Target',
        ],
    ],
    'plugin' => [
        'description' => 'Email logs and send box recovery',
        'name' => 'MAIL LOG',
    ],
];
