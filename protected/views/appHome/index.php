<?php
$this->breadcrumbs=array(
	'App Home'=>array('/appHome'),
	'AppHome',
);?>

<!-- code after this is valide-->
<div id="aside">
			<p>
				<span>应用分类</span>
			</p>
			<ul>
				<?php
				foreach($category as $item){
				echo "<li><a>$item[FirstLevel]</a></li>";
			    }
		        ?> 
			</ul>
		</div>
		<div id="main-content">
			<div class="box-tag">
				<span>最新应用</span>
			</div>
			<div id="newApp" class="msg-box">
				<?php
		    for($i=0;$i<9;$i++){
			  if($i<count($newest)){
				$pro=$newest[$i];
				$app=$pro->projectApps;
				$prouser = $pro->user;
				$url=Yii::app()->createUrl('appinfo/index',array
				('userid'=>$pro['UserID'],'projectid'=>$pro['ID']));

				echo"
				<ul class='msg-block'>
            				<li><a href='$url'><img src='$pro->ProjectIconPath' alt='app-img' /></a><li>
                			<li><a href='$url'><span>$pro[ProjectName]</span></a><li>
                			<li><span>评分：$app[AppScore]</span><li>
                			<li><span>上传者：$prouser->UserName</span><li>
            			</ul>
				";
			}	
		}
	?>   
			</div>
			<div class="box-tag">
				<span>最热门应用</span>
			</div>
			<div id="hotApp" class="msg-box">
				<?php
		    for($i=0;$i<9;$i++){
			  if($i<count($hotest)){
				$hotapp=$hotest[$i];
				$project=$hotapp->project; 
				
				$url = Yii::app()->createUrl('appinfo/index',array
				('userid'=>$project['UserID'],'projectid'=>$hotapp['ProjectID']));
				
				echo"
				<ul class='msg-block'>
            				<li><a href=''><img src='' alt='app-img' /></a><li>
                			<li><a href=''><span>$project[ProjectName]</span></a><li>
                			<li><span>评分：$hotapp[AppScore]</span><li>
                			<li><span>下载次数：$hotapp[AppDownloadTimes]</span><li>
            			</ul>
				";
			}	
		}
	?>
			</div>
		</div>
	</body>
</html>
