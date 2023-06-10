<?php

namespace humhub\modules\themeOrange;

use Yii;
use yii\base\Model;
use humhub\modules\ui\view\helpers\ThemeHelper;
use yii\base\Theme;
use yii\helpers\Url;


class Events
{
    public static function onAdminMenuInit($event)
    {
		$event->sender->addItem([
            'label' =>  Yii::t('ThemeOrangeModule.base', 'Theme Orange Configuration'),
            'url' => Url::to(['/theme-orange/config']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-eye"></i>',
            'isActive' => (Yii::$app->controller->module
                    && Yii::$app->controller->module->id === 'theme-orange'
                    && (Yii::$app->controller->id === 'page' || Yii::$app->controller->id === 'config')),
            'sortOrder' => 900,
            'isVisible' => true,
        ]);
	}
}
