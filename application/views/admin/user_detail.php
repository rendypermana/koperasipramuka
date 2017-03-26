<?php $this->load->view('adminlayout/top_menu') ?>
<?php /*
    $id_users    = $users->id_users;
if($this->input->post('is_submitted')){
    $id_users         = set_value('id_users');
    $id_kwarran       = set_value('id_kwarran');
    $no_gudep         = set_value('no_gudep');
    $nama_users       = set_value('nama_users');

} else {
    $id_suplaier      = set_value('id_suplaier');
    $kode_brg_masuk   = set_value('kode_brg_masuk');
    $nama_barang      = set_value('nama_barang');
    $telp             = set_value('telp');
}*/
?>
<div class="row">
    <div class="col-lg-12">
        <h1>Detail Anggota</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-dashboard"></i></a></li>
            <li><?php echo anchor('users','<i class="fa fa-fw fa-users"></i> Anggota')?></li>
        </ol>

    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div><?= validation_errors() ?></div>    
            <table class="table-responsive table">

                <tbody>
                <tr>
                    <td style="width: 200px;"><label>Kwarran</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?=$users->kwarran?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;"><label>No Gudep</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?=$users->no_gudep?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;"><label>Nama Anggota</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?=$users->nama_users?>
                    </td>
                </tr>
                 <tr>  
                    <td style="width: 200px;"><label>Email</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?=$users->email?>
                    </td>
                </tr>
                <tr>  
                    <td style="width: 200px;"><label>Telp</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?=$users->telp?>
                    </td>
                </tr>
                 <tr>  
                    <td style="width: 200px;"><label>Alamat</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?=$users->alamat?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <?php echo anchor ('users/update/'. $users->id_users, 'Edit', ['class' =>'btn btn-warning']);?>
                        <?php echo anchor ('users/delete/'. $users->id_users, 'Hapus', ['class' =>'btn btn-danger', 'onclick'=>'return confirm(\'Apakah Anda yakin akan menghapus data ini?\')']);?>
                        
                </tbody>

            </table>
    </div>
</div>
<?php $this->load->view('adminlayout/down_menu') ?>