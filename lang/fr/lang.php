<?php

return [
    'controllers' => [
        'sendboxes' => [
            'label' => 'Boite d\'envoi',
        ],
    ],
    'jobs' => [
        'sendbox' => [
            'job_send' => 'Emails envoyés',
            'job_title' => 'Envoyer des emails',
        ],
    ],
    'menu' => [
        'sendbox' => 'Boite d\'envoi',
        'sendbox_description' => 'Controle des emails diffusé depuis l\'app',
    ],
    'models' => [
        'general' => [
            'created_at' => 'Created At',
            'id' => 'ID',
            'updated_at' => 'Updated At',
        ],
        'maillog' => [
            'clicked' => 'Cliqué',
            'count' => 'NB',
            'hard_bounce' => 'Hard bounce',
            'name' => 'Log name',
            'open' => 'Ouvert',
            'sended' => 'Envoyé',
            'soft_bounce' => 'Soft Bounce',
            'type' => 'Type',
        ],
        'sendbox' => [
            'click_log' => 'Log cliques',
            'content' => 'Contenu',
            'email' => 'Email',
            'has_pjs' => 'A des PJ',
            'is_embed' => 'Images embarqués',
            'label' => 'Send Box',
            'lastlog' => 'Dernier log',
            'mail_logs' => 'Logs',
            'maileable_id' => 'Id mail',
            'maileable_type' => 'Type de mauil',
            'meta' => 'Meta',
            'methode' => 'Méthode',
            'model' => 'Modèle',
            'name' => 'Sujet',
            'open_log' => 'Log ouverture',
            'parsedTos' => 'Tos',
            'parsedVars' => 'Vars',
            'pjs' => 'Pjs',
            'reply_to' => 'reply_to',
            'send_at' => 'Envoyé le',
            'sender' => 'Sender',
            'state' => 'Etat',
            'tab_content' => 'Contenu',
            'tab_logs' => 'Logs',
            'tab_vars' => 'Vars',
            'targeteable' => [
                'name' => 'Nom de la cible',
            ],
            'targeteable_id' => 'Cible ID',
            'targeteable_type' => 'Cible',
        ],
    ],
    'plugin' => [
        'description' => 'Recuéation de logs emails et boite d\'envoi',
        'name' => 'MAIL LOG',
    ],
];
