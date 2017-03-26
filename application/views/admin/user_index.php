<?php $this->load->view('adminlayout/top_menu') ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Anggota</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-dashboard"></i></a></li>
            <li><i class="fa fa-users"></i> Anggota</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <?php echo anchor('users/create','+ Tambah Data Baru', ['class'=>'btn btn-primary'])?>
        </div>
        <div class="table-responsive">
            <?=$this->session->flashdata('add')?>
            <?=$this->session->flashdata('delete')?>
            <table class="table table-hover data-table table-striped tablesorter">
                <thead>
                <tr>
                    <th class="header" style="width: 40px;">No</th>
                    <th class="header">Kwarran</th>
                    <th class="header">No Gudep</th>
                    <th class="header">Nama Anggota</th>
                    <th class="header">Telp</th>
                    <th class="header">Status</th>
                    <th class="header">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    foreach($users as $users) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?=$users->kwarran?></td>
                        <td><?=$users->no_gudep?></td>
                        <td><?=$users->nama_users?></td>
                        <td><?=$users->telp?></td> 
                        <td>
                            <?php 
                            $pengguna = $users->group;
                            if($pengguna == 1){
                                echo "<p class='alert-info'>Pengurus</p>";
                            }elseif($pengguna == 2){
                                echo "Aktif";
                            }else{
                                echo "Tidak Aktif";
                            }

                            ?>
                        </td>
                        <td>
                            <?php 
                            $pengguna = $users->group;
                            if($pengguna == 0)
                            {
                                echo anchor ('users/lihat/'. $users->id_users, 'Detail', ['class' =>'btn btn-info']);
                                echo ' ';
                                echo anchor ('users/aktifkan/'. $users->id_users, 'Aktifkan', ['class' =>'btn btn-success']);
                            }else{
                                echo anchor ('users/lihat/'. $users->id_users, 'Detail', ['class' =>'btn btn-info']);
                            }
                            
                            ?>
                        </td>     
                    </tr>
                <?php
                    $no++;
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->load->view('adminlayout/down_menu') ?>