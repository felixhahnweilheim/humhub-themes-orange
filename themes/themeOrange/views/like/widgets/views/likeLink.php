<?php

use yii\helpers\Html;
use \humhub\modules\themeOrange\Module;

humhub\modules\like\assets\LikeAsset::register($this);

$heart = '<i class="fa fa-heart-o"></i>';
$heartFull = '<i class="fa fa-heart"></i>';
$thumbsup = '<i class="fa fa-thumbs-o-up"></i>';
$thumbsupFull = '<i class="fa fa-thumbs-up"></i>';
$star = '<i class="fa fa-star-o"></i>';
$starFull = '<i class="fa fa-star"></i>';

$iconContainerClass = 'no-icon';

if (Module::getLikeIcon() == 'heart') {
	$iconContainerClass = 'heartContainer';
	$iconEmpty = $heart;
	$iconFull = $heartFull;
} elseif (Module::getLikeIcon() == 'star') {
	$iconContainerClass = 'starContainer';
	$iconEmpty = $star;
	$iconFull = $starFull;
} elseif (Module::getLikeIcon() == 'thumbsup') {
	$iconContainerClass = 'thumbsupContainer';
	$iconEmpty = $thumbsup;
	$iconFull = $thumbsupFull;
}

if (Module::getLikeLinkSetting() == 'text') {
	$iconContainerClass = 'no-icon';
}
?>

<span class="likeLinkContainer <?= $iconContainerClass ?>" id="likeLinkContainer_<?= $id ?>">

    <?php if (Yii::$app->user->isGuest): ?>

        <?= Html::a(Yii::t('LikeModule.base', 'Like'), Yii::$app->user->loginUrl, ['data-target' => '#globalModal']); ?>
    <?php else: ?>
        <a href="#" data-action-click="like.toggleLike" data-action-url="<?= $likeUrl ?>" class="like likeAnchor<?= !$canLike ? ' disabled' : '' ?>" style="<?= (!$currentUserLiked) ? '' : 'display:none'?>" title="<?= Yii::t('LikeModule.base', 'Like') ?>">
			
			<?php /*Conditions not liked yet*/
	        if (Module::getLikeLinkSetting() == 'icon'): ?>
                <?= $iconEmpty ?>
			<?php elseif (Module::getLikeLinkSetting() == 'text'): ?>
			    <?= Yii::t('LikeModule.base', 'Like'); ?>
			<?php elseif (Module::getLikeLinkSetting() == 'both'): ?>
			    <?= $iconEmpty . HTML::tag('span', Yii::t('LikeModule.base', 'Like'), ['class' => 'like-label-both']); ?>
			<?php endif; ?>
			
        </a>
        <a href="#" data-action-click="like.toggleLike" data-action-url="<?= $unlikeUrl ?>" class="unlike likeAnchor<?= !$canLike ? ' disabled' : '' ?>" style="<?= ($currentUserLiked) ? '' : 'display:none'?>" title="<?= Yii::t('LikeModule.base', 'Unlike') ?>">
			
			<?php /*Conditions already liked*/
	        if (Module::getLikeLinkSetting() == 'icon'): ?>
                <?= $iconFull ?>
			<?php elseif (Module::getLikeLinkSetting() == 'text'): ?>
			    <?= Yii::t('LikeModule.base', 'Unlike'); ?>
			<?php elseif (Module::getLikeLinkSetting() == 'both'): ?>
			    <?= $iconFull . HTML::tag('span', Yii::t('LikeModule.base', 'Unlike'), ['class' => 'unlike-label-both']); ?>
			<?php endif; ?>
			
        </a>
    <?php endif; ?>

        <!-- Create link to show all users, who liked this -->
    <a href="<?= $userListUrl; ?>" data-target="#globalModal">
        <?php if (count($likes)) : ?>
            <span class="likeCount tt" data-placement="top" data-toggle="tooltip" title="<?= $title ?>">(<?= count($likes) ?>)</span>
        <?php else: ?>
            <span class="likeCount"></span>
        <?php endif; ?>
    </a>

</span>
