$(function(){
	$(document).on('click', '.share', function(){
		$post_id = $(this).data('post');
		$user_id = $(this).data('user');
		$counter = $(this).find('.sharesCount');
		$count = $counter.text();
		$button = $(this);

		$.post(BASE_URL+'core/ajax/share.php', {showPopup:$post_id, user_id:$user_id}, function(data){
			$('.popupPost').html(data);
			$('.close-share-popup').click(function(){
				$('.share-popup').hide();
			});
		});
	});

	$(document).on('click', '.share-it', function(){
		var comment = $('.shareMsg').val();
		$.post(BASE_URL+'core/ajax/share.php', {share: $post_id, user_id: $user_id, comment:comment}, function(){
			$('.share-popup').hide();
			$count++;
			$counter.text($count);
			$button.removeClass('share').addClass('Share');
		});
	});
});