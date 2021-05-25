<section class="ftco-section">
	<div class="container">

		

		<div class="p-1">


              <h3 class="mb-5 text-uppercase"><b>Diskusi</b> 
              	<a href="#tanya" class="btn btn-primary"><i class="fa fa-arrow-down"></i></a>
				<form action="<?= base_url('user/diskusi') ?>" class="search-form mt-2" method="get">
                <div class="form-group">
                  <span class="icon ion-ios-search"></span>
                  <input type="text" name="search" autocomplete="off" class="form-control" placeholder="Search...">
                </div>
              </form>
              </h3>
					
			  <?php if (empty($diskusi)) : ?>
                        <ul class="comment-list">
                            <li class="comment">
                                <h3>
                                    Tidak Ditemukan
                                </h3>
                            </li>
                        </ul>
                    <?php endif; ?>

				<?php foreach ($diskusi as $row) : 
                    $by = $this->db->get_where('mejauser', ['id_user' => $row['id_user']])->row_array();
                    $foto = $this->db->get_where('profil', ['id_user' => $row['id_user']])->row_array(); ?>
              <ul class="comment-list">
                <li class="comment">

				<!-- ====================================================================================================================== -->
				 
                  <div class="vcard bio">
                    <img src="<?= base_url('assets/img/'). $foto['foto']; ?>" alt="Image placeholder"> 
                  </div>
                  <div class="comment-body">
                    <h3>
                        <?= $by['username']; ?>
                    </h3>

                    <div class="meta">
                        <time class="timeago small text-muted mr-0 text-lowercase" datetime="<?= $row['date'] ?>" title="July 17, 2008">11 years ago</time>
                    </div>
                    <?php if ($row['file'] != null): ?>
                    <img src="<?= base_url('assets/img/') . $row['file'] ?>" class="img-fluid mb-5" style="width: 200px;height:200px; object-fit: cover; object-position: center;" data-toggle="modal" data-target="#detailImage<?= $row['id_diskusi']  ?>">

                    <div class="modal fade mt-2 pt-2" id="detailImage<?= $row['id_diskusi']  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detail Image</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        	<img src="<?= base_url('assets/img/') . $row['file'] ?>" class="img-fluid mb-5" style="width: 400px;height:400px; object-fit: cover; object-position: center;">
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
					
					
                    <?php endif ?>
                    <p><?= ucfirst($row['isi']); ?></p>
                    <p><button id="reply<?= $row['id_diskusi'] ?>" class="reply">Reply</button></p>
                    <div class="comment-form-wrap float-top mb-1" id="isikan_reply<?= $row['id_diskusi'] ?>"></div>
                    <script>
                    	$('#reply<?= $row['id_diskusi'] ?>').click(function(){
                    		$('#isikan_reply<?= $row['id_diskusi'] ?>').html(`
                    			<form action="<?= base_url('user/reply_discus/'.$row['id_diskusi']) ?>" class="form-group mb-0" method="post" enctype="multipart/form-data">
									<div class="card mt-5 shadow-sm border">
										<div class="card-body row px-1 m-0 pb-2">
											<div class="col-11 col-md-10 col-lg-11 ml-md-3 ml-lg-0">
												<div class="text-input-post md-form m-0 mb-2">
													<textarea name="isi" id="isi" placeholder="Tulis sesuatu...." cols="10" rows="3" class="form-control"></textarea>
													<input type="file" name="file" id="file" class="form-control mt-2">
												</div>
											</div class="post-create-footer">
											<div class="ml-auto mr-4 mr-md-5">
												<button class="btn btn-md btn-primary rounded-pill" type="submit">Send</button>
											</div>
										</div>
									</div>
								</form>`)
                    	})
                    </script>
                    <p class="float-right my-0 mx-2">
                        <?php if ($row['id_user'] == $user['id_user']) : ?>
                            <a href="<?= base_url('user/delete_diskusi/') . $row['id_diskusi']; ?>">
                            <button class="btn btn-danger" onclick="return confirm('Are you sure want to delete this ?')" type="button"><i class="fas fa-trash"></i></button></a>
                        <?php endif; ?></p>

                        <a href="<?= base_url('user/detail_diskusi/') . $row['id_diskusi']; ?>">
                            <button class="btn btn-primary float-right" type="button">Selengkapnya...</button></a>
                  </div>


				 
                  <!-- ====================================================================================================================== -->

                  <?php $get_reply = $this->db->order_by('date', 'desc')->limit(2)->get_where('diskusi',['id_parent'=>$row['id_diskusi']])->result_array();

                  foreach ($get_reply as $row) { 
                    $by = $this->db->get_where('mejauser', ['id_user' => $row['id_user']])->row_array();
                    $foto = $this->db->get_where('profil', ['id_user' => $row['id_user']])->row_array(); ?>
				  <ul class="children">
                    <li class="comment bg-secondary p-5">
                      <div class="vcard bio">
                        <img src="<?= base_url('assets/img/'). $foto['foto']; ?>" alt="Image placeholder"> 
                      </div>
                      <div class="comment-body">
                        <h3><?= $by['username']; ?></h3>
                        <div class="meta"><time class="timeago small text-muted mr-0 text-lowercase" datetime="<?= $row['date'] ?>" title="July 17, 2008">11 years ago</time></div>
                        <?php if ($row['file'] != null): ?>
	                    <img src="<?= base_url('assets/img/') . $row['file'] ?>" class="img-fluid mb-5" style="width: 200px;height:200px; object-fit: cover; object-position: center;" data-toggle="modal" data-target="#detailImage<?= $row['id_diskusi']  ?>">

                    <div class="modal fade mt-2 pt-2" id="detailImage<?= $row['id_diskusi']  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detail Image</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        	<img src="<?= base_url('assets/img/') . $row['file'] ?>" class="img-fluid mb-5" style="width: 400px;height:400px; object-fit: cover; object-position: center;">
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>


	                    <?php endif ?>
                        <p><?= ucfirst($row['isi']); ?></p>
                         <p class="float-right my-0 mx-2">
                        <?php if ($row['id_user'] == $user['id_user']) : ?>
                            <a href="<?= base_url('user/delete_diskusi/') . $row['id_diskusi']; ?>">
                            <button class="btn btn-danger" onclick="return confirm('Are you sure want to delete this ?')" type="button"><i class="fas fa-trash"></i></button></a>
                        <?php endif; ?></p>
                      </div>

                    </li>
                  </ul>
                  <?php } ?>
                        


                </li>

                
              </ul>

          <?php endforeach; ?>
              <!-- END comment-list -->        
              
              <div class="comment-form-wrap pt-3 float-top" id="tanya">
                <form action="<?= base_url('user/start_discus') ?>" class="form-group mb-0" method="post" enctype="multipart/form-data">
					<div class="card mt-5 shadow-sm border">
						<div class="card-body row px-1 m-0 pb-2">
							<div class="col-11 col-md-10 col-lg-11 ml-md-3 ml-lg-0">
								<div class="text-input-post md-form m-0 mb-2">
									<textarea name="isi" id="isi" placeholder="Tulis sesuatu...." cols="10" rows="3" class="form-control"></textarea>
									<input type="file" name="file" id="file" class="form-control mt-2">
								</div>
							</div class="post-create-footer">
							<div class="ml-auto mr-4 mr-md-5">
								<button class="btn btn-md btn-primary rounded-pill" type="submit">Discuss</button>
							</div>

						</div>
					</div>
				</form>
			</div>

			<?php 
          	echo $this->pagination->create_links(); ?>
              
              
        </div>

	</div>
</section>


		







