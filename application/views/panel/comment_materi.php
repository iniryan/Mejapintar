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
                                    <li class=" breadcrumb-item"><span>Comment Materi</span></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
          <!-- end -->

          <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Mejapintar | Comment Materi</h5>
                            <div class="card-body p-0">
                                <div class="table-responsive p-3">

                                 

                                    <table class="table" id="Comment2">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-1">No</th>
                                                <th class="border-1">Id</th>
                                                <th class="border-1">By</th>
                                                <th class="border-1">Materi</th>
                                                <th class="border-1">Comment</th>
                                                <th class="border-1">Date</th>
                                                <th class="border-1">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $query = $this->db->get('comment2');

                                            foreach ($query->result_array() as $row) {
                                                $by = $this->db->get_where('mejauser', ['id_user' => $row['id_user']])->row_array();
                                                $materi = $this->db->get_where('materi', ['id_materi' => $row['id_materi']])->row_array(); 
                                                ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row['id_komen']; ?></td>
                                                        <td><?= $by['username']; ?></td>
                                                        <td><?= $materi['judul_bab']; ?></td>
                                                        <td><?= word_limiter($row['komen'], 4) ?></td>
                                                        <td><?= $row['date']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url('admin/delete_komen2/') . $row['id_komen']; ?>">
                                                                <button onclick="return confirm('Are you sure want to delete this data?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                            </a>
                                                            <button class="btn btn-info" data-toggle="modal" data-target="#detailComment<?= $row['id_komen']  ?>">
                                                                <i class="fa fa-info"></i>
                                                            </button>

                                                <div class="modal fade mt-5 pt-4" id="detailComment<?= $row['id_komen']  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detail Comment</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body"><?= $row['komen']?></div>
                                                        <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>   
                                                            
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

</div>
</div>