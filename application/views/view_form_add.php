
<h1>Add user</h1>

<?php
$input_name = array(
        'name'          => 'name',
        'id'            => 'name',
        'value'         => set_value('name', $users[0]->name),
        'maxlength'     => '100',
        'size'          => '50'
        //'style'         => 'width:50%'
);
$input_email = array(
        'name'          => 'email',
        'id'            => 'email',
        'value'         => set_value('email', $users[0]->email),
        'maxlength'     => '100',
        'size'          => '50'
        //'style'         => 'width:50%'
);

$status = array(
        '0'          => 'Inactivo',
        '1'            => 'Activo'
);
?>

<?php //echo validation_errors(); ?>
<?php echo form_open(); ?>

<?php echo form_label('Name','lbl_name'); ?>
<?php echo form_input($input_name); ?>
<?php echo form_error('name'); ?><br>
<?php echo form_label('Email','lbl_email'); ?>
<?php echo form_input($input_email); ?>
<?php echo form_error('email'); ?><br>
<?php echo form_label('Status','lbl_status'); ?>
<?php echo form_dropdown('status', $status, $users[0]->status); ?>
<?php echo form_submit('btn_send', 'Send'); ?>

<?php echo form_open() ?>

