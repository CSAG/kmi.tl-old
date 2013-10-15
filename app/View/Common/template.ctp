<?
    /** @var $this View */

    // setup template
    $this->Html->script(array(
        'jquery-1.10.2.min.js',
        'bootstrap.min.js',
        'angular.min.js',
        'default.js'
    ), array('inline'=>false));

    $this->Html->css(array(
        'bootstrap.min.css',
        'default.css'
    ), null, array('inline'=>false));

    // random bg
    $this->assign('bg-cover', 'cover-'.rand(1,16));

?>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=Router::url('/', true)?>">KMI.TL</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?=Router::url('/')?>"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a href="<?=Router::url('/pages/custom_url')?>"><span class="glyphicon glyphicon-heart"></span> Custom URL</a></li>
                <li><a href="<?=Router::url('/pages/request_custom_url')?>"><span class="glyphicon glyphicon-edit"></span> Request Custom URL</a></li>
                <li><a href="<?=Router::url('/pages/api')?>"><span class="glyphicon glyphicon-transfer"></span> API</a></li>
                <li><a href="mailto:csag@kmi.tl"><span class="glyphicon glyphicon-send"></span> Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container body-container">
    <?= $this->fetch('content') ?>
</div>
<div class="footer-container">
    <div class="container text-right">
        <br/>
        <small class="text-shadow">
            Copy right KMI<span class="color-primary">.</span>TL, Powered by <a href="http://csag.kmi.tl">CSAG</a>
        </small>
        <br/><br/>
    </div>
</div>
