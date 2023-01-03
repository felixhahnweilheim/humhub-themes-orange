<?php

namespace humhub\modules\themeOrange;

use Yii;
use yii\base\Model;
use humhub\modules\ui\view\helpers\ThemeHelper;
use yii\base\Theme;

class Events {

    public $theme;
    
    /*
     * Callback after Module enabled
     * @param ModuleEvent $event
     */
    public static function onModuleEnabled($event) {
    
        /*Select Orange Theme*/
        $theme = ThemeHelper::getThemeByName('themeOrange');
		    
        /*Activate Orange Theme*/
        if ($theme !== null) {
            $theme->activate();
        }
    }
}
