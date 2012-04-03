// JavaScript Document
$(function(){
	$(".dropdown-toggle").dropdown();
	$(".carousel").carousel({interval: 3000});
	$(".collapse").collapse()
	$("a[rel=tooltip],button[rel=tooltip]").tooltip();
	$("#asidemenu li").hover(function() {
		$(this).addClass('active');
	}, function() {
		$(this).removeClass('active');
	});
	
})
