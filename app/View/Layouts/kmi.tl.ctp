<? /** @var $this View */ ?>
<!doctype html>
<html lang="th-TH">
<head>
    <meta charset="UTF-8">
    <title><?= $title_for_layout ?></title>
    <link rel="shortcut icon" href="<?=Router::url('/img/icon.png')?>" />
    <?
    echo $this->fetch('meta');
    echo $this->fetch('css');
    ?>
</head>
<body id="cover-bg" class="<?=$this->fetch('bg-cover')?>">
<?= $this->fetch('content'); ?>
<?= $this->fetch('script'); ?>
</body>
</html>