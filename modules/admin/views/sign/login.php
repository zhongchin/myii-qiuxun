<html lang="<?php echo Yii::$app->language?>">
<?php //$this=new \yii\web\View();?>
<?php $this->beginPage();?>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?=\yii\helpers\Html::csrfMetaTags();?>
    <title>球讯后台管理</title>
<?php
    \app\assets\AppAsset::register($this);
    \yii\bootstrap\BootstrapAsset::register($this);
    $this->head()
?>
    <style type="text/css">
        #login-page{
            width:100%;
            height:100%;
            background: #3D3852;
        }
        #login-box{
            float: none;
            margin-top: auto;
            margin-bottom: auto;
            top:30%;
        }
        #login-box .panel{
            box-shadow: 1px 1px 1px #c0c0c0;
        }
    </style>

</head>
<body>
<?php $this->beginBody()?>
<div id="login-page">
    <div id="login-box" class="container col-lg-6 text-center">
        <div class="panel panel-default">
            <div class="panel-heading">
                <label>Login</label>
            </div>
            <div class="panel-body">
                <?php $form = \yii\widgets\ActiveForm::begin([
                    'id' => 'login-form',
                    'options' => ['class' => 'form-horizontal'],
                    'fieldConfig' => [
                       'template' => "<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                        'labelOptions' => ['class' => 'col-lg-1 control-label'],
                    ],
                ]); ?>
                <input type="" placeholder="">
                <?php echo  $form->field($model,"mobile")->textInput(["type"=>"mobile"]);?>
                <?php echo  $form->field($model,"password")->passwordInput(["max"=>20,"min"=>5]);?>
                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>
                <?php $form::end()?>
            </div>
        </div>
    </div>
</div>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage();?>

