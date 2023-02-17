<?php

use yii\base\Event;
use humhub\components\ModuleManager;
use humhub\modules\admin\widgets\AdminMenu;
use humhub\modules\themeOrange\Events;

return [
    'id' => 'theme-orange',
    'class' => 'humhub\modules\themeOrange\Module',
    'namespace' => 'humhub\modules\themeOrange',
    'events' => [
		[
			'class' => ModuleManager::class,
			'event' => ModuleManager::EVENT_AFTER_MODULE_ENABLE,
			'callback' => [Events::class, 'onModuleEnabled']
		],
		[
			'class' => AdminMenu::class,
			'event' => AdminMenu::EVENT_INIT,
			'callback' => [Events::class, 'onAdminMenuInit']
		],
	],
];
