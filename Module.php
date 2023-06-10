<?php

namespace humhub\modules\themeOrange;

use humhub\modules\ui\view\helpers\ThemeHelper;
use humhub\models\Setting;
use Yii;
use yii\helpers\Url;

class Module extends \humhub\components\Module
{
    /**
    * @inheritdoc
    */
    public $resourcesPath = 'resources';
	
    /**
	 * @var string defines the style of comment links (options: icon, text, both)
	 */
	public $commentLink = 'icon';

    /**
	 * @var string defines the style of like links (options: icon, text, both)
	 */
	public $likeLink = 'icon';
	
    /**
	 * @var string defines the like icon (options: heart, thumbsup, star)
	 */
	public $likeIcon = 'heart';
    
    const THEME_NAME = "themeOrange";
	
	public static function getCommentLinkSetting() {
		return Yii::$app->getModule('theme-orange')->settings->get('commentLink');
	}
	
	public static function getLikeLinkSetting() {
		return Yii::$app->getModule('theme-orange')->settings->get('likeLink');
	}
	
	public static function getLikeIcon() {
		return Yii::$app->getModule('theme-orange')->settings->get('likeIcon');
	}
	
	/*
	 * @inheritdoc
	 */
	public function getConfigUrl() {
        return Url::to(['/theme-orange/config']);
    }
	
	/*
	 * @inheritdoc
	 */
	public function getDescription() {
        return Yii::t('ThemeOrangeModule.base', 'A child theme for HumHub');
    }

    public function enable() {
    
	    /*Add Module settings*/
		$module = Yii::$app->getModule('theme-orange');
		$module->settings->set('commentLink', $module->commentLink);
	    $module->settings->set('likeLink', $module->likeLink);
		$module->settings->set('likeIcon', $module->likeIcon);
        
        if (parent::enable()) {
            $this->enableTheme();
            return true;
        }
        return false;
    }
    
    private function enableTheme()
    {
        // Already a theme based theme is active
        foreach (ThemeHelper::getThemeTree(Yii::$app->view->theme) as $theme) {
            if ($theme->name === self::THEME_NAME) {
                return;
            }
        }

        $theme = ThemeHelper::getThemeByName(self::THEME_NAME);
        if ($theme !== null) {
            $theme->activate();
            DynamicConfig::rewrite();
        }
    }
    
	/**
	 * @inheritdoc
	 */
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
