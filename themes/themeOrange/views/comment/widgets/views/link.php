<?php

use humhub\modules\comment\widgets\CommentLink;
use humhub\widgets\Button;
use yii\helpers\Html;
use yii\helpers\Url;
use \humhub\modules\comment\models\Comment;

use \humhub\modules\themeOrange\Module;

/* @var $this \humhub\modules\ui\view\components\View */
/* @var $objectModel string */
/* @var $objectId integer */
/* @var $id string unique object id */
/* @var $commentCount integer */
/* @var $mode string */
/* @var $isNestedComment boolean */
/* @var $comment \humhub\modules\comment\models\Comment */
/* @var $module \humhub\modules\comment\Module */

if (Module::getCommentLinkSetting() == 'text') {
	$additonalClass = 'no-icon';
} else {
	$additonalClass = '';
}

$hasComments = ($commentCount > 0);
$commentCountSpan = Html::tag('span', ' (' . $commentCount . ')', [
    'class' => 'comment-count ' . $additonalClass,
    'data-count' => $commentCount,
    'style' => ($hasComments) ? null : 'display:none'
]);

/*Html tags*/
$commentIcon = HTML::tag('i', '', ['class' => 'fa fa-comment-o', 'title' => Yii::t('CommentModule.base', "Comment")]);
$replyIcon = HTML::tag('i', '', ['class' => 'fa fa-comment-o', 'title' => Yii::t('CommentModule.base', "Reply")]);
$commentLabel = HTML::tag('span', Yii::t('CommentModule.base', "Comment"), ['class' => 'comment-label']);
$replyLabel = HTML::tag('span', Yii::t('CommentModule.base', "Reply"), ['class' => 'reply-label']);
$commentLabelBoth  = HTML::tag('span', Yii::t('CommentModule.base', "Comment"), ['class' => 'comment-label-both']);
$replyLabelBoth = HTML::tag('span', Yii::t('CommentModule.base', "Reply"), ['class' => 'reply-label-both']);

/*Label based on settings*/
if (Module::getCommentLinkSetting() == 'icon') {
    /*Icons instead of text - text as html title*/
    $label = ($isNestedComment) ? $replyIcon : $commentIcon;
} elseif (Module::getCommentLinkSetting() == 'both') {
	/*Icons and text*/
    $label = ($isNestedComment) ? $replyIcon . $replyLabelBoth : $commentIcon . $commentLabelBoth;
} else {
	/*Only text*/
	$label = ($isNestedComment) ? $replyLabel : $commentLabel;
}

if ($mode == CommentLink::MODE_POPUP): ?>
    <?php $url = Url::to(['/comment/comment/show', 'objectModel' => $objectModel, 'objectId' => $objectId, 'mode' => 'popup']); ?>
    <a href="#" data-action-click="ui.modal.load" data-action-url="<?= $url ?>">
	<?= $label . ' (' . $commentCount . ')' ?>
    </a>
<?php elseif (Yii::$app->user->isGuest): ?>
    <?= Html::a(
        $label . $commentCountSpan,
        Yii::$app->user->loginUrl,
        ['data-target' => '#globalModal']) ?>
<?php else : ?>
    <?= Button::asLink($label . $commentCountSpan)
        ->action('comment.toggleComment', null, '#comment_' . $id) ?>
<?php endif; ?>
