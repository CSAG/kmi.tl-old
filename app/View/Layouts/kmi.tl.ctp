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
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-16671776-7']);
    _gaq.push(['_trackPageview']);
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
</body>
</html>