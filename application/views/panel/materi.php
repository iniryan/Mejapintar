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
                                    <li class=" breadcrumb-item"><span>Materi</span></li>
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
                            <h5 class="card-header mt-3">Mejapintar | Materi
                                <a href="<?= base_url('admin/create_materi'); ?>" class="btn btn-info float-right">
                                    <i class="fas fa-plus mr-1"></i>Materi</a>
                            </h5>
                            <div class="card-body p-0">
                                <?= $this->session->flashdata('message'); ?>
                                <div class="table-responsive p-3">

                                    <table class="table" id="Materi">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-1">No</th>
                                                <th class="border-1">Kategori</th>
                                                <th class="border-1">Mapel</th>
                                                <th class="border-1">Bab</th>
                                                <th class="border-1">Date Created</th>
                                                <th class="border-1">Recommended</th>
                                                <th class="border-1" style="width: 150px;">Action</th>
                                                <th class="border-1">Recommended Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $query = $this->db->query('SELECT * FROM materi join sub_kategori on materi.id_sub = sub_kategori.id_sub join kategori on sub_kategori.id_kategori = kategori.id_kategori');
                                            foreach ($query->result_array() as $row) { ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row['nama_kategori']; ?></td>
                                                        <td><?= $row['nama_mapel']; ?></td>
                                                        <td><?= $row['judul_bab']; ?></td>
                                                        <td><?= $row['date_created_materi']; ?></td>
                                                        <td><?php $recom = $row['recomended'];
                                                                if ($recom == 1) echo "<div class='badge badge-light p-2'>Yes</div>";
                                                                    else echo "<div class='badge badge-dark p-2'>No</div>"; ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url('admin/delete_materi/') . $row['id_materi']; ?>">
                                                                <button onclick="return confirm('Are you sure want to delete this data?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                            </a>
                                                             <a href="<?= base_url('admin/edit_materi/') . $row['id_materi']; ?>">
                                                                <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                                            </a>
                                                            <a href="<?= base_url('admin/detail_materi/') . $row['id_materi']; ?>">
                                                                <button class="btn btn-info"><i class="fas fa-info"></i></button>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url('admin/rekomen/') . $row['id_materi']; ?>">
                                                                <button class="btn btn-outline-warning" onclick="return confirm('Are you sure want to make this as recommended?')">Yes</button>
                                                            </a>
                                                            <a href="<?= base_url('admin/rekomen2/') . $row['id_materi']; ?>">
                                                                <button onclick="return confirm('Are you sure want to remove this as recommended?')" class="btn btn-outline-danger">No?</button>
                                                            </a>
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