
   $(document).ready(function(){
      $(".checkbox").on("click",function(){
        if($(this).hasClass("active")){
          $(this).removeClass("active")
          $(this).css("background","none")
          $(this).attr("checked",null)
        }else{
          $(this).addClass("active")
          $(this).css("background","url(img/check.png)")
          $(this).attr("checked","checked")
        }
      })
      $(".logout-btn").on("click",function  () {
        // body...
        $.get("logout.php",function(){
            location.reload();
        });
      })
     
    })
    