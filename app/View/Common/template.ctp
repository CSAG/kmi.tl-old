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
            <a class="navbar-brand" href="#">KMI.TL</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-heart"></span> Custom URL</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-edit"></span> Request Custom URL</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-send"></span> Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <?= $this->fetch('content') ?>
</div>