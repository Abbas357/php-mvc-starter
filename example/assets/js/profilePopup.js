$(function(){
   $('.profile-popup').on('mouseover', function(e){
      var profileId = $(this).data('popup');
      var left = e.pageX-10;
      var top = e.pageY+15;
      $.post(BASE_URL+'core/ajax/profilePopup.php', {profilePopup: profileId}, function(data){
         $('.popupProfile').css({
            'position': 'absolute',
            'left': left,
            'top': top,
            'display': 'block',
            'transition': 'all 0.5s ease'
         });
         $('.popupProfile').html(data);         
       });
   });
   $('.profile-popup').on('mouseout', function(){
      $('.popupProfile').hide();
   });
});
