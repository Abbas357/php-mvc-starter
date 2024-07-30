$(function(){
$('.block-btn').click(function(){
   var btn = $(this);
   var profileID = btn.data('profile');
   if(btn.hasClass('blocked')) {
      // To unblock the user
      $.post(BASE_URL+'core/ajax/block.php', {unBlock:profileID}, function(){
         btn.removeClass('blocked');
         btn.html('<i class="fa fa-block"></i>Block');
         $('body').load(document.URL);
      });
   }else {
      // To Block the user
      $.post(BASE_URL+'core/ajax/block.php', {block:profileID}, function(){				          btn.removeClass('block-btn');
         btn.addClass('blocked');
         btn.text('Blocked');
         $('body').load(document.URL);
      });
   }
});

$('.block-btn').hover(function(){
	btn = $(this);
	if(btn.hasClass('blocked')){
		btn.addClass('not-blocked');
		btn.text('Unblock');
	}
	}, function(){
      btn = $(this);
		if(btn.hasClass('blocked')){
			btn.removeClass('not-blocked');
			btn.text('Blocked');
		} 
	});
});

