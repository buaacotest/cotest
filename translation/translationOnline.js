/**
 * Created by Arthur on 2016/3/6.
 */
    $(document).ready(function(){
        $(".btnchange").on("click",function(){
            var value=$(this).attr("name");
            var _this=$(this);
            console.log(value)
            $.get("translationOnline.php",
                {
                    name:value
                },
                function(data){
                    _this.parent().html(data);
                });
        })
    })
