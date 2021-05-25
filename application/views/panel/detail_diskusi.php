<div class="dashboard-wrapper">
    
        <div class="container-fluid dashboard-content ">
            <!-- pageheader  -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <div class="page-breadcrumb p-2">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/home'); ?>" class="breadcrumb-link2">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/diskusi'); ?>" class="breadcrumb-link2">Diskusi</a></li>
                                    <li class=" breadcrumb-item"><span>Detail Diskusi</span></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


    <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Mejapintar | Detail Diskusi</h5>
                        </div>    
                    </div>
    </div>

    <div class="container-fluid">
        
        <div class="row">
          <div class="col-md-12">
            <div class="timeline">
              <div>

              <?php foreach ($diskusi as $row) : 
                    $by = $this->db->get_where('mejauser', ['id_user' => $row['id_user']])->row_array();
                    $foto = $this->db->get_where('profil', ['id_user' => $row['id_user']])->row_array(); ?>

                <div class="timeline-item">
                  <span class="time">
                    <time class="timeago small text-muted mr-0 text-lowercase" datetime="<?= $row['date'] ?>" title="July 17, 2008">11 years ago</time>
                  </span>
                  <h3 class="timeline-header"><?= $by['username']; ?></h3>

                  <div class="timeline-body">
                    <?php if ($row['file'] != null): ?>
                    <img src="<?= base_url('assets/img/') . $row['file'] ?>" class="img-fluid mb-5" style="width: 300px;height:300px; object-fit: cover; object-position: center;" data-toggle="modal" data-target="#detailImage<?= $row['id_diskusi']  ?>">

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
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-primary btn-sm" id="reply<?= $row['id_diskusi'] ?>">Reply</a>
                    <div class="comment-form-wrap float-top mb-1" id="isikan_reply<?= $row['id_diskusi'] ?>"></div>
                    <script>
                          $('#reply<?= $row['id_diskusi'] ?>').click(function(){
                            $('#isikan_reply<?= $row['id_diskusi'] ?>').html(`
                              <form action="<?= base_url('admin/reply_discus2/'.$row['id_diskusi']) ?>" class="form-group mb-0" method="post" enctype="multipart/form-data">
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

                    
                        <?php if ($row['id_user'] == $user['id_user']) : ?>
                            <a href="<?= base_url('admin/delete_diskusi2/') . $row['id_diskusi']; ?>">
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this ?')" type="button">Delete</button></a>
                        <?php endif; ?>
                  </div>
                </div>
              </div>
              
            </div>

            <div class="timeline ml-3">
              <div>

              <?php $get_reply = $this->db->order_by('date', 'desc')->get_where('diskusi',['id_parent'=>$row['id_diskusi']])->result_array();

                  foreach ($get_reply as $row) { 
                    $by = $this->db->get_where('mejauser', ['id_user' => $row['id_user']])->row_array();
                    $foto = $this->db->get_where('profil', ['id_user' => $row['id_user']])->row_array(); ?>

                <div class="timeline-item">
                  <span class="time">
                    <time class="timeago small text-muted mr-0 text-lowercase" datetime="<?= $row['date'] ?>" title="July 17, 2008">11 years ago</time>
                  </span>
                  <h3 class="timeline-header"><?= $by['username']; ?></h3>

                  <div class="timeline-body">
                    <?php if ($row['file'] != null): ?>
                    <img src="<?= base_url('assets/img/') . $row['file'] ?>" class="img-fluid mb-5" style="width: 300px;height:300px; object-fit: cover; object-position: center;" data-toggle="modal" data-target="#detailImage<?= $row['id_diskusi']  ?>">

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
                  </div>
                  <div class="timeline-footer mb-3">
                    
                        <?php if ($row['id_user'] == $user['id_user']) : ?>
                            <a href="<?= base_url('admin/delete_diskusi2/') . $row['id_diskusi']; ?>">
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this ?')" type="button">Delete</button></a>
                        <?php endif; ?>
                  </div>
                </div>
                <?php } ?>
              </div>
              
            </div>


                <?php endforeach; ?>


          </div>
        </div>
      </div>

            
         
                  <!-- <div class="vcard bio">
                    <img src="<?= base_url('assets/img/'). $foto['foto']; ?>" alt="Image placeholder"> 
                  </div> -->
                  
              <!-- END comment-list -->        
              
              <div class="comment-form-wrap pt-3 float-top" id="tanya"></div>
              
              
        </div>

</div>
</div>

    







