<?php
$_name = 'Ruyter';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <title><?=$this->e($_name)?>, set all sails!</title>
    <link href='https://fonts.googleapis.com/css?family=Dosis:400,200' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/public/assets/css/main.css" type="text/css" />

    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<h1><?=$this->e($_name)?>!</h1>
<h2>The page <?=$this->e($page)?> is not routed</h2>
<p>
   You might want to try: <pre>$router->get('<?=$this->e($page)?>',[], 'Home:display');</pre>

</p>
</body>
</html>