$(function(){
	var win = $(window);
	var offset = 10;

	win.scroll(function(){
		if($(document).height() <= (win.height() + win.scrollTop())){
			offset += 10;
			$('#loader').show();
			$.post(BASE_URL+'core/ajax/fetchPosts.php', {fetchPosts: offset}, function(data){
				$('.posts').html(data);
				$('#loader').hide();
			});
		}
	});
});