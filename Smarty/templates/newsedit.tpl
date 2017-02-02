<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>编辑文章</title>
    <link rel="stylesheet" href="./editor/themes/default/default.css" />
    <link rel="stylesheet" href="./editor/plugins/code/prettify.css" />
    <script charset="utf-8" src="./editor/kindeditor-all.js"></script>
    <script charset="utf-8" src="./editor/lang/zh-CN.js"></script>
    <script charset="utf-8" src="./editor/plugins/code/prettify.js"></script>
    <script>
        KindEditor.ready(function(K) {
            var editor1 = K.create('textarea[name="content1"]', {
                items:["undo", "redo", "|", "preview", "print", "template", "cut", "copy", "paste", "plainpaste", "wordpaste","|", "justifyleft", "justifycenter", "justifyright", "justifyfull", "insertorderedlist", "insertunorderedlist", "indent", "outdent", "subscript", "superscript", "clearhtml", "quickformat", "selectall", "|", "fullscreen", "/", "formatblock", "fontname", "fontsize", "|", "forecolor", "hilitecolor", "bold", "italic", "underline", "strikethrough", "lineheight", "removeformat", "|", "image", "flash", "media", "table", "hr",  "pagebreak", "anchor", "link", "unlink"],
                cssPath : './editor/plugins/code/prettify.css',
                uploadJson : './editor/php/upload_json.php',
                fileManagerJson : './editor/php/file_manager_json.php',
                allowFileManager : true,
                afterCreate : function() {
                    var self = this;
                    K.ctrl(document, 13, function() {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                    K.ctrl(self.edit.doc, 13, function() {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                }
            });
            prettyPrint();
        });
        function checkValue(){
            var  myselect=document.getElementById("catesel")
            var index=myselect.selectedIndex ;
            if (myselect.options[index].text=="cotestreport"){
                document.getElementById("productsel").disabled=true
            }else{
                document.getElementById("productsel").disabled=false
            }
        }
    </script>
</head>
<body>

<form name="example" method="post" action="./newssave.php" >
    <input type="hidden" name="txtid" value='<{$textid}>'>
    <p style="padding:12px 4px 2px 4px; color:#999; font-weight:bold; border-bottom:solid 1px #f5f5f5; clear:both;">文章标题</p>
    <select id="catesel" name="category" style="float:left; padding:2px; height:24px; margin-right:2px;" onchange="checkValue()">
        <{foreach from=$category item=opt}>
        <option value="<{$opt}>"><{$opt}></option>
        <{/foreach}>
    </select>
    <select id="productsel"  name="product" style="float:left; padding:2px; height:24px; margin-right:2px;">
        <{foreach from=$product item=opt}>
        <option value="<{$opt}>"><{$opt}></option>
        <{/foreach}>
    </select>
    <input type="text" id="txtTitle" name="txtTitle" style="width:560px; height:25px; float:left;" maxlength="100" value="<{$title}>"/>
    <br />
    <p style="padding:12px 4px 2px 4px; color:#999; font-weight:bold; border-bottom:solid 1px #f5f5f5; clear:both;">文章内容</p>
    <textarea name="content1" style="width:700px;height:200px;visibility:hidden;"><{$content}></textarea>
    <br />
    <input type="submit" name="button" value="提交内容" /> (提交快捷键: Ctrl + Enter)
</form>
<script>
    document.getElementById("productsel")[<{$productselectedNum}>].selected=true;

</script>
</body>
</html>