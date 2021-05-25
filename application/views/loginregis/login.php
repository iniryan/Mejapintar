<div class="container-login100">
			<div class="wrap-login100">

				<form class="login100-form validate-form" action="<?= base_url('welcome'); ?>" method="post">
					<?= $this->session->flashdata('message'); ?>
					<a href="<?= base_url('guest') ?>">
					<span class="login100-form-title text-uppercase">
						Mejapintar
					</span>
					</a>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input type="email" class="input100" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>" autocomplete="off">

						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input type="password" placeholder="Password" id="password" name="password" class="input100">

						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Sign In
						</button>
					</div>

					<div class="text-center p-t-50">
						<a class="txt2" href="<?= base_url('welcome/registration'); ?>">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>


