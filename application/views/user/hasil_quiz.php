<section class="ftco-section">
    <div class="container">

        <div class="row">
         
         

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              
                  
                  <h2><b>Pembahasan</b></h2>
                  <div class="card">
                  <?php $no = 1;
                              $a = 'a';
                              $b = 'b';
                              $c = 'c';
                                foreach ($quiz as $key) { 
                                  $loop = $no++;
                                 ?>
                        <h5 class="card-header bg-grey"><?= $loop ?>. <?= $key['isi_soal']; ?></h5>
                        <div class="card-body p-4" style="background: #f0f0f0;">
                              <h6 class="text <?= $a == $key['kunci'] ? 'text-success font-weight-bold' : '' ?>"><?= $a.'. '.$key['opsi1']; ?></h6><br>
                              <h6 class="text <?= $b == $key['kunci'] ? 'text-success font-weight-bold' : '' ?>"><?= $b.'. '.$key['opsi2']; ?></h6><br>
                              <h6 class="text <?= $c == $key['kunci'] ? 'text-success font-weight-bold' : '' ?>"><?= $c.'. '.$key['opsi3']; ?></h6><br>

                              <h6>Jawaban kamu : <span class="text-uppercase <?= ($ques['ques'.$loop] == $key['kunci'] ? 'text-success font-weight-bold' : (empty($ques['ques'.$loop]) ? 'text-warning font-weight-bold' : 'text-danger font-weight-bold')); ?>"><?php if(empty($ques['ques'.$loop])){ echo 'Tidak Ada'; } else { echo $ques['ques'.$loop];}; ?></span></h6><br>
                                  <h6>Bahasan : <?= $key['bahasan']; ?></h6><br>
                        </div>
                        <?php } ?>
                  </div>

                  <div class="mt-5">
                      <h1  class="text-center"><b>Hasil Quiz</b></h1>
                        <h1 class="text-center"><b><?= $nilai  ?></b></h1>
                    </div>


                  <?php $href = ($id_sub == 31 || $id_sub == 34 || $id_sub == 37 || $id_sub == 40 ? 'user/quiz_sd' : ($id_sub == 32 || $id_sub == 35 || $id_sub == 38 || $id_sub == 41 ? 'user/quiz_smp' : ($id_sub == 33 || $id_sub == 36 || $id_sub == 39 || $id_sub == 42 ? 'user/quiz_smak' : 'user'))); ?>
                  <a class="btn btn-success mt-5" href="<?= base_url($href); ?>">Selesai</a>

            </div>
        </div>
    </div>
</section>

                        