///**
// * @author lgrcyanny
// */
//$(document).ready(function(){	
//	
//	//alert("hi");
//	$('#aside a').click(loadCategory);
//	
//});
//function loadCategory()
//{
//	var category=$(this).text();	
//	var HTML_head='<div class="box-tag"><span>'+category+'</span></div><div id="category-detail" class="msg-box">';
//	var HTML_categoryitem='<ul class="category-block"><li><img src="" alt="code-img" /></li><li class="category-item-name"><span>代码名称</span></li><li><p>描述描述描述描述描述这份代码这份代码描述描述描述描述描述描述描述描述这份代码这份代码描述描述描述描述描述描述描述描述这份代码这份代码描述描述描述描述描述描述描述描述这份代码这份代码描述描述描述</p></li><li class="category-item-grade"><span>评分：5</span></li><li class="category-item-comments"><span>评论数：10</span></li><button class="btn">下 载</button></ul>';
//	var HTML_tail='</div>';
//	var newHTML=HTML_head;
//	$('#main-content').html(newHTML+HTML_categoryitem);
//	 for(var i=0;i<7;i++)
//	 {
//		 $('#category-detail').append(HTML_categoryitem);
//	 }	
//	$('#main-content').append('</div>');
//	$('button').button();	
//	return false;			
//}

/**
 * @author lgrcyanny
 */
$(document).ready(function(){
	$("#aside a").click(function(){
		var url="http://localhost/~evaslee/SEProjectManagement/index.php?r=codemain/view&cate=";
		var ca=$(this).text();
		url=url.concat(ca);
		
		//,{async:false}
		$.get(url,function(data){
			$('#main-content').html(data);
//            alert(data);
		});
	});
});
