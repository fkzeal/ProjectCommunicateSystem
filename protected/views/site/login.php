
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Project Management System</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="description" content="" />
        <meta name="author" content="softwware" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0" />

        <link type="text/css" rel="stylesheet" href="GlobalFiles/css/bootstrap/bootstrap-responsive.css" />
        <link type="text/css" rel="stylesheet" href="GlobalFiles/css/bootstrap/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="GlobalFiles/css/global.css" />	

        <script type="text/javascript" src="GlobalFiles/js/jquery/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="GlobalFiles/js/bootstrap/bootstrap.js"></script>			
        <script type="text/javascript" src="GlobalFiles/js/bootstrap/bootstrap-transition.js"></script>		
        <script type="text/javascript" src="GlobalFiles/js/bootstrap/bootstrap-tab.js"></script>
        <script type="text/javascript" src="GlobalFiles/js/bootstrap/bootstrap-carousel.js"></script>
        <script type="text/javascript" src="GlobalFiles/js/bootstrap/bootstrap-typeahead.js"></script>
        <script type="text/javascript" src="GlobalFiles/js/bootstrap/bootstrap-scrollspy.js"></script>
        <script type="text/javascript" src="GlobalFiles/js/bootstrap/bootstrap-modal.js"></script>
        <script type="text/javascript" src="GlobalFiles/js/bootstrap/bootstrap-button.js"></script>	
        <script type="text/javascript" src="GlobalFiles/js/bootstrap/bootstrap-collapse.js"></script>
        <script type="text/javascript" src="GlobalFiles/js/bootstrap/bootstrap-popover.js"></script>
        <script type="text/javascript" src="GlobalFiles/js/bootstrap/bootstrap-tooltip.js"></script>		
        <script type="text/javascript" src="GlobalFiles/js/bootstrap/bootstrap-alert.js"></script>
        <script type="text/javascript" src="GlobalFiles/js/bootstrap/bootstrap-dropdown.js"></script>
        <script type="text/javascript" src="GlobalFiles/js/global.js"></script>	
    </head>



    <!--<h1>Login</h1>-->

    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a> 
                <a class="brand" href="#">欢迎光临PMS！</a>
                <div class="nav-collapse"> 						    							
                    <ul class="nav pull-right">
                        <li ><a href="<?php echo Yii::app()->createUrl('apphome/index'); ?>" >
                                <i class="icon-home icon-white"></i>首页</a></li>
                        <?php
                        if (Yii::app()->user->name !== 'Guest') {

                            $nickname = User::model()->findByPk(Yii::app()->user->getState('id'))->NickName;
                            $name = Yii::app()->user->name;
                            if (!empty($nickname)) {
                                $name = $nickname;
                            }
                            $name = '<li><a href="#" ><i class=" icon-user icon-white"></i>' . $name . '</a></li>';
                            echo $name;
                        }
                        ?>
                        <li><a href="<?php echo Yii::app()->createUrl('site/contact'); ?>" >
                                <i class=" icon-info-sign icon-white"></i>联系我们</a></li>
                        <?php
                        $loginurl = Yii::app()->createUrl('site/login');
                        $registerurl = Yii::app()->createUrl('site/register');
                        $manageinfourl = Yii::app()->createUrl('site/manageinfo');
                        $logouturl = Yii::app()->createUrl('site/logout');

                        if (Yii::app()->user->getIsGuest()) {

                            echo "<li><a href=\"$loginurl\"><i class=\"icon-arrow-right icon-white\"></i>登陆</a></li>";
//                    echo "<a href=\" $registerurl \" type=\"hidden\" class=\"btn\" >注册</a>";
                        } else {
//                    echo "<li><a href=\"$manageinfourl\"><i class=\"\" id=\"account\"></i>账户管理</a></li>";
                            echo "<li><a href=\"$logouturl\"><i class=\"icon-arrow-right icon-white\"></i>退出</a></li>";
                        }
                        ?>
<!--								  <li><a href="#" ><i class=" icon-arrow-right icon-white"></i>退出</a></li>								  -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <header class="row">
        <div class="span2 offset2">
            <img src="GlobalFiles/logo.png" alt="logo" width="300px" height="100px" />
        </div>		
    </header>
    <hr>
    <div class="row">
        <div class="span5 offset6">

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'login-form',
//    
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'htmlOptions' => array('class' => 'well',),
                    ));
            ?>

            <fieldset>
                <legend>用户登录</legend>

                <div class="control-group">

                    <?php
                    echo $form->labelEx($model, 'username', array(
                        'class' => 'control-label'
                    ));
                    ?>

                    <?php
                    echo $form->textField($model, 'username', array(
                        'class' => 'input-xlarge span4', 'required' => 'required'
                    ));
                    ?>
                    <?php
                    echo $form->error($model, 'username', array(
                        'style' => 'color: #EE0000',
                    ));
                    ?>
                    <a style="color: #EE0000"></a>

                    <?php
                    echo $form->labelEx($model, 'password', array(
                        'class' => 'control-label'
                    ));
                    ?>
                    <?php
                    echo $form->passwordField($model, 'password', array(
                        'class' => 'input-xlarge span4', 'required' => 'required'
                    ));
                    ?>
                    <?php
                    echo $form->error($model, 'password', array(
                        'style' => 'color: #EE0000',
                    ));
                    ?>
                </div>

                <label class="checkbox" for="LoginForm_rememberMe">
                    <?php echo $form->checkBox($model, 'rememberMe'); ?> 记住我 

                </label>
                <br/>
                <button class="btn btn-primary" type="submit">
                    <i class="icon-user"></i>登录
                </button>
                <hr>

                <p style="color:#0e509e">请使用tss账号及密码，如somebody09</p>
            </fieldset>
            <?php $this->endWidget(); ?>
        </div>
    </div>


