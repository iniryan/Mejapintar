<section class="ftco-section">

    <div class="container">

        

        <div class="row">

                 

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="mb-5">
                          <h1  class="text-center"><b>Quiz</b></h1>
                        </div>

                        <form action="<?= base_url('user/quiz_result/').$id_sub.'/'.$id_materi; ?>" method="post">
                        <div class="card">
                            <?php $no = 1;

                                foreach ($quiz as $key) {  
                                $loop = $no++;
                                
                                $radio = 'jawaban'.$loop;
                                ?>

                            <h5 class="card-header bg-grey"><?= $loop ?>. <?= $key['isi_soal']; ?></h5>
                            <div class="card-body p-4 bg-grey">
                                  <input type="radio" name="<?= $radio; ?>" value="a" style="border: 0; width: 5%;height: 1.4rem;"> <?= $key['opsi1']; ?><br>
                                  <input type="radio" name="<?= $radio; ?>" value="b" style="border: 0; width: 5%;height: 1.4rem;"> <?= $key['opsi2']; ?><br>
                                  <input type="radio" name="<?= $radio; ?>" value="c" style="border: 0; width: 5%;height: 1.4rem;"> <?= $key['opsi3']; ?><br>
                            </div>
                             <?php } ?>
                        </div>
                            <button class="btn btn-success mt-5" type="submit">Submit</button>
                        </form>
                    </div>
        </div>
    </div>
</section>
