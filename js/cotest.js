
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
          $(".proper-tab").on("click",function(){
        var target_panel=$(this).attr("target");
        var tabs=$(this).parents(".pro-nav").find(".proper-tab");
        for(var i=0;i<tabs.length;i++){
            var panel= $(tabs[i]).attr("target");
            $(panel).css("display","none");
            $(tabs[i]).attr("class","proper-tab");
        }
        $(target_panel).css("display","block");
        $(this).attr("class","proper-tab active");
    })
   })

   function getPar(par){
        //获取当前URL
        var local_url = document.location.href; 
        console.log(local_url)
        //获取要取得的get参数位置
        var get = local_url.indexOf(par +"=");
        if(get == -1){
            return false;   
        }   
        //截取字符串
        var get_par = local_url.slice(par.length + get + 1);    
        //判断截取后的字符串是否还有其他get参数
        var nextPar = get_par.indexOf("&");
        if(nextPar != -1){
            get_par = get_par.slice(0, nextPar);
        }
       
        get_par=get_par.replace(/%22/g,"'");
        get_par=get_par.replace(/%20/g," ");
        return eval("("+get_par+")");
    }

    