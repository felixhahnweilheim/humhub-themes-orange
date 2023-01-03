<?php

namespace humhub\modules\themeOrange;

use humhub\modules\ui\view\helpers\ThemeHelper;

class Module extends \humhub\components\Module
{
    /**
    * @inheritdoc
    */
    public $resourcesPath = 'resources';
    
	public $theme;
	
	public function disable() {
    
	    // Deselect theme (select community theme)
		$theme = ThemeHelper::getThemeByName('HumHub');
		if ($theme !== null) {
			$theme->activate();
		}
	
        parent::disable();
    }
}
