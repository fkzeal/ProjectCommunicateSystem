<?php $this->beginContent('//layouts/side'); ?>

<!--aside menu-->
        <div class="span3 offset2">
            <div class="well" style="padding: 8px 0;">
                <ul class="nav nav-list" id="asidemenu">
                    <li class="nav-header"><h3>项目分类</h3></li>

                    <?php
                    foreach ($categoryInfo as $item) {
                        echo "<li><a href=\"#\">$item[FirstLevel]</a></li>";
                        echo "<li class=\"divider\"></li>";
                    }
                    $return = Yii::app()->createUrl('codeinfo/index', array('projectid' => $projectid));
                    echo "<li><a href=$return>返回</a></li>";
                    ?>

                </ul>
            </div>			
        </div>	
	<?php echo $content; ?>

<?php $this->endContent(); ?>