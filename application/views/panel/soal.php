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
                                    <li class=" breadcrumb-item"><span>Soal</span></li>
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
                            <h5 class="card-header mt-3">Mejapintar | Soal
                                <a href="<?= base_url('admin/create_soal'); ?>" class="btn btn-info float-right">

                                    <i class="fas fa-plus mr-1"></i>Soal</a>
                            </h5>
                            <div class="card-body p-0">
                                <?= $this->session->flashdata('message'); ?>
                                <!-- <div class="form-group col-sm-4 text-center mt-2">
                                    <select id="mapel_filter" class="form-control select2" style="width:100% !important">
                                        <option value="all">Semua Mapel</option>
                                        <?php foreach ($mapel as $m) :?>
                                            <option value="<?= $m->id_sub ?>"><?= $m->sub_kategori.' - '.$m->nama_kategori?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div> -->
                                <div class="table-responsive p-3">

                                    <table class="table" id="Soal">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-1">No</th>
                                                <th class="border-1">Kategori</th>
                                                <th class="border-1">Sub Kategori</th>
                                                <th class="border-1">Title</th>
                                                <th class="border-1">Kunci</th>                 
                                                <th class="border-1">Date Created</th>
                                                <th class="border-1">Status</th>
                                                <th class="border-1">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $query = $this->db->query('SELECT * FROM soal INNER JOIN sub_kategori ON soal.id_sub = sub_kategori.id_sub inner join kategori on sub_kategori.id_kategori = kategori.id_kategori');
                                            foreach ($query->result_array() as $row) { ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row['nama_kategori']; ?></td>
                                                        <td><?= $row['sub_kategori']; ?></td>
                                                        <td><?= $row['judul_soal']; ?></td>
                                                        <td><?= $row['kunci']; ?></td>
                                                        <td><?= $row['date_creates'] ?></td>
                                                        <td><?php $status = $row['activate'];
                                                                    if ($status == 1) echo "Active";
                                                                    else echo "Unactivate"; ?></td>
                                                        <td>
                                                            <a href="<?= base_url('admin/delete_soal/') . $row['id_soal']; ?>">
                                                                <button onclick="return confirm('Are you sure want to delete this data?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                            </a>
                                                            <a href="<?= base_url('admin/edit_soal/') . $row['id_soal']; ?>">
                                                                <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                                            </a>
                                                            <a href="<?= base_url('admin/detail_soal/') . $row['id_soal']; ?>">
                                                                <button class="btn btn-info"><i class="fas fa-info"></i></button>
                                                            </a>
                                                           <a href="<?= base_url('admin/unactivate/') . $row['id_soal']; ?>">
                                                                <button onclick="return confirm('Are you sure want to unactivate this data?')" class="btn btn-outline-warning p-1 btn-xs m-2">Unactivate</button>
                                                           </a>
                                                           <a href="<?= base_url('admin/activate/') . $row['id_soal']; ?>">
                                                               <button onclick="return confirm('Are you sure want to activate this account?')" class="btn btn-outline-success p-1 btn-xs m-2">Activate</button>
                                                           </a>        

                                                            <!-- 
                                                            <a href="<?= base_url('admin/update_soal/') . $row['id_soal']; ?>">
                                                                <button class="btn btn-warning">Update</button>
                                                            </a> -->
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

                <!-- end  -->

            </div>
        
    </div>