$(function(){
   $('.report-btn').click(function(){
      var profileId = $(this).data('profile');
      $.post(BASE_URL+'core/ajax/report.php', {profileId}, function(data){
         $(this).css('background-color', '#575757');
         $('.reportProfile').css('position', 'absolute');
         $('.reportProfile').css('top', '30%');
         $('.reportProfile').css('left', '40%');
         $('.reportProfile').css('display', 'block');
         $('.reportProfile').css('transition', 'all 0.5s ease');
         $('.reportProfile').html(data);
      });
   });
});