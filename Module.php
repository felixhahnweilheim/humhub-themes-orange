<?php

namespace humhub\modules\themeOrange;

use humhub\modules\ui\view\helpers\ThemeHelper;
use Yii;

class Module extends \humhub\components\Module
{
    /**
    * @inheritdoc
    */
    public $resourcesPath = 'resources';
	
    //Setting for comment link (options: icon, text, both)
	public $commentLink = 'icon';
	
	//Settinng for like link (options: icon, text, both)
	public $likeLink = 'icon';
	
	//Setting for like icon (options: heart, thumbsup, star)
	public $likeIcon = 'heart';
	
	public $theme;
	
	public static function getCommentLinkSetting() {
		$module = Yii::$app->getModule('theme-orange');
        return $module ? $module->commentLink : 'icon';
	}
	
	public static function getLikeLinkSetting() {
		$module = Yii::$app->getModule('theme-orange');
        return $module ? $module->likeLink : 'icon';
	}
	
	public static function getLikeIcon() {
		$module = Yii::$app->getModule('theme-orange');
        return $module ? $module->likeIcon : 'heart';
	}
	
	public function disable() {
    
	    // Deselect theme (select community theme)
		if (Yii::$app->view->theme->name == 'themeOrange') {
		    $theme = ThemeHelper::getThemeByName('HumHub');
		    if ($theme !== null) {
		    	$theme->activate();
			}
		}
	
        parent::disable();
    }
}
