<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use jcabanillas\blog\assets\AppAsset;
use jcabanillas\blog\widgets\Alert;
use jcabanillas\blog\widgets\Search;
use jcabanillas\blog\widgets\TagCloud;
use jcabanillas\blog\widgets\Links;
use jcabanillas\blog\widgets\RecentComments;
use jcabanillas\blog\widgets\SiteStat;
use jcabanillas\blog\widgets\RecentPosts;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="Robots" Content="All">
    <meta name="googlebot" content="All">
    <meta name="keywords" content="<?//= Html::encode($this->seoKeywords) ?>" />
    <meta name="description" content="<?//= Html::encode($this->seoDescription) ?>" />
    <meta name="author" content="Babyblog" />
    <meta name="Copyright" content="Babyblog" />

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container" id="page">
    <div id="header">
        <div id="logo"><?= Html::a(Yii::$app->params['blogTitle'], Yii::$app->homeUrl) ?></div>
        <div id='search'><?= Search::widget() ?></div>
        <div class="clear"></div>
    </div><!-- header -->

    <div class="clear"></div>

    <div id="mainmenu">
        <?= Nav::widget(['items' => Yii::$app->params['mainMenu']]); ?>
    </div>

    <?= Breadcrumbs::widget([
        'links' => isset($this->breadcrumbs) ? $this->breadcrumbs : [],
    ]) ?>

    <div class="span-19">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="span-5 last">
        <div id="sidebar">

            <?= TagCloud::widget([
                'title' => '<i class="icon-st"></i>Nube de Etiquetas',
                'maxTags' => 5,
            ]) ?>

            <?= \jcabanillas\blog\widgets\RecentPosts::widget([
                'title' => '<i class="icon-st"></i>Artículos Recientes',
                'maxPosts' => 5,
            ]) ?>

            <?= RecentComments::widget([
                'title' => '<i class="icon-st"></i>Comentarios Recientes',
                'maxComments' => 5,
            ]) ?>

            <?= Links::widget([
                'title' => '<i class="icon-st"></i>Ligas',
                'links' => Yii::$app->params['blogLinks'],
            ]) ?>

            <?= SiteStat::widget([
                'title' => '<i class="icon-st"></i>Estadísticas del Sitio',
            ]) ?>
        </div>
    </div>

</div>

<div id="footer">
    <?= Yii::$app->params['blogFooter'] ?>
</div><!-- footer -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
