<?
/** @var $this View */
$this->extend('/Common/template');
?>

<div class="row bg-white">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="page-header">
            <span class="glyphicon glyphicon-edit color-primary"></span>
            Request for Custom Url
        </h1>
        <?= $this->Session->flash() ?>
        <?= $this->Form->create('Request') ?>
        <?
        $this->Form->inputDefaults(array(
            'format' => array('before', 'label', 'error', 'between', 'input', 'after'),
            'div' => array('class' => 'form-group'),
            'class' => 'form-control',
            'error' => array('attributes'=>array('wrap'=>'span'))
        ));
        ?>
        <?= $this->Form->input('name', array('placeholder' => 'Enter name')) ?>
        <?= $this->Form->input('email', array('type' => 'email', 'placeholder' => 'Enter email')) ?>
        <?= $this->Form->input('url', array('type' => 'url', 'placeholder' => 'Enter url')) ?>
        <?= $this->Form->input('alias', array(
            'placeholder' => 'Enter alias',
            'between' => '<div class="input-group"><span class="input-group-addon">'.Router::url('/', true).'</span>',
            'after' => '</div>'
            )
        ) ?>
        <?= $this->Recaptcha->display(array('recaptchaOptions' => array('theme' => 'clean'))); ?>
        <br/>
        <?= $this->Form->end(array('label' => 'Send Request', 'class' => 'btn btn-primary')) ?>
        <br/>
        <br/>
    </div>
</div>