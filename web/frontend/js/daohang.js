$(function(){
			$(document).ready(function() {
				//debugger;
				var tabs = $('.navbar > li');
				var cons = $('.navbar > li .nav_ins');
				tabs.first().removeClass("now").show(); //默认第一个显示
				//cons.first().show().nextAll().hide();默认第一个显示，其他隐藏
				tabs = tabs.first().nextAll();
				tabs.each(function(index) {
					$(this).mouseenter(function() {
						$(this).toggleClass("now").siblings().removeClass("now");
					});
					$(this).mouseleave(function() {
						$(this).toggleClass("now").siblings().removeClass("now");
					});
				});
			});

})
	