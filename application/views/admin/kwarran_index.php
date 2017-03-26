<?php $this->load->view('adminlayout/top_menu') ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Kwarran</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-dashboard"></i></a></li>
            <li><i class="fa fa-users"></i> Kwarran</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <?php echo anchor('kwarran/tambah','+ Tambah Data Baru', ['class'=>'btn btn-primary'])?>
        </div>
        <div class="table-responsive">
            <?=$this->session->flashdata('add')?>
            <?=$this->session->flashdata('edit')?>
            <?=$this->session->flashdata('delete')?>
            <table class="table table-hover data-table table-striped tablesorter">
                <thead>
                <tr>
                    <th class="header" style="width: 40px;">No</th>
                    <th class="header">Kwarran</th>
                    <th class="header">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    foreach($kwarrans as $kwarran) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?=$kwarran->kwarran?></td>
                        <td>
                            <?php echo anchor ('kwarran/ubah/'. $kwarran->id_kwarran, 'Edit', ['class' =>'btn btn-warning']);?>
                            <?php echo anchor ('kwarran/hapus/'. $kwarran->id_kwarran, 'Hapus', ['class' =>'btn btn-danger', 'onclick'=>'return confirm(\'Apakah Anda yakin akan menghapus data ini?\')']);?>
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