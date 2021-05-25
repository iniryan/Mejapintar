<section class="ftco-section">
	<div class="container">
			<h4 class="mb-5">Menampilkan hasil pencarian untuk " <?= $keyword ?> "</h4>
		<div class="row">
			<?php if (empty($materi)) : ?>
                            <div class="col-md-4 mb-5">
                                <h3>
                                    Not Found
                                </h3>
                            </div>
                        <?php endif;
				foreach ($materi as $row) : ?>
			<div class="col-md-4 mb-5">
				<div class="card text-center">
					<h5 class="card-title text-center mt-3"><?= $row->nama_mapel ?></h5>
					<h6 class="card-body text-center mt-1"><?= $row->judul_bab ?></h6>
					<a href="<?= base_url('user/materi/').$row->nama_mapel.'/'.$row->id_materi; ?>">
                      <button class="btn btn-primary mb-3" style="font-size: 14px;">Baca</button>
                    </a>
				</div>	
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</section>