<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? $title : 'CISHOP' ?> - Online Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/owl-carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body>

    <!-- Navbar -->
    <?php $this->load->view('layouts/user/_navbar') ?>
    <!-- End Navbar -->

    <!-- Content -->
    <?php $this->load->view($page) ?>
    <!-- End Content -->

    <!-- Footer -->
    <div class="mt-3">
        <footer class="text-dark bg-light">
            <div class="container pt-5 pb-3">
                <h4 class="font-weight-bold">NOMADENSTUFF</h4>
                <div class="row">
                    <div class="col-lg-5 col-sm-12 mb-3">
                        <div style="text-align: justify;">
                            <p>NOMADENSTUFF adalah sebuah toko thrifting yang menawarkan berbagai pilihan pakaian dengan
                                konsep unik dan berbeda. Kami mengkhususkan diri dalam menyediakan pakaian bekas
                                berkualitas
                                tinggi dengan harga terjangkau.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 mb-3">
                        <style>
                            a {
                                color: black;
                                text-decoration: none;
                            }

                            a:hover {
                                color: gray;
                                text-decoration: none;
                            }
                        </style>
                        <div class="row">
                            <div class="col">
                                <a href="https://shopee.co.id/nomadenstuff_?smtt=0.0.9" class="text-dark mr-3">
                                    <!-- <i class="fa-solid fa-location-dot"></i> -->
                                    Jl. Taman Siswa, Sekaran, Gunung Pati, Kota Semarang, Jawa Tengah 50229
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12 mb-3">
                        <div class="row">
                            <div class="col">
                                <a href="https://www.instagram.com/nomadenstuff?igsh=YzVkODRmOTdmMw==" class="text-dark mr-3">
                                    <i class="fab fa-instagram"></i> @nomadenstuff
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a href="https://wa.me/6288229889507" class="text-dark mr-3">
                                    <i class="fab fa-whatsapp"></i> +62 88 2298-89507
                                </a>
                            </div>
                        </div>

                        <!-- <a href="" class="text-white mr-3">
                                <i class="fab fa-facebook-f">

                                </i>
                            </a> -->
                        <!-- <a href="" class="text-white mr-3">
                                <i class="fab fa-twitter">

                                </i>
                            </a> -->
                        <!-- <a href="" class="text-white mr-3">
                                <i class="fab fa-linkedin-in"></i>
                            </a> -->
                        <!-- <a href="" class="text-white mr-3">
								<i class="fab fa-youtube"></i>
							</a> -->
                    </div>
                </div>
            </div>
            <div class="mt-1 border-top">
                <div class="container mt-3">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-lg-6 col-sm-12">
                            <p><strong>&copy; 2024 All Reserved Alfaturachman Maulana Pahlevi</strong></p>
                        </div>
                        <!-- <div class="col-lg-6 col-sm-12">
							<a href="" class="text-white">Developer [nfl_glbrnn]</a> |
							<a href="" class="text-white">Kebijakan Privasi</a> |
							<a href="" class="text-white">Persyaratan & Ketentuan</a>
						</div> -->
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- End Footer -->


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/owl-carousel/owl.carousel.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#owl-demo").owlCarousel({

                navigation: true, // Show next and prev buttons
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,

                slideSpeed: 300,
                paginationSpeed: 400,

                items: 1,
                itemsDesktop: false,
                itemsDesktopSmall: false,
                itemsTablet: false,
                itemsMobile: false

            });

        });
    </script>
</body>

</html>