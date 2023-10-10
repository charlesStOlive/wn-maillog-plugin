<?php namespace Waka\MailLog;

use Backend;
use Backend\Models\UserRole;
use System\Classes\PluginBase;

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
     * Register method, called when the plugin is first registered.
     */
    public function register(): void
    {

    }

    /**
     * Boot method, called right before the request route.
     */
    public function boot(): void
    {

    }

    /**
     * Registers any frontend components implemented in this plugin.
     */
    public function registerComponents(): array
    {
        return []; // Remove this line to activate

        return [
            'Waka\MailLog\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any backend permissions used by this plugin.
     */
    public function registerPermissions(): array
    {
        return []; // Remove this line to activate
    }

    /**
     * Registers backend navigation items for this plugin.
     */
    public function registerNavigation(): array
    {
        return []; // Remove this line to activate

        return [
            'maillog' => [
                'label'       => 'waka.maillog::lang.plugin.name',
                'url'         => Backend::url('waka/maillog/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['waka.maillog.*'],
                'order'       => 500,
            ],
        ];
    }
}
