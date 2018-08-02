<h1 class="is-size-3">Hello <?php echo $this->session->userdata('username'); ?></h1>

<?php if(validation_errors()): ?>
	<div class="notification is-danger">
		<button class="delete"></button>
		<?php echo validation_errors(); ?>
	</div>
<?php endif; ?>

<?php if($this->session->flashdata('success')):?>
	<div class="notification is-success">
		<button class="delete"></button>
		<?php echo $this->session->flashdata('success'); ?>
	</div>
<?php endif; ?>

<a href="<?= base_url(); ?>logout" class="button is-info">Logout</a>
