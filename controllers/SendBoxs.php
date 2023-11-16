<?php namespace Waka\MailLog\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use System\Classes\SettingsManager; 
/**
 * Send Boxs Backend Controller
 */
class SendBoxs extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
        \Backend\Behaviors\RelationController::class,
        \Waka\Wutils\Behaviors\WakaControllerBehavior::class,
    ];

    public $requiredPermissions = ['waka.maillog.admin.*'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Winter.System', 'system', 'settings');
        SettingsManager::setContext('Waka.MailLog', 'sendBoxs');
    }

    
    
}
