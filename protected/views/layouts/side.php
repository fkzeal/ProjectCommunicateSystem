

<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>软院项目管理系统</title>
        <link type="text/css" rel="stylesheet" href="CodeInfoFiles/CodeInfo.css" />
        <link type="text/css" rel="stylesheet" href="GlobalFiles/global.css" />
        <link type="text/css" rel="stylesheet" href="GlobalFiles/css/jquery-ui-1.8.17.custom.css" />
        <script type="text/javascript" src="GlobalFiles/js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="GlobalFiles/js/ui/jquery-ui-1.8.17.custom.min.js"></script>
        <script type="text/javascript" src="GlobalFiles/js/global.js"></script>
        <script type="text/javascript" src="CodeInfoFiles/CodeInfo.js"></script>

        
         <link type="text/css" rel="stylesheet" href="css/mai.css" />
        <link type="text/css" rel="stylesheet" href="CodeHomeFiles/css/CodeHome.css" />
     
        <script type="text/javascript" src="GlobalFiles/js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="GlobalFiles/js/ui/jquery-ui-1.8.17.custom.min.js"></script>
        <script type="text/javascript" src="GlobalFiles/js/ui/jquery.ui.button.min.js"></script>

        <script type="text/javascript" src="GlobalFiles/js/global.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/js/CodeHome.js"></script>
    </head>-->
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
    <body>
        <!--
        code after this invalide until .......
        -->

        <!--        <div id="header">
                    <div id="top-header">	
                        <p id="username">您好<?php
//                if(!(Yii::app()->user->getIsGuest())){
//                if (isset (Yii::app()->user->getState('nick',NULL))) {
//                    $name = Yii::app()->user->getState('nick');
//}  else {
//    $name = Yii::app()->user->name;
//}
if (Yii::app()->user->name !== 'Guest') {
    $nickname = User::model()->findByPk(Yii::app()->user->getState('id'))->NickName;
    $name = Yii::app()->user->name;
    if (!empty($nickname)) {
        $name = $nickname;
    }
    echo ',';
    echo $name;
}

//                }
?>！</p>
                       
                        <a href="<?php echo Yii::app()->createUrl('apphome/index'); ?>" class="btn" >首页</a>
        <?php
        if (Yii::app()->user->getIsGuest()) {
            $loginurl = Yii::app()->createUrl('site/login');
            $registerurl = Yii::app()->createUrl('site/register');
            echo "<a href=\" $loginurl \" type=\"hidden\" class=\"btn\" >登陆</a>";
            echo "<a href=\" $registerurl \" type=\"hidden\" class=\"btn\" >注册</a>";
        } else {
            $manageinfourl = Yii::app()->createUrl('site/manageinfo');
            echo "<a href=\"$manageinfourl\" class=\"btn\" id=\"account\">账户管理</a>";
            $logouturl = Yii::app()->createUrl('site/logout');
            echo "<a href=\"$logouturl\" class=\"btn\" id=\"account\">注销</a>";
        }
        ?>
        <?php//                echo Yii::app()->user->name?>
                                        
                                
                    </div>
        
                    <img alt="logo" src="GlobalFiles/logo.png" id="logo" />
                </div>
                <div id="nav">
                    <ul>
                        <li><a href="<?php echo Yii::app()->createUrl('apphome/index'); ?>">应用</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('codemain/index'); ?>">源码</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('project/view'); ?>">我的项目</a></li>
        
                        <li><a href="<?php echo Yii::app()->createUrl('project/create'); ?>">创建项目</a></li>
                        <li><a href="">SVN账号管理</a></li>
                    </ul>
                </div>-->


        <!--
        until this .......  after this  code is valide
        -->
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
        <nav class="row">						
            <ul id="menu" class="span12 offset2">
                <li ><a href="<?php echo Yii::app()->createUrl('apphome/index'); ?>">
                        <i class="icon-home"></i>应用市场</a></li>
                <li ><a href="<?php echo Yii::app()->createUrl('codemain/index'); ?>">
                        <i class="icon-list"></i>源码社区</a></li>
                <li ><a href="<?php echo Yii::app()->createUrl('project/view'); ?>">
                        <i class="icon-book"></i>我的项目</a></li>
                <li ><a href="<?php echo Yii::app()->createUrl('project/create'); ?>">
                        <i class="icon-star"></i>创建项目</a></li>															
            </ul> 
        </nav>

        <?php echo $content; ?>

        <hr>  
        <div id="footer" class="row">     	 	    	   	
            <div class="span12 offset6">	    	
                <ul>
                    <li><a href="http://software.nju.edu.cn/">软件学院</a></li>
                    <li><a href="http://software.nju.edu.cn/">南京大学</a></li>
                    <li><a href="http://software.nju.edu.cn/">Copyright 2012-2013 南京大学软件学院</a></li> 
                </ul> 
            </div>   	
        </div>
    </body>
</html>