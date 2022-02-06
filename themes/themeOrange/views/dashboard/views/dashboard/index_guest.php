<?php

use humhub\libs\Html;
use humhub\modules\dashboard\widgets\DashboardContent;
use humhub\modules\dashboard\widgets\Sidebar;
use humhub\widgets\FooterMenu;

?>

<?= Html::beginContainer(); ?>
<div class="row">
    <div class="col-md-12 layout-content-container">
        <?= FooterMenu::widget(['location' => FooterMenu::LOCATION_SIDEBAR]); ?>
        <?= DashboardContent::widget(); ?>
    </div>
</div>
<?= Html::endContainer(); ?>
