$(document).ready(function(){
    $(".proper-tab").on("click",function(){
        var target_panel=$(this).attr("target");
        $(".proper-panel").css("display","none");
        $(target_panel).css("display","block");
        $(".proper-tab").attr("class","proper-tab");
        $(this).attr("class","proper-tab active");
    })
    $(".proper-title").on("click",function(){
        if($(this).attr("toggle")=='1'){
            $(this).parents(".proper-block").find(".proper-item").css("display","none");
            $(this).attr("toggle",'0');
        }
        else if($(this).attr("toggle")=='0'){
            $(this).parents(".proper-block").find(".proper-item").css("display","block");
            $(this).attr("toggle",'1');
        }

    })
})