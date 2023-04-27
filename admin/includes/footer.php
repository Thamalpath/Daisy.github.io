<footer class="footer pt-5">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="copyright py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <small>&copy; 2022 DAISY’S WARDROBE. ALL RIGHT RECEIVED.</small>
                        </div>
                        <div class="col-md-6">
                            <small class="text-md-end">USER LICENCE AGREMENT | PRIVACY POLICY | TERMS & CONDITION</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
    </main>

    <script src="assets/js/jquery-3.6.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/perfect-scrollbar.min.js"></script>
    <script src="assets/smooth-scrollbar.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="assets/js/custom.js"></script>

    <!-- Alertify JS -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        <?php 
            if(isset($_SESSION['message'])) 
            {  
                ?>
                alertify.set('notifier','position', 'top-right');
                alertify.success('<?= $_SESSION['message']; ?>');
                <?php
                unset($_SESSION['message']); 
            }    
        ?>
    </script>

</body>

</html>