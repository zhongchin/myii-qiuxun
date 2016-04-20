<?php
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\helpers\Url;

$this->beginPage();
?>

<!DOCTYPE html>

<html lang="<?php echo Yii::$app->language?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?=Html::csrfMetaTags();?>
    <title>球讯后台管理</title>
    <?php \app\assets\AppAsset::register($this);?>
    <?php $this->head() ?>
</head>
<style type="text/css">
    #page-header .container{
        width: 100%;
    }
    #page-header{
        border-radius: 0px;
        margin-bottom: 0px;
    }
    #page-header .navbar-nav > li > a{
        line-height: 30px;
    }
    #leftnav{
       text-align: center;
        list-style: none;
        -webkit-border-radius: 1px;
        -moz-border-radius: 1px;
        border-radius: 1px;;
        float: left;
        min-height: 1080px;
        background: #37474F;
        padding:0px;
    }
    #leftnav li{
        list-style: none;
        border-radius: 1px;
    }
    #leftnav .list-group{
     margin-bottom: 0px;
    }
    #leftnav .list-group-item{
        border-radius: 0px;;
        border-top:0px;
        border-bottom: 0px;
        background: #37474F;
        color:#919A9E;
        line-height: 40px;

    }
    #leftnav .list-group-item:hover{
        background: #07acc1;
        color: #000;
    }
    #leftnav .list-group-item.active{
        background: #07acc1;
        color: #000;
        border-bottom: 1px solid #919A9E;
    }

  @media  only screen (max-width:1450px){
        #left-nav{
            width:20px;
        }
  }
 </style>
<body>
<?php $this->beginBody() ?>
<div id="wrapper">
    <?php
    NavBar::begin([
        "brandLabel"=>"球讯网后台管理",
        "brandUrl"=>Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar',
            "id"=>"page-header"
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            Yii::$app->user->isGuest==false ? (
            ['label' => '登陆', 'url' => ['/site/login']]
            ) : (
                '<li> <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                       <i class="glyphicon glyphicon-user"></i> <i class="caret"></i>
                    </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> 个人设置</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> 退出</a>
                    </li>
                </ul>
                </li>'
            )
        ],
    ]);
   NavBar::end();
    ?>

    <div class="page-container">
        <div id="leftnav" class="col-lg-2">
            <ul class="list-group nav">
                <li>
                    <a href="/index" class="list-group-item active">首页</a>
                </li>
                <li>
                    <a class="list-group-item" data-toggle="collapse" href="#usercollapse" aria-expanded="false">内容管理<span class="caret"></span></a>

                    <ul class="collapse list-group" id="usercollapse">
                        <li><a href="<?= Url::toRoute(['/admin/article/article-channel'])?>" class="list-group-item">文章栏目管理</a></li>
                        <li><a href="<?= Url::toRoute(['/admin/article/article'])?>" class="list-group-item">文章管理</a></li>
                    </ul>
                </li>
                <li>
                    <a class="list-group-item" data-toggle="collapse" href="#resourcecollapse" aria-expanded="false" aria-controls="collapseExample">资源管理<span class="caret"></span></a>
                    <ul class="collapse list-group" id="resourcecollapse">
                        <li><a href="<?= Url::toRoute(['user/index'])?>" class="list-group-item">用户列表（gii）</a></li>
                        <li> <a href="<?= Url::toRoute(['user/index'])?>" class="list-group-item">用户列表（gii）</a></li>
                    </ul>
            </ul>
        </div>
        <div id="page-wrapper" class="col-lg-10">
            <div class="header">
                <?= \yii\widgets\Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </div>
              <?=$content;?>
        </div>
</div>
<?php $this->endBody() ?>
</body>
 </html>
<?php $this->endPage();?>