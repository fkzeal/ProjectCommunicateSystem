// JavaScript Document
$(function(){
	$(".dropdown-toggle").dropdown();
	$(".carousel").carousel({interval: 3000});
	$(".collapse").collapse()
	$("a[rel=tooltip],button[rel=tooltip]").tooltip();
	// $("#asidemenu li").hover(function() {
		// $(this).addClass('active');
	// }, function() {
		// $(this).removeClass('active');
	// });
	
	$("#menu li a").click(function() {
		$("#menu li a[class*='nav-menu-active']").removeClass('nav-menu-active');
		$(this).addClass('nav-menu-active');
	 });
	$("#asidemenu li").click(function() {
		$("#asidemenu li[class*='active']").removeClass('active');
		$(this).addClass('active');
	 });
		
})
