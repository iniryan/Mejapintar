<div class="hero-wrap hero-bread">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate text-center">
            <h1 class="mb-0 bread text-dark"><?= $isi['judul'] ?></h1>
          </div>
        </div>
      </div>
    </div>

<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">

                <img src="<?= base_url('assets/img/') . $isi['gambar'] ?>" class="img-fluid mb-5">
                    
                <p><?= $isi['konten']; ?></p>            

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
                            <a href="<?= base_url('user/delete_comment/') . $row['id_komen']; ?>">
                            <button class="btn btn-danger" onclick="return confirm('Are you sure want to delete this comment?')" type="button"><i class="fas fa-trash"></i></button></a>
                        <?php endif; ?></p>

                    <div class="meta">
                        <time class="timeago small text-muted mr-0 text-lowercase" datetime="<?= $row['date_komen'] ?>" title="July 17, 2008">11 years ago</time>
                    </div>
                  </div>
                </li>

                
              </ul>

          <?php endforeach; 
                endif; ?>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h4 class="mb-5">Leave a comment</h4>
                <form action="<?= base_url('user/comment/') . $isi['id_news']; ?>" method="post" class="p-5 bg-light">
                  

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
          <div class="col-lg-4 sidebar ftco-animate">
            

            <div class="sidebar-box ftco-animate">

              <h3 class="heading">Recent News & Tips</h3>

              <?php foreach ($recent as $row) :
                    $banyak_komenrecent = $this->db->get_where('comment', ['id_news' => $row['id_news']])->num_rows();;
                            if ($row['id_news'] != $isi['id_news']) : ?>
                              <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url(<?= base_url('assets/img/') . $row['gambar']; ?>);"></a>
                                <div class="text">
                                  <h3 class="heading-1"><a href="<?= base_url('user/news/') . $row['judul'] .'/'. $row['id_news']; ?>"><?= $row['judul']; ?></a></h3>
                                    <div class="text-capitalize"><?= $row['tipe'] ?></div>
                                  <div class="meta">
                                    <div><time class="timeago small text-muted mr-0" datetime="<?= $row['date'] ?>" title="July 17, 2008">11 years ago</time></div>
                                    <div><span class="icon-chat"></span> <?= $banyak_komenrecent; ?></div>
                                  </div>
                                </div>
                              </div>
                        <?php endif;
                        endforeach; ?>
              
            </div>

            

        </div>
      </div>
    </section> <!-- .section -->






































