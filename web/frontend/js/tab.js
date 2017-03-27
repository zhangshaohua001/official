$.fn.hc_proTabChange = function(ev){
	var ev = ev || 'click';
	var _this = $(this);
	_this.find('.team_building li').each(function(i){
		$(this)[ev](function(){
			$(this).addClass('t_current').siblings('li').removeClass('t_current');
			_this.find('.team_list').eq(i).show().siblings('.team_list').hide();
		})
	})
}
$(function(){
	$(".tab1").hc_proTabChange();
	$(".tab2").hc_proTabChange();
	$(".tab3").hc_proTabChange();
});