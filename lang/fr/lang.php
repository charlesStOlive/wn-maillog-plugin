<?php

return [
    'plugin' => [
        'description' => 'Recuéation de logs emails et boite d\'envoi',
        'name' => 'MAIL LOG',
    ],
    'models' => [
        'sessioncode' => [
            'label' => 'Session Code',
        ],
        'general' => [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ],
        'sessionCode' => [
            'errors' => [
                'end_type' => 'la durée (end_type) de sessionCode est obligatoire. Contactez l\'administrateurs',
            ],
        ],
        'sendbox' => [
            'label' => 'Send Box',
            'send_at' => 'Envoyé le',
            'state' => 'Etat',
            'email' => 'Email',
            'model' => 'Modèle',
            'targeteable' => [
                'name' => 'Nom de la cible',
            ],
            'name' => 'Sujet',
            'lastlog' => 'Dernier log',
            'has_pjs' => 'A des PJ',
            'content' => 'Contenu',
            'pjs' => 'Pjs',
            'tab_content' => 'Contenu',
            'is_embed' => 'Images embarqués',
            'methode' => 'Méthode',
            'maileable_type' => 'Type de mauil',
            'maileable_id' => 'Id mail',
            'targeteable_type' => 'Cible',
            'targeteable_id' => 'Cible ID',
            'parsedTos' => 'Tos',
            'parsedVars' => 'Vars',
            'sender' => 'Sender',
            'reply_to' => 'reply_to',
            'meta' => 'Meta',
            'open_log' => 'Log ouverture',
            'click_log' => 'Log cliques',
            'mail_logs' => 'Logs',
            'tab_logs' => 'Logs',
        ],
    ],
    'controllers' => [
        'sessioncodes' => [
            'label' => 'Session Codes',
        ],
        'sendboxes' => [
            'label' => 'Boite d\'envoi',
        ],
    ],
    'menu' => [
        'sendbox' => 'Boite d\'envoi',
        'sendbox_description' => 'Controle des emails diffusé depuis l\'app',
    ],
];
