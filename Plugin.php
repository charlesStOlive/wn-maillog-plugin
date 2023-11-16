<?php namespace Waka\MailLog;

use Backend;
use Backend\Models\UserRole;
use System\Classes\PluginBase;
use Lang;

/**
 * mailLog Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'waka.maillog::lang.plugin.name',
            'description' => 'waka.maillog::lang.plugin.description',
            'author'      => 'waka',
            'icon'        => 'icon-leaf'
        ];
    }


    /**
     * Register model to clean.
     *
     * @return void
     */
    public function registerModelToClean()
    {
        $nbdays = \Config::get('wcli.wconfig::anonymize.sendBox', 7);
        return [
            'anonymize' => [
                \Waka\Maillog\Models\SendBox::class => [
                    'nb_day' => $nbdays,
                    'column' => 'created_at',
                ],
            ],
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'waka.maillog.admin.base' => [
                'tab' => 'Waka - Maillog',
                'label' => 'Administrateur de maillog',
            ],
             'waka.maillog.admin.super' => [
                'tab' => 'Waka - Maillog',
                'label' => 'Super admin de maillog',
            ],
        ];
    }

    

    public function registerSettings()
    {
        return [
            'sendBoxs' => [
                'label' => Lang::get('waka.maillog::lang.menu.sendbox'),
                'description' => Lang::get('waka.maillog::lang.menu.sendbox_description'),
                'category' => Lang::get('waka.wutils::lang.menu.model_tasks'),
                'icon' => 'icon-envelope',
                'url' => Backend::url('waka/maillog/sendboxs'),
                'permissions' => ['waka.maillog.admin.*'],
                'order' => 30,
            ],
        ];
    }
}
