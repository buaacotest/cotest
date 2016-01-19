<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{$page_title}</title>
</head>
<body>
{section name=n loop=$products}
    名称:{$products[n].completename}<br/>
{/section}
</body>
</html>