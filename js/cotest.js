
   $(document).ready(function(){
      $(".checkbox").on("click",function(){
        if($(this).hasClass("active")){
          $(this).removeClass("active")
          $(this).css("background","none")
        }else{
          $(this).addClass("active")
          $(this).css("background","url(img/check.png)")
        }
      })
     
    })
    