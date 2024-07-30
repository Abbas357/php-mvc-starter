$(function(){
	$('.follow-btn').click(function(){
		var followID = $(this).data('follow');
		var profile = $(this).data('profile');
		$button = $(this);

		if($button.hasClass('following-btn')){
			//Then send ajax request to unfollow the user
			$.post(BASE_URL+'core/ajax/follow.php', {unfollow:followID,profile: profile},function(data){
				$button.removeClass('following-btn');
				$button.removeClass('unfollow-btn');
				$button.html('<i class="fa fa-user-plus"></i>Follow');
				$('body').load(document.URL);
			});
		}else{
			//Then send ajax request to follow the user
			$.post(BASE_URL+'core/ajax/follow.php', {follow:followID,profile: profile},function(data){
				$button.removeClass('follow-btn');
				$button.addClass('following-btn');
				$button.text('Following')
				$('body').load(document.URL);
			});
		}
	});

	$('.follow-btn').hover(function(){
		$button = $(this);

		if($button.hasClass('following-btn')){
			$button.addClass('unfollow-btn');
			$button.text('Unfollow');
		}
	}, function(){
		if($button.hasClass('following-btn')){
			$button.removeClass('unfollow-btn');
			$button.text('Following');
		} 
	});
});