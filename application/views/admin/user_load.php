Pilih Siswa : 
<select name="id_users" id="id_users">
    <?php
    if(count($user->result_array())>0)
    {
        echo "<option>- Pilih Nama Siswa -</option>";
        foreach($user->result_array() as $k)
        {
        echo "<option value='".$k['id_users']."'>Kelas ".$k['kwarran']." - ".$k['nama_users']."</option>";
        }
    }
    else{
        echo "<option>- Data Belum Tersedia -</option>";
    }
    ?>
</select>