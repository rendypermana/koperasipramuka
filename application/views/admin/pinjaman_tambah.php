<?php $this->load->view('adminlayout/top_menu') ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Tambah Transaksi Pinjaman</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-dashboard"></i></a></li>
            <li><i class="fa fa-briefcase"></i> Transaksi Pinjaman</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
    	<div><?= validation_errors() ?></div>                  
        <?= form_open_multipart('pinjaman/tambah', ['role'=>'form']) ?>
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
                     <td style="width: 200px;"><label>Users</label></td>
                     <td style="width: 1px;">:</td>
                   	<td>
                    <div id="kabupatenArea">

                    </div>

                    </td>
                </tr>
                <tr>
                     <td style="width: 200px;"><label>Besar Pinjaman</label></td>
                     <td style="width: 1px;">:</td>
                   	 <td>
                   		<input type="text" name="jml_pinjaman" value="" class="form-control">
                     </td>
                </tr>
                <tr>
                     <td style="width: 200px;"><label>Bunga (%)</label></td>
                     <td style="width: 1px;">:</td>
                   	 <td>
                   		<input type="text" name="bsr_bunga" value="" class="form-control">
                     </td>
                </tr>
                <tr>
                     <td style="width: 200px;"><label>Lama Angsuran (bulan)</label></td>
                     <td style="width: 1px;">:</td>
                   	 <td>
                   		<input type="text" name="lama_angsuran" value="" class="form-control">
                     </td>
                </tr>
                <tr>
                     <td style="width: 200px;"><label>Tanggal</label></td>
                     <td style="width: 1px;">:</td>
                   	 <td>
						<input type="text" name="tgl" class="form-control datepicker" id="tanggal" date="tanggal">
                     </td>
                </tr>
                
               
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <?php echo anchor ('pinjaman', 'Tampilkan Semua Pinjaman', ['class'=>'btn btn-warning']);?> </td>
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