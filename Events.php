<?php

namespace humhub\modules\themeOrange;

use Yii;
use yii\base\Model;
use humhub\modules\ui\view\helpers\ThemeHelper;
use yii\base\Theme;
use yii\helpers\Url;


class Events
{
    /*
     * Callback after Module enabled
     * @param ModuleEvent $event
     */
    public static function onModuleEnabled($event)
    {
        /*Activate Orange Theme*/
        $theme = ThemeHelper::getThemeByName('themeOrange');
        if ($theme !== null) {
            $theme->activate();
        }
		
		/*Add Module settings*/
		$module = Yii::$app->getModule('theme-orange');
		$module->settings->set('commentLink', $module->commentLink);
	    $module->settings->set('likeLink', $module->likeLink);
		$module->settings->set('likeIcon', $module->likeIcon);
    }
    
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
