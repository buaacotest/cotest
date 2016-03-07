/**
 * Created by Arthur on 2016/3/7.
 */
$(document).ready(function(){
    $(".btntranssave").on("click",function(){
        var _name=$(this).attr("name");
        var _this=$(this);
        var _id=$(".transinput[name='"+_name+"']").attr("id");
        console.log(_name)
        console.log(_id)

        $.get("saveEvaluationItem.php",
            {
                name:_name,
                id:_id
            },
            function(data){
                //_this.parent().html(data);
                alert(data);
            });
    })
})