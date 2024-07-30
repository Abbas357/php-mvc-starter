$(function(){
   $('.accountRemoveBtn').click(function(){
      var user = $(this).data('user');
      var password = prompt("Enter your Password to Confirm");
      $.post(BASE_URL+'core/ajax/accountRemove.php', {user, password}, function(data){
         document.location.reload();
      });
   });
});