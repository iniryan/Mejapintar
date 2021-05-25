<div class="hero-wrap hero-bread">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate text-center">
            <h1 class="mb-0 bread text-dark"><?= $isi['nama_mapel'] ?></h1>
            <p><h4><b><?= $isi['judul_bab'] ?></b></h4></p>
          </div>
        </div>
      </div>
    </div>

<section class="ftco-section ftco-degree-bg mt-0">
      <div class="container">
            
            <iframe width="100%" height="640" src="<?= $isi['video'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        <div class="row">
          <div class="col-lg-8 ftco-animate text-dark">

                <?php if(!empty($isi['image'])) : ?>
                <img src="<?= base_url('assets/img/') . $isi['image'] ?>" class="img-fluid mb-5">
                <?php endif; ?>
                <?= $isi['isi_materi']; ?>

                <?= $isi['rangkuman']; ?>

                    <?php $sudah_baca = $this->db->get_where('riwayat',['id_user'=>$user['id_user'], 'id_materi'=>$isi['id_materi']])->row_array(); if(!isset($sudah_baca)):?>
                        <a href="<?= base_url('user/baca/').$isi['id_sub'].'/'.$isi['id_materi'] ?>" class="btn btn-light mt-2 mr-3">Sudah Selesai Baca?</a>
                    <?php endif;?>

                    <a href="<?= base_url('user/print/').$isi['nama_mapel'].'/'.$isi['id_materi'] ?>" class="btn btn-light mt-2"><i class="fa fa-download"> Download to PDF</i></a>
            

            <div class="pt-5 mt-5">
              <h4 class="mb-5"><?= $banyak_komen; ?> Comments</h4>
            <?php if ($banyak_komen > 0) :
                foreach ($komen as $row) : 
                    $by = $this->db->get_where('mejauser', ['id_user' => $row['id_user']])->row_array();
                    $foto = $this->db->get_where('profil', ['id_user' => $row['id_user']])->row_array(); ?>
              <ul class="comment-list">
                <li class="comment">
                  <div class="vcard bio">
                    <img src="<?= base_url('assets/img/'). $foto['foto']; ?>" alt="Image placeholder"> 
                  </div>
                  <div class="comment-body">
                    <h3>
                        <?= $by['username']; ?>
                    </h3>
                    <p><?= ucfirst($row['komen']); ?></p>
                    <p class="float-right">
                        <?php if ($row['id_user'] == $user['id_user']) : ?>
                            <a href="<?= base_url('user/delete_comment2/') . $row['id_komen']; ?>">
                            <button class="btn btn-danger" onclick="return confirm('Are you sure want to delete this comment?')" type="button"><i class="fas fa-trash"></i></button></a>
                        <?php endif; ?></p>

                        <div class="meta">
                        <time class="timeago small text-muted mr-0 text-lowercase" datetime="<?= $row['date'] ?>" title="July 17, 2008">11 years ago</time>
                        </div>

                  </div>
                </li>

                
              </ul>

          <?php endforeach; 
                endif; ?>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h4 class="mb-5">Leave a comment</h4>
                <form action="<?= base_url('user/comment2/') . $isi['id_materi']; ?>" method="post" class="p-5 bg-light">
                  

                  <div class="form-group">
                    <label for="message">Comment</label>
                    <textarea name="komen" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
            </div>
          </div> <!-- .col-md-8 -->
      </div>
    </section> <!-- .section -->

