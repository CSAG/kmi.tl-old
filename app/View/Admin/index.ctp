<?
/** @var $this View */

$this->extend('/Common/template')
?>
<div class="row bg-white">
    <div class="col-md-12">

        <div class="row">
            <div class="col-md-8">
                <h1>Admin</h1>
            </div>
            <div class="col-md-4 text-right" style="padding-top: 15px;">
                <a class="btn btn-sm btn-default" href="<?= Router::url('/admin/logout', true) ?>">logout</a>
            </div>
        </div>
        <?= $this->Session->flash() ?>

        <h3 class="page-header" style="margin-top: 15px;">Request (<?= count($RequestUrls) ?>)</h3>
        <table class="table table-bordered table-hover">
            <tr class="warning">
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Url</th>
                <th>Alias</th>
                <th>Datetime</th>
                <th></th>
            </tr>
            <? foreach ($RequestUrls as $key => $value): ?>
                <? $req = $value['Request'] ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $req['name'] ?></td>
                    <td><?= $this->Html->link($req['email'], 'mailto:' . $req['email']) ?></td>
                    <td><?= $req['alias'] ?></td>
                    <td class="long-url"><?= $this->Html->link($req['url']) ?></td>
                    <td><?= $this->Time->nice($req['datetime']) ?></td>
                    <td class="text-center">
                        <a class="btn btn-xs btn-success" href="<?= Router::url("/admin/approve/{$req['alias']}") ?>">
                            <span class="glyphicon glyphicon-ok"></span>
                        </a>
                        <a onclick="return confirm('Reject `<?= $req['alias'] ?>` ?')"
                           class="btn btn-xs btn-danger"
                           href="<?= Router::url("/admin/reject/{$req['alias']}") ?>">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </td>
                </tr>
            <? endforeach; ?>
        </table>

        <h3 class="page-header" style="margin-top: 15px;">Custom url (<?= count($CustomUrls) ?>)</h3>
        <table class="table table-bordered table-hover">
            <tr class="danger">
                <th>#</th>
                <th>Url</th>
                <th>Alias</th>
                <th>Datetime</th>
                <th>Added by</th>
                <th></th>
            </tr>
            <? foreach ($CustomUrls as $i => $value): ?>
                <? $url = $value['Url']; ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $this->Html->link(Router::url("/{$url['alias']}", true)) ?></td>
                    <td class="long-url"><?= $this->Html->link($url['url']) ?></td>
                    <td><?= $this->Time->nice($url['create_date']) ?></td>
                    <td><?= $value['User']['username'] ?></td>
                    <td class="text-center">
                        <a class="btn btn-xs btn-danger"
                           onclick="return confirm('Delete `<?= Router::url("/{$url['alias']}", true); ?>` ?');"
                           href="<?= Router::url("/admin/delete_url/{$url['id']}") ?>">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </td>
                </tr>
            <? endforeach; ?>
        </table>

        <h3 class="page-header">
            Add Custom Url
        </h3>
        <?=
        $this->Form->create('Url', array(
            'url' => array('action' => 'add_url', 'controller' => 'admin'),
            'inputDefaults' => array(
                'class' => 'form-control'
            )
        ))?>
        <?= $this->Form->input('url', array('type' => 'url')) ?>
        <?= $this->Form->input('alias') ?>
        <p/>
        <?= $this->Form->end(array('label' => 'Add', 'class' => 'btn btn-primary')) ?>
        <br/>
    </div>
</div>
