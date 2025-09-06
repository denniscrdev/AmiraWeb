
</div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/lib/chart/chart.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/lib/easing/easing.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/lib/waypoints/waypoints.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/DataTables/datatables.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/funciones.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/plugins/sweetalert2.all.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/plugins/notiflix-3.2.6.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/botones-perzonalizados.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/ckeditor.js"></script>
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
<!-- general -->
    <?php if (!empty($data['script'])) { ?>
        <script src="<?php echo BASE_URL; ?>assets/js/modules/<?php echo $data['script']; ?>"></script>
    <?php } ?> 

</body>

</html>