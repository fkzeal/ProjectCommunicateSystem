


<div class="row" >
    <!--aside menu-->
    <div class="span3 offset2">
        <div class="well" style="padding: 8px 0;">
            <ul class="nav nav-list" id="asidemenu">
                <li class="nav-header"><h3><?php echo '应用分类'; ?></h3></li>
                <?php
                foreach ($category as $item) {
                    $categoryUrl = Yii::app()->createUrl('detaillist/list', array(
                        'type' => 'a', 'category' => $item->FirstLevel, 'projectid' => $projectid
                            ));
                    echo "<li><a href='$categoryUrl'>$item[FirstLevel]</a></li>";
                    echo "<li class=\"divider\"></li>";
                }
                $return = Yii::app()->createUrl('appinfo/index', array('projectid' => $projectid));
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
                        <a data-toggle="tab" href="#hot-project"><span class="label label-info"><i class="icon-fire"></i> 热门应用</span></a>						  									    
                    </li>
                    <li>
                        <a data-toggle="tab" href="#latest-project"><span class="label label-info"><i class="icon-leaf"></i> 最新应用</span></a>
                    </li>						 
                </ul>
                <div class="tab-content">
                    <!--hot project-->
                    <div class="tab-pane active" id="hot-project">						    
                        <ul class="thumbnails">
                            <?php
                            $downloadUrl = Yii::app()->createUrl('site/download');
                            for ($i = 0; $i < 9; $i++) {
                                if ($i < count($hotest)) {
                                    $comment = $commentHotest[$i];
                                    $hotapp = $hotest[$i];
                                    $project = $hotapp->project;

                                    $icon = $project->ProjectIconPath;

                                    $url = Yii::app()->createUrl('appinfo/index', array
                                        ('userid' => $project['UserID'], 'projectid' => $hotapp['ProjectID']));

                                    echo"
						     	        <li class='span3'>
							     		    <div class='thumbnail'>
									     		<a href='$url'><img src='$icon'  class='project-img' alt='project img'/></a>
								 		     	<div class='caption'>
								  		     	    <h5><a href='$url'>$project[ProjectName]</a></h5>						              
										     	    <p>下载次数：<span class='project-grade'>$hotapp[AppDownloadTimes]</span></p>
										     	    <p>评论数：<span class='project-comments-qty'>$comment</span></p>
                                                                                            <form id=\"download\" name=\"download\" method=\"post\" action=\"$downloadUrl\" >
                                                                                            <input name =\"type\" value=\"a\" type=\"hidden\" /> 
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
                        </ul>
                    </div>
                    <!--latest project-->
                    <div class="tab-pane" id="latest-project">						    
                        <ul class="thumbnails">
                            <?php
                            for ($i = 0; $i < 9; $i++) {
                                if ($i < count($newest)) {

                                    $comment = $commentNewest[$i];
                                    $app = $newest[$i];
                                    $pro = $app->project;

                                    $icon = $pro->ProjectIconPath;

                                    $url = Yii::app()->createUrl('appinfo/index', array
                                        ('userid' => $pro['UserID'], 'projectid' => $pro['ID']));


                                    echo"
				                            <li class='span3'>
								                <div class='thumbnail'>
								                    <a href='$url'><img src='$icon'  class='project-img' alt='project img' /></a>
								                    <div class='caption'>
								                        <h5><a href='$url'>$pro[ProjectName]</a></h5>						              
								                        <p>下载次数：<span class='project-grade'>$app[AppDownloadTimes]</span></p>
								                        <p>评论数：<span class='project-comments-qty'>$comment</span></p>
                                                                                        
                                                                                        <form id=\"download\" name=\"download\" method=\"post\" action=\"$downloadUrl\" >
                                                                                        <input name =\"type\" value=\"a\" type=\"hidden\" /> 
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