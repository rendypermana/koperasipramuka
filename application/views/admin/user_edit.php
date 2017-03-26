<?php $this->load->view('adminlayout/top_menu') ?>
<?php
	$id_users       = $users->id_users;
if($this->input->post('is_submitted')){
	$id_kwarran = set_value('id_kwarran');
	$no_gudep	= set_value('no_gudep');
    $nama_users	= set_value('nama_users');
    $email      = set_value('email');
    $telp       = set_value('telp');
    $alamat		= set_value('alamat');

} else {
    $id_kwarran = set_value('id_kwarran');
	$no_gudep	= set_value('no_gudep');
    $nama_users	= set_value('nama_users');
    $email      = set_value('email');
    $telp       = set_value('telp');
    $alamat		= set_value('alamat');
}
?>
<div class="row">
    <div class="col-lg-12">
        <h1>Edit Anggota</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>index.php/utama"><i class="fa fa-dashboard"></i></a></li>
            <li><?php echo anchor('users','<i class="fa fa-fw fa-users"></i> Anggota')?></li>
        </ol>

    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    	<div><?= validation_errors() ?></div>    
        <?= form_open_multipart('users/update/'. $id_users) ?>
            <table class="table-responsive table">

                <tbody>
                <tr>  
                    <td style="width: 200px;"><label>Kwarran</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <div class="form-group">
                        <select class="form-control" id="exampleSelect1" name="id_kwarran">
                        <?php foreach($kwarran as $kwarran): ?>
                            <option value="<?=$kwarran->id_kwarran?>"><?=$kwarran->kwarran?></option>
                        <?php endforeach;?>
                        
                        </select>
                        </div>
                    </td>
                </tr>                <tr>
                    <td style="width: 200px;"><label>No Gudep</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" value="<?=$users->no_gudep?>" name="no_gudep" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;"><label>Nama Anggota</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" value="<?=$users->nama_users?>" name="nama_users" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;"><label>Email</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="email" value="<?=$users->email?>" name="email" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;"><label>Telp</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" value="<?=$users->telp?>" name="telp" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;"><label>Alamat</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" value="<?=$users->alamat?>" name="alamat" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <?php echo anchor ('users', 'Tampilkan Semua Anggota', ['class'=>'btn btn-warning']);?> </td>
                </tr>
                </tbody>

            </table>
        <?= form_close() ?>
    </div>
</div>

<?php $this->load->view('adminlayout/down_menu') ?>