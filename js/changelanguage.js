/**
 * Created by Arthur on 2016/4/10.
 */
function  changelanguage(para){
    $.get("language.php",
        {
            language:para
        },
        function(data,status){
            if(status=="success")
                console.log(status+data)
                location.reload()
        });
}
