/**
 * Created by Arthur on 2016/3/7.
 */
$(document).ready(function(){
    $(".btntranssave").on("click",function(){
        var _projname=$("div.projname").html();
        var _name=$(this).attr("name");
        var _this=$(this);
        var _id=$(".transinput[name='"+_name+"']").attr("id");
        var _type="exsited";
        console.log(_name)
        console.log(_id)
        console.log(_projname)
        var _translation;
        var _translationinput=$("#"+_id).val();
        if(_translationinput==""){
            _translation=$("select[name='"+_name+"']").find("option:selected").text();

        }
        else {
            _translation=_translationinput;
            _type="new";
        }
        console.log(_translation);
        $.get("saveEvaluationItem.php",
            {
                name:_name,
                id:_id,
                projname:_projname,
                translation:_translation,
                idflag:1,
                type:_type
            },
            function(data){
                //_this.parent().html(data);
                alert(data);
            });
    })
})