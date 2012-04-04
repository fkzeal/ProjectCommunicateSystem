<head>
    <link type="text/css" rel="stylesheet" href="CategoryDetail/css/CategoryDetail.css" />
    <script type="text/javascript" src="CategoryDetail/js/CategoryDetail.js"></script>
</head>
<div class="row" >
    <!--aside menu-->
    <div class="span3 offset2">
        <div class="well" style="padding: 8px 0;">
            <ul class="nav nav-list" id="asidemenu">
                <li class="nav-header"><h3>项目分类</h3></li>
<!--                <li class=""><a href="#">Java</a></li>
                <li class="divider"></li>
                <li><a href="#">C++</a></li>
                <li class="divider"></li>
                <li><a href="#">移动开发</a></li>
                <li class="divider"></li>
                <li><a href="#">Android</a></li>
                <li class="divider"></li>
                <li><a href="#">IOS</a></li>
                <li class="divider"></li>
                <li><a href="#">创新杯</a></li>
                <li class="divider"></li>
                <li><a href="#">EL程序设计大赛</a></li>
                <li class="divider"></li>-->

<?php
           $categoryInfo = CategoryInfo::model()->findAllByAttributes(array(
            'Flag' => $type
                ));     
                
                foreach ($categoryInfo as $item) {
                    $categoryUrl = Yii::app()->createUrl('detaillist/list',array(
                    'type'=>$type,'category'=>$item[FirstLevel],'projectid'=>$projectid
                ));
                    echo "<li><a href='$categoryUrl'>$item[FirstLevel]</a></li>";
                    echo "<li class=\"divider\"></li>";
                }
                $typeTag = $type == 'c'?"code":"app";
                $return = Yii::app()->createUrl($typeTag.'info/index', array('projectid' => $projectid));
                echo "<li><a href=$return>返回</a></li>";
                
                ?>

            
            </ul>
        </div>			
    </div>	

    <!--main content-->	
    <div class="span10" id="main-content">	
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#cat-detail">
                    <span class="label label-info">
                        <i class="icon-tag"></i><?php echo $category; ?>
                    </span></a>						  									    
            </li>												 
        </ul>
        <div class="tab-content">
            <!--detail-->
            <div class="tab-pane active" id="cat-detail">
                <?php
                $projectid = $cate->appCodeCategory;
                if (!empty($projectid)) {
                    foreach ($projectid as $value) {

                        $downloadUrl = Yii::app()->createUrl('site/download',
                            						array(
					      'pid'=>$project[ID],'type'=>$type
					));
                        $project = $value->project;
                        switch ($type) {
                            case 'c':
                                $item = $project->projectCodes;
                                $downloadTimes = $item->CodeDownloadTimes;
                                $url = Yii::app()->createUrl('codeinfo/index',
                            						array(
					      'projectid'=>$project[ID]
					));
                                break;
                            case 'a':
                                $item = $project->projectApps;
                                $downloadTimes = $item->AppDownloadTimes;
                                $url = Yii::app()->createUrl('appinfo/index',
                            						array(
					      'projectid'=>$project[ID]
					));
                                break;
                            
                        }
                        $count = ProjectComment::model()->count("ProjectID=:projectid AND Flag=:f", array(
            ':projectid' => $project->ID, ':f' => $type));
                        echo '<ul class="category-block">
                    <li><a href="'.$url.'"><img src="'.$project->ProjectIconPath.'" alt="code-img" /></a></li>           	
                    <li class="category-item-name page-header">
                    <a href="'.$url.'"><span>'.$project->ProjectName.'</span></a></li>
                    <li>'.$project->ProjectDescription.'</li>
                    <li class="category-item-grade">下载次数：<span>'.$downloadTimes.'</span></li>
                    <li class="category-item-comments">评论数：<span>'.$count.'</span></li>
                    <a href="'.$downloadUrl.'" class="btn btn-primary">下 载</a>
                </ul>';
                    }
                } else {
                    echo '<ul class="category-block">
                    <p>暂无项目</p>
                </ul>';
}
                ?>
                
                						
            </div>
        </div>
    </div>
</div>		

