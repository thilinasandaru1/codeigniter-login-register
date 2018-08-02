<h1 class="is-size-2">Login Page</h1>
<p>Login to our website see dashboard</p>

<div class="column is-6">
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

	<?php if($this->session->flashdata('error')):?>
		<div class="notification is-danger">
			<button class="delete"></button>
			<?php echo $this->session->flashdata('error'); ?>
		</div>
	<?php endif; ?>
	<form action="" method="post">

		<div class="field">
			<div class="control">
				<input class="input" value="<?php echo set_value('username'); ?>" type="text" placeholder="username" name="username">
			</div>
		</div>

		<div class="field">
			<div class="control">
				<input class="input" type="password" placeholder="password" name="password">
			</div>
		</div>

		<br>
		<input type="submit" class="button is-info" value="Login" name="Login">

	</form>
</div>


