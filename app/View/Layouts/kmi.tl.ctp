<? /** @var $this View */ ?>
<!doctype html>
<html lang="th-TH">
<head>
    <meta charset="UTF-8">
    <title><?= $title_for_layout ?></title>
    <?
    echo $this->fetch('meta');
    echo $this->fetch('css');
    ?>
</head>
<body>
<?= $this->fetch('content'); ?>
<?= $this->fetch('script'); ?>
</body>
</html>