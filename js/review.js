$(document).ready(function(){
    //hide evaluations at first
    var tab_panels=$(".pro-nav");
    console.log(tab_panels);
    for(var i=0;i<tab_panels.length;i++){
        var tabs=$(tab_panels[i]).find(".proper-tab");
        for(var j=0;j<tabs.length;j++){
            var panel= $(tabs[j]).attr("target");
            $(panel).css("display","none");
            $(tabs[j]).attr("class","proper-tab");
        }
         var target_panel=$(tabs[0]).attr("target");
          $(target_panel).css("display","block");
         $(tabs[0]).attr("class","proper-tab active");

    }
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