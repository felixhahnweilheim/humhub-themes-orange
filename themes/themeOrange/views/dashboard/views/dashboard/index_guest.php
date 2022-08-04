<?php

use humhub\libs\Html;
use humhub\modules\dashboard\widgets\DashboardContent;
use humhub\modules\dashboard\widgets\Sidebar;
use humhub\widgets\FooterMenu;
use humhub\widgets\LanguageChooser;

?>

<?= Html::beginContainer(); ?>
<div class="row">
    <div class="col-md-8 layout-content-container">
        <?= DashboardContent::widget(); ?>
    </div>
    <div class="col-md-4 layout-sidebar-container">
        <?= LanguageChooser::widget(); ?>
        <?= Sidebar::widget([
            'widgets' => [
            ]
        ]);
        ?>
        <?= FooterMenu::widget(['location' => FooterMenu::LOCATION_SIDEBAR]); ?>
    </div>
</div>
<?= Html::endContainer(); ?>
