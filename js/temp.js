/**
 * Created by master on 2016/1/23.
 */
$(document).ready(function(){
    $("#lang").change(function(){
        var txt=$("#lang").val();
        //alert(txt);
        $.post("index.php",{lang:txt},function(result){
            $("#xianshi").html(result);
        })
    });
});