<h1 class="is-size-2">Register Page</h1>
<p>Fill in the details to register to our site</p>

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
	<form action="" method="post">

		<div class="field">
			<div class="control">
				<input class="input" value="<?php echo set_value('username'); ?>" type="text" placeholder="username" name="username">
			</div>
		</div>

		<div class="field">
			<div class="control">
				<input class="input" value="<?php echo set_value('email'); ?>" type="text" placeholder="email" name="email">
			</div>
		</div>

		<div class="field">
			<div class="control">
				<input class="input" type="password" placeholder="password" name="password">
			</div>
		</div>

		<div class="field">
			<div class="control">
				<input class="input" type="password" placeholder="confrim password" name="password2">
			</div>
		</div>

		<div class="field">
			<div class="control">
				<input class="input" value="<?php echo set_value('phone') ?>" type="tel" placeholder="Phone" name="phone">
			</div>
		</div>


		<div class="control">
			<span class="has-text-weight-semibold">Gender&nbsp;&nbsp;&nbsp;</span>
			<label class="radio">
				<input type="radio" value="male" name="gender">
				Male
			</label>
			<label class="radio">
				<input type="radio" value="female" name="gender">
				Female
			</label>
		</div>
		<br>
		<input type="submit" class="button is-info" value="Register" name="register">

	</form>
</div>


