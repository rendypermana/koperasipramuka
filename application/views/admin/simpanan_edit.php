<?php $this->load->view('adminlayout/top_menu') ?>
<?php
    $id_simpanan       = $simpanan->id_simpanan;
if($this->input->post('is_submitted')){
    $id_kwarran       = set_value('id_kwarran');
    $id_users         = set_value('id_users');
    $bsr_simpanan     = set_value('bsr_simpanan');
    $tgl          	  = set_value('tgl');
    $penerima         = set_value('penerima');

} else {
    $id_kwarran       = set_value('id_kwarran');
    $id_users         = set_value('id_users');
    $bsr_simpanan     = set_value('bsr_simpanan');
    $tgl          	  = set_value('tgl');
    $penerima         = set_value('penerima');
}
?>
<div class="row">
    <div class="col-lg-12">
        <h1>Edit Transaksi Simpanan</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>index.php/utama"><i class="fa fa-dashboard"></i></a></li>
            <li><?php echo anchor('barang','<i class="fa fa-fw fa-files-o"></i> Transaksi Simpanan')?></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div><?= validation_errors() ?></div>    
        <?= form_open_multipart('simpanan/ubah/'. $id_simpanan) ?>
            <table class="table-responsive table">

                <tbody>
                <tr>
                    <td style="width: 200px;"><label>Kwarran</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <select id="propinsi" onchange="loadKabupaten()" class="form-control" name="id_kwarran">
                		<?php
                		echo "<option>-Pilih Kwarran-</option>";
                		foreach ($propinsi->result() as $p) {
                    	echo "<option value='$p->id_kwarran'>$p->kwarran</option>";
                		}
                		?>
            			</select>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;"><label>Anggota</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <div id="kabupatenArea">

                    </div>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td style="width: 200px;"><label>Besar Simpanan</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" value="<?=$simpanan->bsr_simpanan?>" name="bsr_simpanan" class="form-control">
                    </td>
                </tr>
                <tr>
                     <td style="width: 200px;"><label>Tanggal</label></td>
                     <td style="width: 1px;">:</td>
                   	 <td>
						<input type="text" name="tgl" class="form-control datepicker" id="tanggal" date="tanggal" value="<?=$simpanan->tgl?>">

                    	<?php 
                        $user=$this->session->userdata('nama_users');
                        ?>
                    	<input type="hidden" name="penerima" value="<?php echo $user?>" class="form-control">
                     </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <?php echo anchor ('kwarran', 'Tampilkan Semua Kwarran', ['class'=>'btn btn-warning']);?> </td>
                </tr>
                </tbody>

            </table>
        <?= form_close() ?>

    </div>
</div>

<script>
    $('.datepicker').pickadate({
  	weekdaysFull: ['minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
  	monthsFull: ['Januari', 'Februari', 'Maret', 'April', 'Mai', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
  	// Buttons
	today: 'Sekarang',
	clear: 'Bersihkan',
	close: 'Tutup',
	format: 'd mmmm yyyy',
  	showWeekdaysFull: true,
  	showMonthsFull: true
	})
</script>
<?php $this->load->view('adminlayout/down_menu') ?>