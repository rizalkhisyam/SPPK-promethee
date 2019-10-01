<?php Flasher::flash(); ?>
<div class="all-login">
	<div class="form-center-login">
		<div class="grup-form-pengajuan">
			<h3>Login</h3>
			<form action="<?php echo BASEURL; ?>/Admin/masuk" method="POST">
				<div class="form-group">
					<label for="nama">Email</label>
					<input type="email" placeholder="Email@test.test" class="form-control" name="email" id="nama">
				</div>
				<div class="form-group">
					<label for="Password">Password</label>
					<input type="password" placeholder="Password" class="form-control" name="password" id="jurusan">
				</div>
				<button type="submit">Login</button>
			</form>
			<a href="<?php echo BASEURL; ?>"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back</a>
		</div>
	</div>
</div>
