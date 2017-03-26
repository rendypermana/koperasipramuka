        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

<!-- Data Tables JavaScript -->
<script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>

<!-- TinyMCE JavaScript -->
<script src="<?php echo base_url() ?>assets/tinymce/tinymce.min.js"></script>



<script type="text/javascript">
    tinymce.init({
        selector: ".editor"
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $(".data-table").DataTable({

            "language": {
                "emptyTable": "Tidak ada data"
            }
        });
    });

</script>

<script>
   /* tinymce.init({
    selector: "textarea",
    height: 350,
        plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });*/
</script> 



<script type="text/javascript">
  function loadKabupaten()
            {
                var propinsi = $("#propinsi").val();
                $.ajax({
                    type:'GET',
                    url:"<?php echo base_url(); ?>index.php/simpanan/kabupaten",
                    data:"id_kwarran=" + propinsi,
                    success: function(html)
                    { 
                       $("#kabupatenArea").html(html);
                    }
                }); 
            }
</script>



</body>

</html>