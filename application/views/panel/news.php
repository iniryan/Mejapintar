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
                                    <li class=" breadcrumb-item"><span>News</span></li>
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
                            <h5 class="card-header mt-3">Mejapintar | News
                                <a href="<?= base_url('admin/create_news'); ?>" class="btn btn-info float-right mr-2">
                    <i class="fas fa-plus mr-1"></i>News</a>
                            </h5>
                            <div class="card-body p-0">
                                <div class="table-responsive p-3">

                                    <table class="table" id="News">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-1">No</th>
                                                <th class="border-1">Id</th>
                                                <th class="border-1">Tipe</th>
                                                <th class="border-1">Title</th>
                                                <th class="border-1">Date</th>
                                                <th class="border-1">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $query = $this->db->get('news');
                                            foreach ($query->result_array() as $row) { ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row['id_news']; ?></td>
                                                        <td class="text-capitalize"><?= $row['tipe']; ?></td>
                                                        <td><?= $row['judul']; ?></td>
                                                        <td><?= $row['date']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url('admin/detail_news/') . $row['id_news']; ?>">
                                                                <button class="btn btn-info"><i class="fa fa-info"></i></button>
                                                            </a>
                                                            <a href="<?= base_url('admin/update_news/') . $row['id_news']; ?>">
                                                                <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                                            </a>
                                                            <a href="<?= base_url('admin/delete_news/') . $row['id_news']; ?>">
                                                                <button onclick="return confirm('Are you sure want to delete this data?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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