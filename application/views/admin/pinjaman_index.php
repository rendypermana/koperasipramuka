<?php $this->load->view('adminlayout/top_menu') ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Transaksi Pinjaman</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-dashboard"></i></a></li>
            <li><i class="fa fa-briefcase"></i> Transaksi Pinjaman</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
    	<div class="form-group">
            <?php echo anchor('pinjaman/tambah','+ Tambah Data Baru', ['class'=>'btn btn-primary'])?>
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
                    <th class="header">No Gudep</th>
                    <th class="header">Besar Pinjaman</th>
                    <th class="header">Tanggal Pinjam</th>
                    <th class="header">Status</th>
                    <th class="header">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    foreach($pinjaman as $pinjaman) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?=$pinjaman->nama_users?></td>
                        <td><?=$pinjaman->no_gudep?></td>
                        <td>Rp. <?= number_format($pinjaman->jml_pinjaman,0,',','.') ?></td>
                        <td><?=$pinjaman->tgl?></td>
                        <td><?=$pinjaman->status?></td>
                        <td>
                            <?php echo anchor ('pinjaman/lihat/'. $pinjaman->id_pinjaman, 'Detail', ['class' =>'btn btn-info']);?>
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