<?php $this->load->view('adminlayout/top_menu') ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Transaksi Simpanan</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-dashboard"></i></a></li>
            <li><i class="fa fa-files-o"></i> Transaksi Simpanan</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <?php echo anchor('simpanan/tambah','+ Tambah Data Baru', ['class'=>'btn btn-primary'])?>
        </div>
        <div class="table-responsive">
            <?=$this->session->flashdata('add')?>
            <?=$this->session->flashdata('edit')?>
            <?=$this->session->flashdata('delete')?>
            <table class="table table-hover data-table table-striped tablesorter">
                <thead>
                <tr>
                    <th class="header" style="width: 40px;">No</th>
                    <th class="header">Nama Anggota</th>
                    <th class="header">Kwarran</th>
                    <th class="header">No Gudep</th>
                    <th class="header">Besar Simpanan</th>
                    <th class="header">Tanggal</th>
                    <th class="header">Petugas Penerima</th>
                    <th class="header">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    foreach($simpanan as $simpanan) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?=$simpanan->nama_users?></td>
                        <td><?=$simpanan->kwarran?></td>
                        <td><?=$simpanan->no_gudep?></td>
                        <td>Rp. <?= number_format($simpanan->bsr_simpanan,0,',','.') ?></td>
                        <td><?=$simpanan->tgl?></td>
                        <td><?=$simpanan->penerima?></td>
                        <td>
                            <?php echo anchor ('simpanan/ubah/'. $simpanan->id_simpanan, 'Edit', ['class' =>'btn btn-warning']);?>
                            <?php echo anchor ('simpanan/hapus/'. $simpanan->id_simpanan, 'Hapus', ['class' =>'btn btn-danger', 'onclick'=>'return confirm(\'Apakah Anda yakin akan menghapus data ini?\')']);?>
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