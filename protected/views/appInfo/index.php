

<div class="row" >
    <!--aside menu-->
    <div class="span3 offset2">
        <div class="well" style="padding: 8px 0;">
            <ul class="nav nav-list" id="asidemenu">
                <li class="nav-header"><h3>应用分类</h3></li>

                <?php
                foreach ($categoryInfo as $item) {
                    $categoryUrl = Yii::app()->createUrl('detaillist/list', array(
                        'type' => 'a', 'category' => $item[FirstLevel], 'projectid' => $projectid
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
            <div class="span4 ">
                <ul class="thumbnails">
                    <li class="span3 offset1">
                        <div class="thumbnail detail-thumbnail">
                            <img src="<?php echo $project['ProjectIconPath']; ?>" id="code-img" alt="">				      
                        </div>
                    </li>				  
                </ul>
            </div>
            <div class="span5 detail-preview">
                <h3 class="page-header" id="item-name"><?php echo $project['ProjectName']; ?></h3>
                <ul class="detail-preview-list">
<!--                        <li>评分：<span id="item-grade"><?php echo $project->projectApps['AppScore']; ?></span></li>-->
                    <li>评论数：<span id="item-comment-qty">
                            <?php
                            echo $count;
                            ?></span></li>
                    <li>项目大小：<span >12.5</span>M</li>
                    <li>上传日期：<span><?php echo $project->ProjectCreatedTime; ?></span></li>
                    <li>上传者：<span >
                            <?php
                            $uploadUser = $project->user['NickName'];
                            $userName = $project->user['UserName'];
                            if (empty($uploadUser)) {
                                $uploadUser = $userName;
                                echo $uploadUser;
                            } else {
                                echo $uploadUser . '(' . $userName . ')';
                            }
                            ?>
                        </span></li>
                    <li>资源类别：<span>
                            <?php
                            echo $category->category['FirstLevel'];
                            if (isset($category->category['SecondLevel'])) {
                                echo " " . $category->category['SecondLevel'];    //显示FirstLevel  SecondLevel，之间加个空格
                            }
                            ?>
                        </span></li>
                    <li>下载次数：<span><?php echo $project->projectApps['AppDownloadTimes']; ?>次</span></li>
                    <!--    <li>浏览次数：<span>42</span></li>   -->
                    <li>标签：
                        <?php
                        foreach ($tag as $value) {
                            echo ' <p class="code-tagcontent">';
                            echo $value->tag['TagContent'];
                            echo '</p>';
                        }
                        ?>
                    </li>

                </ul>
                <hr>
                <?php $downloadUrl = Yii::app()->createUrl('site/download') ?>
                <form id="download" name="download" method="post" action="<?php echo $downloadUrl; ?>" >
                    <input name ="type" value="a" type="hidden" /> 
                    <input name="pid" value='<?php echo $project->ID; ?>' type="hidden"/>
                    <button type="submit" class="btn btn-primary">下载应用</button>  
                </form>
                <!--                                <a href="" type="submit" class="btn btn-primary">下载源码</a> -->
            </div>	

        </div>
        <br/>

        <!--details--->
        <div class="row">
            <div class="span10" id="main-content">						
                <div class="row">
                    <div class="span10">

                        <ul class="nav nav-tabs">									
                            <li>
                                <a data-toggle="tab" href="#tab-project-detail"><span class="label label-info"><i class="icon-list-alt"></i>项目简介</span></a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#tab-comment"><span class="label label-info"><i class="icon-comment"></i>项目评论</span></a>
                            </li>						        							 
                        </ul>
                        <div class="tab-content">
                            <!--tab project detail-->
                            <div class="tab-pane active" id="tab-project-detail">
                                <div id="project" class="code-detail-box">
                                    <p>
                                        <?php
                                        echo $project->ProjectDescription;
                                        ?>
                                    </p>
                                </div> 										
                            </div>
                            <!--tab code detail-->
                            <!--                            <div class="tab-pane" id="tab-code-detail">
                                                            <div id="code-detail" class="code-detail-box">
                                                                <p>
                            <?php
//                                        echo $project->projectCodes['CodeDescription'];
                            ?>
                                                                </p>
                                                            </div>
                                                        </div>-->

                            <!--tab code preview-->
                            <!--                            <div class="tab-pane" id="tab-code-preview">
                                                            <div id="code-preview" class="code-detail-box">
                                                                <code>
                                                                    <pre>
                            <?php echo $project->projectCodes['CodeFragment']; ?>
                                                                    </pre>
                                                                </code>
                                                            </div>
                                                        </div>-->
                            <!--tab code detail-->
                            <div class="tab-pane" id="tab-comment">
                                <div id="comment-box">

                                    <?php
                                    foreach ($comment as $key => $value) {
                                        $user = $value->user;
                                        echo "<div class=\"comment-block\">";
                                        echo "<p class=\"commenter-name\">$user[NickName]" . "(" . $user[UserName] . ")</p>";
                                        echo "<p class=\"comment-content\">$value[Content]</p>";
                                        echo "</div>";
                                    }
                                    ?>						                           
                                </div>

                                <div id="makecomments">
                                    <form id="code-comment" action="<?php echo yii::app()->createUrl('codeinfo/comment'); ?>" 
                                          name="code-comment" method="post" class="well">
                                        <input value ="<?php echo $userid ?>" type ="hidden" name ="userid"/>
                                        <input value ="<?php echo $projectid ?>" type ="hidden" name ="projectid"/>
                                        <input value ="a" type ="hidden" name ="flag"/>
                                        <fieldset>
                                            <legend>我来评论</legend>
                                            <div class="control-group docs-input-sizes">
                                                <div class="controls">
                                                    <textarea name="textarea" rows="10" cols="150" class="span8"></textarea>											                
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                                <?php
                                                echo CHtml::submitButton('提交评论', array(
                                                    'id' => 'submit-comment', 'class' => 'btn btn-primary'));
                                                ?>
                                                <button type="reset" class="btn">重新评论</button>

                                            </div>


                                        </fieldset>	
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>		    	
        </div>		    
    </div>
</div>

