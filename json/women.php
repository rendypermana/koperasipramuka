<?php
include "koneksi.php";
/* grab the posts from the db */
$query  ="SELECT * from women";
$result = mysql_query($query);
while ($r = mysql_fetch_assoc($result)) {
    $rows[] = $r;
}
echo json_encode($rows);
?>