<?php

namespace humhub\modules\themeOrange;

use humhub\modules\ui\view\helpers\ThemeHelper;

class Module extends \humhub\components\Module
{
    /**
    * @inheritdoc
    */
    public $resourcesPath = 'resources';
	
    /*Setting for comment link (options: icon, text, both)*/
	public $commentLink = 'icon';
	
	public $theme;
	
	public static function getCommentLinkSetting() {
		
		$module = Yii::$app->getModule('theme-orange');
        return $module ? $module->commentLink : 'icon';
	}
	
	public function disable() {
    
	    // Deselect theme (select community theme)
		$theme = ThemeHelper::getThemeByName('HumHub');
		if ($theme !== null) {
			$theme->activate();
		}
	
        parent::disable();
    }
}
