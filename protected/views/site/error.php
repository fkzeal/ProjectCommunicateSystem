<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$contactUrl = Yii::app()->createUrl('site/contact');
//$this->breadcrumbs=array(
//	'Error',
//);
?>
<div class="row" >		
		<!--main content-->	
			<div class="span7 offset5 ">
				<div class="alert alert-block alert-error fade in">					            
					  <h3 class="alert-heading">出错了，抱歉对您的使用造成不便!
                                              <span class="badge badge-error">Error:<?php echo $code; ?></span></h3>
					  <h4 class="">可能是以下原因：</h4>
					  <p><?php echo CHtml::encode($message); ?></p>
					  <p>您操作有误，返回重新操作</p>
                                          <p>如有需要请与管理员联系，或<a href="<?php echo $contactUrl;?>">联系我们</a></p>					            
					  <p>
                                              <a class="btn" href="<?php echo Yii::app()->homeUrl;?>">返回主页</a> 
					  </p>
				</div>					
			</div>
				
	</div>
<!--<h2>出错了。。。。。</h2>-->
<!--<h3>Error:<?php echo $code; ?></h3> 

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>-->