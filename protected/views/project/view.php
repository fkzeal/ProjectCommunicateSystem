

<div class="row" >
    <!--aside menu-->
    <div class="span3 offset2">
        <div class="well" style="padding: 8px 0;">
            <ul class="nav nav-list" id="asidemenu">
                <li class="nav-header">
                <li class="nav-center">
                    <ul class="thumbnails">
                        <li class="span2">
                            <div class="thumbnail">
                                <img src="MyAppFiles/head.jpg" alt="">
                            </div>
                        </li>
                    </ul>
                </li>
                </li>
                
                <li class="divider"></li>
                <li class="divider"></li>
                <li class="">
                    用户名： <?php echo $user['UserName'] ?>
                </li>
                <li class="divider"></li>
                <li>
                    积分：<?php echo $user['DistributionScore'] ?>
                </li>
                <li class="divider"></li>
                <li>
                    上传资源：<?php echo count($project_passed) + count($project_verifing) ?>
                </li>
                <li class=""></li>
                <li class="divider"></li>
                <li class="divider"></li>
            </ul>
        </div>
    </div>
    <div class="span10" id="main-content">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#passed-project">
                    <span class="label label-info">
                        <i class="icon-tag"></i>已审核项目
                    </span>
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#passed-to-be">
                    <span class="label label-info">
                        <i class="icon-tag"></i>未审核项目
                    </span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <!--detail-->
            <div class="tab-pane active" id="passed-project">
                <?php
                foreach ($project_passed as $item) {

                    $app_url = Yii::app()->createUrl('appinfo/index', array(
                        'projectid' => $item['ID']
                            ));

                    $code_url = Yii::app()->createUrl('codeinfo/index', array(
                        'projectid' => $item['ID']
                            ));

                    $app = $item->projectApps;
                    $code = $item->projectCodes;
                    $html = "<ul class='app-block'>
								<li>
									<img src='$item->ProjectIconPath' alt='code-img' />
								</li>
								<li class='app-item-name page-header'>
									<span>重力感应系统</span>
								</li>
								<li>
									<p>$item->ProjectDescription</p>
								</li>
								<li class='app-item-grade'>
									APP热度：<span>$app->AppDownloadTimes</span>
								</li>
								<li class='app-item-comments'>
									Code热度：<span>$code->CodeDownloadTimes</span>
								</li>
								<li class='btn-group-location' style='margin-top: 30px;'>
									<div class='btn-group'>
									<a class='btn btn-primary' href='$app_url'>APP详情</a>;
									<a class='btn btn-primary' href='$code_url'>Code详情</a>";

                    if (Yii::app()->user->getState('id') == $user['ID']) {
                        $html .= "
									<a class='btn btn-primary' href='#'>修改</a>
									<a class='btn btn-primary' href='#'>删除</a> ";
                    }

                    $html .= "
									</div>
								</li>
							</ul>
							";
                    echo $html;
                }
                ?>

            </div>
            <div class="tab-pane" id="passed-to-be">
<?php
foreach ($project_verifing as $item) {

    $app_url = Yii::app()->createUrl('appinfo/index', array(
        'projectid' => $item['ID']
            ));

    $code_url = Yii::app()->createUrl('codeinfo/index', array(
        'projectid' => $item['ID']
            ));

    $app = $item->projectApps;
    $code = $item->projectCodes;

    $html = "<ul class='app-block'>
								<li>
									<img src='$item->ProjectIconPath' alt='code-img' />
								</li>
								<li class='app-item-name page-header'>
									<span>重力感应系统</span>
								</li>
								<li>
									<p>$item->ProjectDescription</p>
								</li>
								<li class='app-item-grade'>
									APP热度：<span>$app->AppDownloadTimes</span>
								</li>
								<li class='app-item-comments'>
									Code热度：<span>$code->CodeDownloadTimes</span>
								</li>
								<li class='btn-group-location' style='margin-top: 30px;'>
									<div class='btn-group'>
									<a class='btn btn-primary' href='$app_url'>APP详情</a>;
									<a class='btn btn-primary' href='$code_url'>Code详情</a>";

    if (Yii::app()->user->getState('id') == $user['ID']) {
        $html .= "
									<a class='btn btn-primary' href='#'>修改</a>
									<a class='btn btn-primary' href='#'>删除</a> ";
    }

    $html .= "
									</div>
								</li>
							</ul>
							";
    echo $html;
}
?>
            </div>

        </div>
    </div>
</div>
<hr>

