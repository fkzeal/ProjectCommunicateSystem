<?php
$this->breadcrumbs = array(
    'Code Main',
);
?>


    <div id="aside">
    	<p><span>源码分类</span></p>
        <ul>
	
		<?php
			foreach($category as $item){
				echo "<li><a>$item[FirstLevel]</a></li>";
			}
                        $return = Yii::app()->createUrl('codemain/index');
                        echo "<li><a href=$return>返回</a></li>";
		?> 
            
        </ul>    
    </div>
    <div id="main-content">
	<div class="box-tag"><span>最新源码</span></div>
    	
	<div id="newcode" class="msg-box">	
	<?php
		for($i=0;$i<9;$i++){
			if($i<count($newest)){              //判断，防止项目数不足9个
				//$pro=$newest[$i];
				//$code=$pro->projectCodes;
				$code=$newest[$i];	
				$pro=$code->project;

				$url = Yii::app()->createUrl('codeinfo/index',
                            						array(
					      'projectid'=>$pro[ID]
					));
				
//				$hj=count($newest);
				echo"
				<ul class='msg-block'>
            				<li><a href='$url'><img src='$pro[ProjectIconPath]' alt='code-img' /></a></li>
                			<li><a href='$url'><span>$pro[ProjectName]</span></a></li>
                			<li><span>评分：$code[CodeScore]</span></li>
                			<li><span>下载次数:$code[CodeDownloadTimes]</span></li>
            			</ul>
				";
			}	
		}
	?>      	
        </div>

        <div class="box-tag"><span>最热门源码</span></div>
    	<div id="hotcode" class="msg-box">

	<?php
		for($i=0;$i<9;$i++){
			if($i<count($hotest)){              //判断，防止项目数不足9个
				$hotcode=$hotest[$i];
				$project=$hotcode->project;    //关联查询，project_code关联到project表
				
				$url = Yii::app()->createUrl('codeinfo/index',
                            						array('userid'=>$project[UserID],
					      'projectid'=>$hotCode[ProjectID]
					));
				echo"
				<ul class='msg-block'>
            				<li><a href='$url'><img src=\"$project->ProjectIconPath\" alt='code-img' /></a></li>
                			<li><a href='$url'><span>$project[ProjectName]</span></a></li>
                			<li><span>评分：$hotcode[CodeScore]</span></li>
                			<li><span>下载次数：$hotcode[CodeDownloadTimes]</span></li>
            			</ul>
				";
			}	
		}
	?>
        </div>    
    </div>

