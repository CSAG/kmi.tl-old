<?
/** @var $this View */

$this->extend('/Common/template');
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="page-header">
            <?php echo 'Login'; ?>
        </h1>
        <?php echo $this->Session->flash('flash', array('element'=> 'flash/danger')); ?>
        <?php echo $this->Form->create('User'); ?>

        <?php echo $this->Form->input('username', array('class' => 'form-control')); ?>
        <p/>
        <?php echo $this->Form->input('password', array('class' => 'form-control')); ?>
        <p/>
        <div class="text-right">
            <?php echo $this->Form->end(array('label' => 'Login', 'class' => 'btn btn-primary', 'style'=>'padding-left:30px; padding-right:30px;')); ?>
        </div>
    </div>
</div>