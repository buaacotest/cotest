<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>编辑文章</title>
    <link rel="stylesheet" href="../../cms/editor/themes/default/default.css" />
    <link rel="stylesheet" href="../../cms/editor/plugins/code/prettify.css" />
    <script charset="utf-8" src="../../cms/editor/kindeditor-all.js"></script>
    <script charset="utf-8" src="../../cms/editor/lang/zh-CN.js"></script>
    <script charset="utf-8" src="../../cms/editor/plugins/code/prettify.js"></script>
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
    </script>
</head>
<body>

<form name="example" method="post" action="../../cms/newsedit.php" >
    <p style="padding:12px 4px 2px 4px; color:#999; font-weight:bold; border-bottom:solid 1px #f5f5f5; clear:both;"><{$title}></p>
    <select name="category" style="float:left; padding:2px; height:24px; margin-right:2px;">
        <{foreach from=$category item=opt}>
        <option value="<{$opt}>"><{$opt}></option>
        <{/foreach}>
    </select>
    <select name="product" style="float:left; padding:2px; height:24px; margin-right:2px;">
        <{foreach from=$product item=opt}>
        <option value="<{$opt}>"><{$opt}></option>
        <{/foreach}>
    </select>
    <input type="text" id="txtTitle" style="width:560px; height:18px; float:left;" maxlength="100" />
    <br />
    <p style="padding:12px 4px 2px 4px; color:#999; font-weight:bold; border-bottom:solid 1px #f5f5f5; clear:both;"><{$content}></p>
    <textarea name="content1" style="width:700px;height:200px;visibility:hidden;"></textarea>
    <br />
    <input type="submit" name="button" value="提交内容" /> (提交快捷键: Ctrl + Enter)
</form>
</body>
</html>