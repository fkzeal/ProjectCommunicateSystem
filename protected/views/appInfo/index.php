<?php
$this->breadcrumbs = array(
    'App Info',
);
?>


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

    </head>
    <body>
        <div id="header">
            <div id="top-header">	
                <p id="username">您好<?php
//if ($name !== NULL) {
//    echo ",$name";
//}
?>！</p>

                <a href="" class="btn" >应用首页</a>
                <a href="" class="btn" id="account">账户管理</a>
                <a href="" class="btn" id="logout">退出</a>            
            </div>

            <img alt="logo" src="GlobalFiles/logo.png" id="logo" />
        </div>
        <div id="nav">
            <ul>
                <li><a href="">应用</a></li>
                <li><a href="">源码</a></li>
                <li><a href="">我的项目</a></li>

                <li><a href="">创建项目</a></li>
                <li><a href="">SVN账号管理</a></li>
            </ul>
        </div>-->
<div id="aside">
    <p><span>应用分类</span></p>
    <ul>
        <?php
        foreach ($categoryInfo as $value) {
            echo '<li><a href="">';
            echo "$value->FirstLevel";
            echo '</a></li>';
        }
        ?>
        <!--                <li><a href="">java</a></li>
                        <li><a href="">C++</a></li>
                        <li><a href="">移动开发</a></li>
                        <li><a href="">Web开发</a></li>
                        <li><a href="">Android</a></li>
                        <li><a href="">IOS</a></li>
        
                        <li><a href="">创新杯</a></li>
                        <li><a href="">EL程序设计大赛</a></li>
                        <li><a href="">往届作业</a></li>             -->
    </ul>    
</div>
<div id="main-content">
    <div id="code-basic-info">
        <img id="code-img" src="<?php echo "$project[ProjectIconPath]"; ?>" alt="appimg" />

        <div id="code-header">
            <p id="code-name"><?php echo $project[ProjectName]; ?></p>
            <p>评分:<span id="code-grade"><?php echo $project->projectApps[AppScore]; ?></span></p>

            <p>评论数:<a href="#comment-box" id="code-commenttimes">
                    <?php
                    echo $count;
                    $downloadUrl = Yii::app()->createUrl('site/download');
                    ?>
                </a></p>
                <form id="download" name="download" method="post" action="<?php echo $downloadUrl;?>" >
                    <input name ="type" value="1" type="hidden" /> 
                    <input name="pid" value='<?php echo $project->ID;?>' type="hidden"/>
                    <button type="submit" class="btn" id="download-btn">下载应用</button>  
            </form>
        </div>

        <ul>
            <li>应用大小:<span id="code-size">

                    10M</span></li>
            <li>上传日期:<span id="code-date">
                    <?php echo $project->ProjectCreatedTime; ?></span></li>
            <li>上传者:<span id="code-publisher">
                    <?php
                    $uploadUser = $project->user[NickName];
                    $userName = $project->user[UserName];
                    if (empty($uploadUser)) {
                        $uploadUser = $userName;
                        echo $uploadUser;
                    } else {
                        echo $uploadUser . '(' . $userName . ')';
                    }
                    ?></span></li>
            <li>资源类别:<span id="code-category">
                    <?php
                    echo $category->FirstLevel;
                    if (isset($value->SecondLevel)) {
                        echo " $value->SecondLevel";
                    }
                    ?></span></li>

            <li>下载次数:<span id="code-downloadtimes">
                    <?php echo $project->projectApps[AppDownloadTimes]; ?>次</span></li>     
<!--                    <li>浏览次数:<span id="code-scantimes">30次</span></li>    -->
        </ul>
        <ul id="code-tag">
            <li id="tag-title">标签:</li>
             <?php foreach ($tag as $value){
     echo ' <li class="code-tagcontent"><a href=""> ';
                        echo $value->TagContent; 
                        echo '</a></li>';

                    }

                    ?>
<!--            <li class="code-tagcontent"><a href="">信息管理</a></li>
            <li class="code-tagcontent"><a href="">图书馆</a></li> 
            <li class="code-tagcontent"><a href="">抽象工厂模式</a></li>  -->
        </ul>       
    </div>


    <ul class="tabs">
        <li><a href="#tab-project">应用简介</a></li>
        <!--                <li><a href="#tab-detail">源码简介</a></li>
                        <li><a href="#tab-rellink">参考连接</a></li>
                        <li><a href="#tab-preview">代码预览</a></li>-->
        <li><a href="#tab-comment">评论</a></li>
    </ul>       	

    <div class="tabContent"> 


        <div id="tab-project" class="tabBody">            	
            <div id="code-detail" class="code-detail-box">

                <p><?php
                    echo $project->ProjectDescription;
                    ?></p>
            </div>           
        </div> 

        <!--                <div id="tab-detail" class="tabBody">            	
                            <div id="code-detail" class="code-detail-box">
        
                                <p><?php
//                            echo $project->projectCodes[CodeDescription];
                    ?></p>
                            </div>           
                        </div> 
                        
                        
                        <div id="tab-rellink" class="tabBody">
                            <div id="code-rellink" class="code-detail-box">
                                <p>
        <?php
//                            foreach ($reference as $key=>$value) {
//                                echo '<br/>';
//                                $url = Yii::app()->createUrl('codeinfo/index',array(
//                                    'userid'=>$userid,'projectid'=>$key
//                                ));
//                                echo "<a href=\"$url\">";
//                               echo $value->ProjectName;
//                               echo '</a>';
//                            }
        ?>
                                    <a href="">www.dkjl.com</a>
                                    <a href="">kjoiel.com</a>
        
                                    <a href="">dsdf.com</a>
                                </p>
                            </div>          
                        </div> 
                        <div id="tab-preview" class="tabBody">
                            <div id="code-preview" class="code-detail-box">
                                <code>
        <?php //echo $project->projectCodes[CodeFragment]; ?>
                                </code>
                            </div>          
                        </div>-->

        <div id="tab-comment" class="tabBody">

            <div id="comment-box">

                <?php
                foreach ($comment as $key => $value) {
                    $user = $value->user;
                    echo "<div class=\"comment-block\">";
                    echo "<p class=\"commenter-name\">$user[UserName]</p>";
                    echo "<p class=\"comment-content\">$value[Content]</p>";

                    echo "</div>";
                }
                ?>
                <!--                        <div class="comment-block">
                                            <p class="commenter-name">技术大牛</p>
                                            <p class="comment-content">这是一个好代码，写得非常不错！顶</p>
                                        </div>-->
                <!--                        <div class="comment-block">
                                            <p class="commenter-name">技术中牛</p>
                
                                            <p class="comment-content">这是一个好代码，写得非常不错！顶</p>
                                        </div>
                                        <div class="comment-block">
                                            <p class="commenter-name">技术小牛</p>
                                            <p class="comment-content">这是一个好代码，写得非常不错！顶</p>
                                        </div>        -->
            </div>

            <div class="box-tag"><span>我来评论</span></div>

            <div id="makecomments">
                <form id="code-comment" action="<?php echo yii::app()->createUrl('codeinfo/comment'); ?>" 
                      name="code-comment" method="post">
                          <?php
//                            echo CHtml::textArea('comment-content',array(
//                               'id'=>'comment-content','rows'=>'12','cols'=>'110'));
                          ?>
                    <textarea id="comment-content" name="comment-content" rows="12" cols="110">
                    </textarea>  
                    <input value ="<?php echo $userid ?>" type ="hidden" name ="userid"/>
                    <input value ="<?php echo $projectid ?>" type ="hidden" name ="projectid"/>
                    <input value ="a" type ="hidden" name ="flag"/>

                    <?php echo CHtml::submitButton('提交', array(
                        'id' => 'submit-comment', 'class' => 'btn')); ?>
                    <input id="reset-comment" class="btn" type="reset" value="重新评论" />
                </form>
            </div> 
        </div> 

    </div>   
</div>

<!--
        <div id="footer">
            <ul>
                <li><a href="http://software.nju.edu.cn/">软件学院</a></li>
                <li><a href="http://software.nju.edu.cn/">南京大学</a></li>
                <li><a href="http://software.nju.edu.cn/">Copyright 2012-2013 南京大学软件学院</a></li>
            </ul>
        </div>-->






