<?php $this->load->view('adminlayout/top_menu') ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Tambah Kwarran</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>index.php/utama"><i class="fa fa-dashboard"></i></a> </li>
            <li><?php echo anchor('kwarran','<i class="fa fa-fw fa-tag"></i> Kwarran')?></li>
        </ol>

    </div>
</div>

<div class="row">
    <div class="col-lg-12">    
        <div><?= validation_errors() ?></div>                  
        <?= form_open_multipart('kwarran/tambah', ['role'=>'form']) ?>
            <table class="table-responsive table">

                <tbody>
                <tr>
                    <td style="width: 200px;"><label>Kwarran</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" value="" name="kwarran" class="form-control">
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
<?php $this->load->view('adminlayout/down_menu') ?>