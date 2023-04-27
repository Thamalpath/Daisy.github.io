<style>
    .list-unstyled a:hover{
        color: #fff !important;
    }

    .abc{
        color: #fff !important;
    }

    .abc:hover{
        color: #ff6961 !important;
    }
</style>
    <!-- ======================= Footer ======================= -->
    <footer class="bg-dark text-white pt-3 footer">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <h4 style="color: #fff;">Category</h4>
                    <hr>
                    <ul class="list-unstyled text-secondary">
                        <li><a href="menswear.php" style="text-decoration: none; color: gray;">Men's Wear</a></li>
                        <li><a href="womenswear.php" style="text-decoration: none; color: gray;">Women's Wear</a></li>
                        <li><a href="kidswear.php" style="text-decoration: none; color: gray;">Kids Wear</a></li>
                        <li><a href="footwear.php" style="text-decoration: none; color: gray;">Foot Wear</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h4 style="color: #fff;">Quick Links</h4>
                    <hr>
                    <ul class="list-unstyled text-secondary">
                        <li><a href="index.php" style="text-decoration: none; color: gray;">Home</a></li>
                        <li><a href="about.php" style="text-decoration: none; color: gray;">About</a></li>
                        <li><a href="store.php" style="text-decoration: none; color: gray;">Store</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4 style="color: #fff;">Online Office Opening Hours</h4>
                    <hr>
                    <ul class="list-unstyled text-secondary">
                        <li>Mon-Fri : 9.00 AM to 5.30 PM</li>
                        <li>Saturday : 9.00 AM to 2.30 PM</li>
                        <li>Sunday : Closed</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h2 class="text-md-end">Daisy’s <span class="ft-text">Wardrobe</span> </h2>
                    <ul class="list-unstyled text-secondary text-md-end mt-4">
                        <li>111/2,Yatinuwara Veediya, Kandy</li>
                        <li>Tel: 070 111 2222</li>
                        <li>Email: daisywardrobe@gmail.com</li>
                    </ul>
                </div>
            </div>
            <hr>
            <!--  Social Link  -->
            <div class="row">
                <div class="col-md-4 social">
                    <h2>Call Us Today</h2>
                    <h1>+94 70 111 2222</h1>
                </div>
                <div class="col-md-4 d-flex flex-column justify-content-center align-items-center ">
                    <p class="py-2 px-3 follow fw-bold">Follow Us</p>
                    <div>
                        <a href="https://www.facebook.com" class="abc"><i class="bi bi-facebook footer-social"></i></a>
                        <a href="https://www.instagram.com" class="abc"><i class="bi bi-instagram footer-social"></i></a>
                        <a href="https://twitter.com/?lang=en" class="abc"><i class="bi bi-twitter footer-social"></i></a>
                        <a href="https://www.linkedin.com" class="abc"><i class="bi bi-linkedin footer-social"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <img class="img-fluid" src="resources/Icons/payment1.png" alt="">
                </div>
            </div>
        </div>
        <!--  copyright part  -->
        <div class="copyright py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <small>&copy; 2022 DAISY'S WARDROBE. ALL RIGHT RECEIVED.</small>
                    </div>
                    <div class="col-md-6">
                        <small class="text-md-end">USER LICENCE AGREMENT | PRIVACY POLICY | TERMS & CONDITION</small>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- isotope plugin -->
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>

<script src="assets/js/custom.js"></script>
<script src="assets/js/jquery-1.10.2.min.js"></script>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/jquery-ui.js"></script>

<!-- Alertify JS -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>

    alertify.set('notifier','position', 'top-right');
    <?php 
        if(isset($_SESSION['message'])) 
        {  
            ?>
            alertify.success('<?= $_SESSION['message']; ?>');
            <?php
            unset($_SESSION['message']); 
        }    
    ?>
</script>

</body>

</html>