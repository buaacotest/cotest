<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>类别</title>
</head>
<body>
{section name=n loop=$str}
   总共有{$str[n].number}个<a href="products.php?id={$str[n].id_productgroup}" target="_blank">{$str[n].name}</a>被测试<br/>
{/section}
</body>
</html>
