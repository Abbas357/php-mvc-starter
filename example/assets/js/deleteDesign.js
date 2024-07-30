$(function(){
   $('.defaultBtn').click(function(){
      var userId = $(this).data('user');
      if(confirm("Are you sure to revert to the default Design")){
         $.post(BASE_URL+'core/ajax/deleteDesign.php', {userId}, function(){
            $('body').css('background', '#E5E5E5');
            $('body').load(document.URL);
         });
      }
      
   });
});