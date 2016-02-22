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
    <div id="overlay">
        <h1><?=$this->e($_name)?>!</h1>
        <h2>Hello <?=$this->e($name)?></h2>
        <p>
            This is the default <?=$this->e($_name)?> intro page, this page is rendered inside Plates <br />
            Everything inside the <?=$this->e($_name)?> Framework will be parsed trough the node list, <br />
            Every item is a node and will be put inside a runtime element, this que is handled and presented
        </p>
    </div>
</body>
</html>