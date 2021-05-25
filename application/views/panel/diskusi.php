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
                                    <li class=" breadcrumb-item"><span>Diskusi</span></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
          <!-- end -->
            
            <!-- start  -->
                 <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Mejapintar | Diskusi</h5>
                            <div class="card-body p-0">
                                <div class="table-responsive p-3">

                                 

                                    <table class="table" id="Disscuss">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-1">No</th>
                                                <th class="border-1">Id</th>
                                                <th class="border-1">Sender</th>
                                                <th class="border-1">Content</th>
                                                <th class="border-1">Date</th>
                                                <th class="border-1">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $Diskusi = $this->db->get('diskusi');

                                            foreach ($Diskusi->result_array() as $row) {
                                                $by = $this->db->get_where('mejauser', ['id_user' => $row['id_user']])->row_array(); 
                                                ?>
                                                        <?php if ($row['id_parent'] == 0) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row['id_diskusi']; ?></td>
                                                        <td><?= $by['username']; ?></td>
                                                        <td><?= word_limiter($row['isi'], 4) ?></td>
                                                        <td><?= $row['date']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url('admin/delete_diskusi/') . $row['id_diskusi']; ?>">
                                                                <button onclick="return confirm('Are you sure want to delete this data?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                            </a>
                                                            <a href="<?= base_url('admin/detail_diskusi/') . $row['id_diskusi']; ?>">
                                                                <button class="btn btn-info"><i class="fa fa-info"></i></button>
                                                            </a>
                                                            
                                                        </td>
                                                    </tr>
                                                        <?php endif; ?>
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

                <!-- end  -->

            </div>
        
    </div>