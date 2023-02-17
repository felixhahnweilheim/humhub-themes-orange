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
