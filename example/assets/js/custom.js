function addFilter(blur = 5, brightness = 0){
   document.querySelector('.in-wrapper').style.filter = `blur(${blur}px) grayscale(${brightness}%)`;
   document.querySelector('.profile-cover-wrap').style.filter = `blur(${blur}px) grayscale(${brightness}%)`;
}

function removeFilter(){
   document.querySelector('.in-wrapper').style.filter = "";
   document.querySelector('.profile-cover-wrap').style.filter = "";
}

$(document).ready(function(){
   $("#search-box").on('focus', function(){
      addFilter(7);
   });
   $("#search-box").on('blur', function(){
      removeFilter();
   });

   $('.hover input[type="checkbox"]').click(function(){
      if($(this).prop("checked") == true){
         addFilter(7);
      }
      else if($(this).prop("checked") == false){
         removeFilter();
      }
  });

  var box = document.querySelector(".post-wrap");
  $(".status").on('focus', function(){
     document.querySelector(".header-wrapper").style.filter = "blur(7px)";
     document.querySelector(".in-left").style.filter = "blur(7px)";
     document.querySelector(".in-right").style.filter = "blur(7px)";
     document.querySelector(".posts").style.filter = "blur(7px)";
     document.querySelector(".post-body textarea").style.border = "1px solid var(--success)";
     box.style.border = "1px solid #B3DAB9";
     box.style.zIndex = "9999";
     box.style.boxShadow = "30px 40px 40px #ccc";
     box.style.transition = "all 0.2s ease";
  });
  $(".status").on('blur', function(){
     document.querySelector(".header-wrapper").style.filter = "";
     document.querySelector(".in-left").style.filter = "";
     document.querySelector(".in-right").style.filter = "";
     document.querySelector(".posts").style.filter = "";
     document.querySelector(".post-body textarea").style.border = "1px solid #ccc";
     box.style.border = "1px solid #ccc";
     box.style.boxShadow = "0px 0px 0px #ccc";
  });
  
});
