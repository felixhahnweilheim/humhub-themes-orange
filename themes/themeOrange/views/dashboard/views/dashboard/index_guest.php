<?php

use humhub\libs\Html;
use humhub\modules\dashboard\widgets\DashboardContent;
use humhub\modules\dashboard\widgets\Sidebar;
use humhub\widgets\FooterMenu;
use humhub\widgets\LanguageChooser;

?>

<?= Html::beginContainer(); ?>
<div class="row">
    <div class="col-md-6">
        <?= LanguageChooser::widget(); ?>
    </div>
    <div class="col-md-6">
        <?= FooterMenu::widget(['location' => FooterMenu::LOCATION_SIDEBAR]); ?>
    </div>
    <div class="col-md-12 layout-content-container">
        <?= DashboardContent::widget(); ?>
    </div>
</div>
<?= Html::endContainer(); ?>
