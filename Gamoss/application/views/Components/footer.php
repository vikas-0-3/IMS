

<footer class="footer">
  <div class="container footer--flex">
    <div class="footer-start">
      <p>2021 © <?= $this->config->item('website_name') ?> ERP </p>
    </div>
    <!-- <ul class="footer-end">
      <li><a href="##">About</a></li>
      <li><a href="##">Support</a></li>
      <li><a href="##">Puchase</a></li>
    </ul> -->
  </div>
</footer>
  </div>
</div>

<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>



<script type="application/javascript">

$(document).ready( function () {
    $('#myTable').DataTable();
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.check').each(function(){
                this.checked = true;
            });
        }else{
             $('.check').each(function(){
                this.checked = false;
            });
        }
    });
} );


/** After windod Load */
$(window).bind("load", function() {
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 2000);
});

</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>

<!-- Chart library -->
<script src="<?= base_url(); ?>asset/plugins/chart.min.js"></script>
<!-- Dropzone JS -->
<script src="<?= base_url(); ?>asset/plugins/dropzone/dropzone.js"></script>
<!-- Icons library -->
<script src="<?= base_url(); ?>asset/plugins/feather.min.js"></script>
<!-- Quill library -->
<script src="<?= base_url(); ?>asset/plugins/quill.js"></script>
<!-- Custom scripts -->
<script src="<?= base_url(); ?>asset/js/script.js"></script>


</body>

</html>