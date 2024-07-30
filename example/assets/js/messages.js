$(function(){
	$(document).on('click', '#messagePopup', function(){
		var getMessages = 1;
		$.post(BASE_URL+'core/ajax/messages.php', {showMessage: getMessages}, function(data){
			$('.popupPost').html(data);
			//Notification
			$('#message').hide();
		});
	});

	$(document).on('click', '.people-message', function(){
		var get_id = $(this).data('user');
		$.post(BASE_URL+'core/ajax/messages.php', {showChatPopup:get_id}, function(data){
			$('.popupPost').html(data);
			if(autoscroll){
				scrolldown();
			}
			$('#chat').on('scroll', function(){
				if($(this).scrollTop() < this.scrollHeight - $(this).height()){
					autoscroll = false;
				}else{
					autoscroll = true;
				}
			});
			$('.close-msgPopup').click(function(){
				clearInterval(timer);
			});
		});
		getMessages = function(){
			$.post(BASE_URL+'core/ajax/messages.php', {showChatMessage:get_id}, function(data){
				$('.main-msg-inner').html(data);
				if(autoscroll){
					scrolldown();
				}
				$('#chat').on('scroll', function(){
					if($(this).scrollTop() < this.scrollHeight - $(this).height()){
						autoscroll = false;
					}else{
						autoscroll = true;
					}
				});
				$('.close-msgPopup').click(function(){
					clearInterval(timer);
				});
			});
		}

		var timer = setInterval(getMessages, 1000);
		getMessages();

		var autoscroll = true;
		scrolldown = function(){
			$('#chat').scrollTop($('#chat')[0].scrollHeight);
		}

			$(document).on('click', '.back-messages', function(){
			var getMessages = 1;
			$.post(BASE_URL+'core/ajax/messages.php', {showMessage: getMessages}, function(data){
				$('.popupPost').html(data);
				clearInterval(timer);
			});
		});

		$(document).on('click', '.deleteMsg', function(){
			var messageID = $(this).data('message');
			$('.message-del-inner').height('120px');
			$(document).on('click', '.cancel',  function(){
				$('.message-del-inner ').height('0px');
			});

			$(document).on('click', '.delete',  function(){
				$.post(BASE_URL+'core/ajax/messages.php', {deleteMsg: messageID}, function(data){
					$('.message-del-inner ').height('0px');
					getMessages();
				});
				
			});

		});

	});
});