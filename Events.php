<?php

namespace humhub\modules\themeOrange;

use Yii;
use yii\base\Model;
use humhub\modules\ui\view\helpers\ThemeHelper;
use yii\base\Theme;

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
    }
}
