// JavaScript Document
var n=1, slider, x=0,y=0;
$(document).ready(function(e) {
		$('.div-tab').hover(
			function() {
				$(this).find('.div-tab').fadeIn(500);
			},
			function() {
				$(this).find('.div-tab').fadeOut(500);
		});
		
		$('.tab-container li ').hover(
			function() {
				$(this).find('.sub-menu').stop().slideDown(500);
			},
			function() {
				$(this).find('.sub-menu').stop().slideUp(500);
		});
		
		$(".tab-1 > a").hover(function(e){
			if($(this).hasClass("active")){
				$(this).removeClass("active");
			} else {
				$(this).addClass("active");
			}
		},function(e){
			if($(this).hasClass("active")){
				$(this).removeClass("active");
			} else {
				$(this).addClass("active");
			}
		});
		
});
