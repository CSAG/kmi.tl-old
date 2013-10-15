<?
/** @var $this View */

$this->extend('/Common/template');
?>
<div class="row bg-white">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="page-header" style="margin-bottom: 0px;">
            <?=$this->Html->link(Router::url("/{$Url['alias']}", true), null, array('style'=>"color:#333;"))?>
        </h1>
        <div class="text-center">
            <img src="<?=Router::url("/{$Url['alias']}.qr", true)?>" alt="<?=Router::url("/{$Url['alias']}", true)?>"/>
        </div>
        <table class="table table-bordered">
            <tr>
                <th class="bg-warning" width="150">Alias</th>
                <td><?=$this->Html->link(Router::url("/{$Url['alias']}", true))?></td>
            </tr>
            <tr>
                <th class="bg-warning long-url">Url</th>
                <td><?=$this->Html->link($Url['url'])?></td>
            </tr>
            <tr>
                <th class="bg-warning">QRcode</th>
                <td><?=$this->Html->link(Router::url("/{$Url['alias']}.qr", true))?></td>
            </tr>
            <tr>
                <th class="bg-warning">Info</th>
                <td><?=$this->Html->link(Router::url("/{$Url['alias']}.info", true))?></td>
            </tr>
            <tr>
                <th class="bg-warning">Counter</th>
                <td><?=$Url['counter']?></td>
            </tr>
            <tr>
                <th class="bg-warning">Create Date</th>
                <td><?=$this->Time->nice($Url['create_date'])?></td>
            </tr>
        </table>
        <br/>
    </div>
</div>