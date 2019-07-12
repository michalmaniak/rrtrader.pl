<html>
<head>
</head>
<body>
<form method="post" action="">
.. form elements

<div>
    <?php
        require_once 'securimage.php';
        echo Securimage::getCaptchaHtml();
    ?>
</div>
</form>
</body>
</html>