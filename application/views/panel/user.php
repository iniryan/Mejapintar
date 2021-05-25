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
                                    <li class=" breadcrumb-item"><span>User</span></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end -->

            <!-- start -->

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Mejapintar | User</h5>
                            <div class="card-body p-0">
                                <div class="table-responsive p-3">

                                    <table class="table" id="User">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">No</th>
                                                <th class="border-0">Id</th>
                                                <th class="border-0">Username</th>
                                                <th class="border-0">Email</th>
                                                <th class="border-0">Role</th>
                                                <th class="border-0">Date Created</th>
                                                <th class="border-0">Status</th>
                                                <th class="border-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $query = $this->db->get('mejauser');
                                            foreach ($query->result_array() as $row) {
                                                if ($row['role'] != 1) { ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row['id_user']; ?></td>
                                                        <td><?= $row['username']; ?></td>
                                                        <td><?= $row['email']; ?></td>
                                                        <td><?php $role = $row['role'];
                                                                    if ($role != 1) echo "<div class='badge badge-light p-3'>User</div>";
                                                                    else echo "<div class='badge badge-light p-3'>Admin</div>"; ?></td>
                                                        <td><?= $row['date_created']; ?></td>
                                                        <td><?php $status = $row['activate'];
                                                                    if ($status == 1) echo "<div class='badge badge-light p-3'>Active</div>";
                                                                    else echo "<div class='badge badge-light p-3'>Blocked</div>"; ?></td>
                                                        <td><?php if ($role != 1) { ?>
                                                                <a href="<?= base_url('admin/delete_user/') . $row['id_user']; ?>">
                                                                    <button onclick="return confirm('Are you sure want to delete this account?')" class="btn btn-danger p-1"><i class="fa fa-trash"></i></button>
                                                                </a>
                                                                <a href="<?= base_url('admin/detail_user/') . $row['id_user']; ?>">
                                                                    <button class="btn btn-info p-1"><i class="fa fa-info p-1"></i></button>
                                                                </a>
                                                                <a href="<?= base_url('admin/block_user/') . $row['id_user']; ?>">
                                                                    <button onclick="return confirm('Are you sure want to block this account?')" class="btn btn-outline-warning p-1 btn-xs m-2">Block</button>
                                                                </a>
                                                                <a href="<?= base_url('admin/active_user/') . $row['id_user']; ?>">
                                                                    <button onclick="return confirm('Are you sure want to activate this account?')" class="btn btn-outline-success p-1 btn-xs m-2">Active</button>
                                                                </a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- end -->
        </div>
    
</div>