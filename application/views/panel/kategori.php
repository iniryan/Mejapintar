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
                                    <li class=" breadcrumb-item"><span>Kategori</span></li>
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

                            <h5 class="card-header mt-3">Mejapintar | Jenjang
                                <a href="<?= base_url('admin/create_kategori'); ?>" class="btn btn-info float-right mr-2">
                                <i class="fas fa-plus mr-1"></i>Jenjang</a>
                            </h5>
                            <small class="text-danger p-3 "> Perhatian!! Jangan sampai mengubah atau menghapus Jenjang sembarangan, karena dapat mempengaruhi materi dan soal!!</small>

                            <div class="card-body p-0">

                                <div class="table-responsive p-3">

                                    <table class="table" id="Kategori">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-1">No</th>
                                                <th class="border-1">Id</th>
                                                <th class="border-1">Kategori</th>
                                                <th class="border-1">Date Created</th>
                                                <th class="border-1">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $query = $this->db->get('kategori');
                                            foreach ($query->result_array() as $row) { ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row['id_kategori']; ?></td>
                                                        <td><?= $row['nama_kategori']; ?></td>
                                                        <td><?= $row['date_created'];?></td>
                                                        <td>
                                                            <a href="<?= base_url('admin/delete_kategori/') . $row['id_kategori']; ?>">
                                                                <button onclick="return confirm('Are you sure want to delete this data?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                            </a>
                                                            <a href="<?= base_url('admin/update_kategori/') . $row['id_kategori']; ?>">
                                                                <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
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


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                <h5 class="card-header mt-3">Mejapintar | Kategori 
                    <a href="<?= base_url('admin/create_sub'); ?>" class="btn btn-info float-right mr-2">
                    <i class="fas fa-plus mr-1"></i>Sub</a>
                </h5>
                            
                            <div class="card-body p-0">

                                <div class="table-responsive p-3">

                                    <table class="table" id="Sub">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-1">No</th>
                                                <th class="border-1">Id</th>
                                                <th class="border-1">Jenjang</th>
                                                <th class="border-1">Date Created</th>
                                                <th class="border-1">Kategori</th>
                                                <th class="border-1">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $query = $this->db->query('SELECT * FROM kategori INNER JOIN sub_kategori ON kategori.id_kategori = sub_kategori.id_kategori');
                                            
                                            foreach ($query->result_array() as $row) { ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row['id_sub']; ?></td>
                                                        <td><?= $row['nama_kategori']; ?></td>
                                                        <td><?= $row['date_created2'];?></td>
                                                        <td><?= $row['sub_kategori']; ?></td>   
                                                        <td>
                                                            <a href="<?= base_url('admin/delete_sub/') . $row['id_sub']; ?>">
                                                                <button onclick="return confirm('Are you sure want to delete this data?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                            </a>
                                                            <a href="<?= base_url('admin/update_sub/') . $row['id_sub']; ?>">
                                                                <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
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



            </div>
        
    </div>