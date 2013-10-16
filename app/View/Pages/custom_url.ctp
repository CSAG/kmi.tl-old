<? /** @var $this View */

$this->extend('/Common/template');
?>
<div class="row bg-white">
    <div class="col-md-12">
        <h1 class="page-header">
            <span class="glyphicon glyphicon-heart color-primary"></span>
            Custom Url
        </h1>
        <table class="table table-bordered table-hover table-responsive">
            <tr class="danger">
                <th>#</th>
                <th>Alias</th>
                <th>Url</th>
                <th>Info</th>
            </tr>
            <? foreach ($CustomUrls as $i => $value): ?>
                <? $url = $value['Url']; ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $this->Html->link(Router::url("/{$url['alias']}", true)) ?></td>
                    <td>
                        <div class="long-url" style="width: 400px;">
                            <?= $this->Html->link($url['url'], null, array('class'=>'long-url')) ?>
                        </div>
                    </td>
                    <td><?= $this->Html->link('Info', Router::url("/{$url['alias']}.info", true)) ?></td>
                </tr>
            <? endforeach; ?>
        </table>
    </div>
</div>
