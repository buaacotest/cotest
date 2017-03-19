<?php /* Smarty version 2.6.19, created on 2017-03-19 09:35:32
         compiled from newsedit.tpl */ ?>
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
    <input type="hidden" name="txtid" value='<?php echo $this->_tpl_vars['textid']; ?>
'>
    <p style="padding:12px 4px 2px 4px; color:#999; font-weight:bold; border-bottom:solid 1px #f5f5f5; clear:both;">文章标题</p>
    <select id="catesel" name="category" style="float:left; padding:2px; height:24px; margin-right:2px;" onchange="checkValue()">
        <?php $_from = $this->_tpl_vars['category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['opt']):
?>
        <option value="<?php echo $this->_tpl_vars['opt']; ?>
"><?php echo $this->_tpl_vars['opt']; ?>
</option>
        <?php endforeach; endif; unset($_from); ?>
    </select>
    <select id="productsel"  name="product" style="float:left; padding:2px; height:24px; margin-right:2px;">
        <?php $_from = $this->_tpl_vars['product']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['opt']):
?>
        <option value="<?php echo $this->_tpl_vars['opt']; ?>
"><?php echo $this->_tpl_vars['opt']; ?>
</option>
        <?php endforeach; endif; unset($_from); ?>
    </select>
    <input type="text" id="txtTitle" name="txtTitle" style="width:560px; height:25px; float:left;" maxlength="100" value="<?php echo $this->_tpl_vars['title']; ?>
"/>
    <br />
    <p style="padding:12px 4px 2px 4px; color:#999; font-weight:bold; border-bottom:solid 1px #f5f5f5; clear:both;">文章内容</p>
    <textarea name="content1" style="width:700px;height:200px;visibility:hidden;"><?php echo $this->_tpl_vars['content']; ?>
</textarea>
    <br />
    <input type="submit" name="button" value="提交内容" /> (提交快捷键: Ctrl + Enter)
</form>
<script>
    document.getElementById("productsel")[<?php echo $this->_tpl_vars['productselectedNum']; ?>
].selected=true;

</script>
</body>
</html>