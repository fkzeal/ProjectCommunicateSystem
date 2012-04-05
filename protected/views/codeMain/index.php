<!--﻿<head>
    <link type="text/css" rel="stylesheet" href="HomeFiles/css/Home.css" />
        <script type="text/javascript" src="HomeFiles/js/Home.js"></script>
</head>-->


<div class="row" >
    <!--aside menu-->
    <div class="span3 offset2">
        <div class="well" style="padding: 8px 0;">
            <ul class="nav nav-list" id="asidemenu">
                <li class="nav-header"><h3>源码分类</h3></li>
                <?php
                
                foreach ($category as $item) {
                    $categoryUrl = Yii::app()->createUrl('detaillist/list',array(
                    'type'=>'c','category'=>$item[FirstLevel],'projectid'=>$projectid
                ));
                    echo "<li><a href='$categoryUrl'>$item[FirstLevel]</a></li>";
                    echo "<li class=\"divider\"></li>";
                }
                $return = Yii::app()->createUrl('codeinfo/index', array('projectid' => $projectid));
                echo "<li><a href=$return>返回</a></li>";
                ?>
            </ul>
        </div>			
    </div>	

    <!--main content-->	
    <div class="span10" id="main-content">						
        <div class="row">
            <div class="span10">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#hot-project"><span class="label label-info"><i class="icon-fire"></i> 热门源码</span></a>						  									    
                    </li>
                    <li>
                        <a data-toggle="tab" href="#latest-project"><span class="label label-info"><i class="icon-leaf"></i> 最新源码</span></a>
                    </li>						 
                </ul>
                <div class="tab-content">
                    <!--hot project-->
                    <div class="tab-pane active" id="hot-project">						    
                        <ul class="thumbnails">
                            <?php
                            $downloadUrl = Yii::app()->createUrl('site/download');

                            for ($i = 0; $i < 9; $i++) {
                                if ($i < count($hotest)) {              //判断，防止项目数不足9个
                                    $hotcode = $hotest[$i];
                                    $comment = $commentHotest[$i];
                                    $project = $hotcode->project;    //关联查询，project_code关联到project表

                                    $url = Yii::app()->createUrl('codeinfo/index', array('userid' => $project['UserID'],
                                        'projectid' => $hotcode['ProjectID']
                                            ));
                                    echo"
				                        <li class='span3'>
								            <div class='thumbnail'>
								                <a href='$url'><img src='$project->ProjectIconPath'  class='project-img' alt='project img' /></a>
								                <div class='caption'>
								                    <h5><a href='$url'>$project[ProjectName]</a></h5>						              
								                    <p>下载次数：<span class='project-grade'>$hotcode[CodeDownloadTimes]</span></p>
								                    <p>评论数：<span class='project-comments-qty'>$comment</span></p>
								                    <form id=\"download\" name=\"download\" method=\"post\" action=\"$downloadUrl\" >
                                                                                            <input name =\"type\" value=\"c\" type=\"hidden\" /> 
                                                                                            <input name=\"pid\" value='$project->ID' type='hidden'/>
                                                                                            <button type='submit' class='btn btn-primary'>下载应用</button>  
                                                                                            </form>
								                </div>
								            </div>							      
								        </li>
				                        ";
                                }
                            }
                            ?>
                    </div>							

                    <!--latest project-->
                    <div class="tab-pane" id="latest-project">						    
                        <ul class="thumbnails">
                            <?php
                            for ($i = 0; $i < 9; $i++) {
                                if ($i < count($newest)) {              //判断，防止项目数不足9个
                                    $code = $newest[$i];
                                    $comment = $commentNewest[$i];
                                    $pro = $code->project;

                                    $url = Yii::app()->createUrl('codeinfo/index', array(
                                        'projectid' => $pro['ID']
                                            ));

                                    echo"
				                        <li class='span3'>
								            <div class='thumbnail'>
								                <a href='$url'><img src='$pro[ProjectIconPath]' class='project-img' alt='project img' /></a>
								                <div class='caption'>
								                    <h5><a href='$url'>$pro[ProjectName]</a></h5>						              
								                    <p>下载次数：<span class='project-grade'>$code[CodeDownloadTimes]</span></p>
								                    <p>评论数：<span class='project-comments-qty'>$comment</span></p>
								                    <form id=\"download\" name=\"download\" method=\"post\" action=\"$downloadUrl\" >
                                                                                        <input name =\"type\" value=\"c\" type=\"hidden\" /> 
                                                                                        <input name=\"pid\" value='$pro->ID' type='hidden'/>
                                                                                        <button type='submit' class='btn btn-primary'>下载应用</button>  
                                                                                        </form>							           	  
								                </div>
								            </div>							      
								        </li>
				                        ";
                                }
                            }
                            ?>  
                        </ul>
                    </div>				
                </div>		
            </div>				
        </div>

    </div>
</div>