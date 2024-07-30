$(function(){

	$(document).on('click', '.deletePost', function(){
		var post_id = $(this).data('post');
		$.post(BASE_URL+'core/ajax/deletePost.php', {showPopup: post_id}, function(data){
			$('.popupPost').html(data);
			$('.close-share-popup, .cancel-it').click(function(){
				$('.share-popup').hide();
			});
			

			$(document).on('click', '.delete-it', function(){
				$.post(BASE_URL+'core/ajax/deletePost.php', {deletePost: post_id}, function(){
					$('.share-popup').hide();
					location.reload();
				});
			});


		});
	});


	$(document).on('click', '.deleteComment', function(){
		var commentID = $(this).data('comment');
		var post_id = $(this).data('post');

		$.post(BASE_URL+'core/ajax/ajax/deleteComment.php', {deleteComment: commentID}, function(){
			$.post(BASE_URL+'core/ajax/popupposts.php', {showpopup: post_id},function(data){
	   			$('.popupPost').html(data);
	   			$('.post-show-popup-box-cut').click(function(){
	   				$('.post-show-popup-wrap').hide();
	   			});
	   		});
		});
	});
});