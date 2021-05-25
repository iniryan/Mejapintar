<section class="ftco-section">
  <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Mejapintar | Change Password</h5>
                            <div class="card-body p-0">
                                   <div class="col-lg-6">
                                        <?= $this->session->flashdata('messagepassword'); ?>
                                   </div>
                                   <?= form_open_multipart('user/changepass'); ?>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="old_password" class="col-sm-12 col-form-label">The Old Password</label>
                                        <div class="col-lg-4">
                                        <input type="password" class="form-control" id="old_password" name="old_password">
                                            <?= form_error('old_password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="new_password1" class="col-sm-12 col-form-label">The New Password</label>
                                        <div class="col-lg-4">
                                        <input type="password" class="form-control" id="new_password1" name="new_password1">
                                            <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="new_password2" class="col-sm-12 col-form-label">Confirm The New Password</label>
                                        <div class="col-lg-4">
                                        <input type="password" class="form-control" id="new_password2" name="new_password2">
                                            <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                        <div class="col-lg-12 mt-3">
                                            <button type="submit" onclick="return confirm('Are you sure want to change the password for this account?')" class="btn btn-warning">Confirm Change</button>
                                            <a href="<?= base_url('user/profiluser'); ?>" class="btn btn-light">Cancel</a>
                                        </div>
                                   </div>

                            </div>
                        </div>
                    </div>
                </div>
  </div>
</section>