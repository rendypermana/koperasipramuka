<?php $this->load->view('adminlayout/top_menu') ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Detail Transaksi Pinjaman</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-dashboard"></i></a></li>
            <li><i class="fa fa-briefcase"></i> Transaksi Pinjaman</li>
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
                        <?=$pinjaman->kwarran?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;"><label>No Gudep</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?=$pinjaman->no_gudep?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;"><label>Nama Anggota</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?=$pinjaman->nama_users?>
                    </td>
                </tr>
                <tr>  
                    <td style="width: 200px;"><label>Telp</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?=$pinjaman->telp?>
                    </td>
                </tr>
                 <tr>  
                    <td style="width: 200px;"><label>Besar Pinjaman</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                      	Rp. <?= number_format($pinjaman->jml_pinjaman,0,',','.') ?>  
                    </td>
                </tr>
                 <tr>  
                    <td style="width: 200px;"><label>Bunga</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                       <?=$pinjaman->bsr_bunga?> %
                    </td>
                </tr>
                <tr>  
                    <td style="width: 200px;"><label>Lama Angsuran</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                       <?=$pinjaman->lama_angsuran?> Bulan
                    </td>
                </tr>
                <tr>  
                    <td style="width: 200px;"><label>Tanggal Pinjam</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                       <?=$pinjaman->tgl?>
                    </td>
                </tr>
                <tr>  
                    <td style="width: 200px;"><label>Total Bunga</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                       <?php
                        $a = $pinjaman->bsr_bunga;
                       	$b = $pinjaman->jml_pinjaman;
                       	$x = ($b * $a)/100;
                       	$bunga = number_format($x,0,',','.');
                       	echo "Rp. $bunga";
                       ?>
                    </td>
                </tr>
                <tr>  
                    <td style="width: 200px;"><label>Angsuran Perbulan</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                       <?php 
                       	//total bunga
                       	$a = $pinjaman->bsr_bunga; //bunga pinjaman
                       	$b = $pinjaman->jml_pinjaman; //besar pinjaman
                       	$x = ($b * $a)/100;
                       	//total bunga dibagi lama angsuran
                       	$c = $pinjaman->lama_angsuran; //lama angsuran
                       	$tot_bunga = $x / $c;
                       	//jumlah pinjaman dibagi lama angsuran
                       	$p = $b / $c;
                       	$pz = round($p,-2);
                       	$z = $tot_bunga + $pz;
                       	$u = round($z,-2);

                       	$angsuran = number_format($u,0,',','.');
                       	echo"Rp. $angsuran ";
                       ?>
                    </td>
                </tr>
                 <tr>  
                    <td style="width: 200px;"><label>Status</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                       <?=$pinjaman->status?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <?php echo anchor ('pinjaman/ubah/'. $pinjaman->id_pinjaman, 'Edit', ['class' =>'btn btn-warning']);?>
                        <?php echo anchor ('pinjaman/hapus/'. $pinjaman->id_pinjaman, 'Hapus', ['class' =>'btn btn-danger', 'onclick'=>'return confirm(\'Apakah Anda yakin akan menghapus data ini?\')']);?>
                        
                </tbody>

            </table>
    </div>
</div>
<?php $this->load->view('adminlayout/down_menu') ?>