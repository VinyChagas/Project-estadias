<?php
include 'includes/head.php'
?>

<body>
    <?php include 'includes/header.php' ?>

    <style>
        /* Estilos para a div de categorias */
        .categoria-container {
            display: flex;
            overflow-x: auto;
            align-items: center;
            justify-content: center;
            -webkit-overflow-scrolling: touch;
            width: 100%;
            /* Adiciona suporte para touch em dispositivos iOS */
            scrollbar-width: none;
            /* Remove a barra de rolagem padrão */
            -ms-overflow-style: none;
            background-color: white;
            /* Remove a barra de rolagem padrão no IE */
        }

        .categoria-container::-webkit-scrollbar {
            display: none;
            /* Remove a barra de rolagem padrão no Chrome e no Safari */
        }

        .categoria {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
            /* Garante que as categorias não sejam redimensionadas */
            width: 100px;
            /* Largura padrão de cada categoria */
            height: 70px;
            /* Altura padrão de cada categoria (incluindo o ícone) */
            /* Cor de fundo das categorias */
            cursor: pointer;
            margin-right: 10px;
            /* Margem direita entre as categorias */
        }

        .categoria span {
            margin-top: 5px;
        }

        .categoria .icone {
            font-size: 30px;
            /* Tamanho do ícone */
            margin-bottom: 8px;
            /* Margem inferior entre o ícone e o texto */
        }
    </style>
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="row">

                <div class="col-xl-10 col-lg-11 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <h3>Nos diga o que você procura</h3>
                        <form action="#">
                            <div class="check-date">
                                <input name="quisas" placeholder="Categoria" list="opcoes-pesquisa" style="border-color: black;" type="text" class="" id="date-in">
                                <datalist id="opcoes-pesquisa">
                                </datalist>
                                <i class="arrow_move"></i>
                            </div>
                            <div class="row">
                                <div class="check-date col-md-4">
                                    <input name="quisas" placeholder="Estado" list="opcoes-pesquisa" style="border-color: black;" type="text" class="" id="date-in">
                                    <datalist id="Estado">
                                    </datalist>
                                    <i class="arrow_move"></i>
                                </div>
                                <div class="check-date  col-md-8">
                                    <input placeholder="cidade" name="quisas" list="opcoes-pesquisa" style="border-color: black;" type="text" class="" id="date-in">
                                    <datalist id="cidade">
                                    </datalist>
                                    <i class="arrow_move"></i>
                                </div>
                            </div>

                            <button type="submit" onclick="event.preventDefault(); buscardados();">Pesquisar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="./img/hero/hero-1.jpg"></div>
            <div class="hs-item set-bg" data-setbg="./img/hero/hero-2.jpg"></div>
            <div class="hs-item set-bg" data-setbg="./img/hero/hero-3.jpg"></div>
        </div>
    </section>
    <!-- Home Room Section Begin -->
    <div class="breadcrumb-section">
        <div class="container_fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <div class="container_fluid" id="categoria-container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- Breadcrumb Section End -->
                                    <div class="categoria-container" id="categoria_container_inner">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row" id="estadias">
            </div>
        </div>
    </section>
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <div class="bt-option">
                            <a href="rooms.php">
                                <span>Veja mais Locais disponiveis.</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Home Room Section End -->

    <!-- Services Section End -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Vantagens</span>
                        <h2>Por que nos contratar ?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-036-parking"></i>
                        <h4>Localização</h4>
                        <p>Aqui serão descritos os pontos de pq contratarem, voces, como por exemplo> preços,
                            locais,
                            acessibilidade, coniabilidade e etc...</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-033-dinner"></i>
                        <h4>Alimentação </h4>
                        <p>Aqui serão descritos os pontos de pq contratarem, voces, como por exemplo> preços,
                            locais,
                            acessibilidade, coniabilidade e etc...</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-026-bed"></i>
                        <h4>Conforto</h4>
                        <p>Aqui serão descritos os pontos de pq contratarem, voces, como por exemplo> preços,
                            locais,
                            acessibilidade, coniabilidade e etc...</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-024-towel"></i>
                        <h4>Segurança</h4>
                        <p>Aqui serão descritos os pontos de pq contratarem, voces, como por exemplo> preços,
                            locais,
                            acessibilidade, coniabilidade e etc...</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-044-clock-1"></i>
                        <h4>Atendimento</h4>
                        <p>Aqui serão descritos os pontos de pq contratarem, voces, como por exemplo> preços,
                            locais,
                            acessibilidade, coniabilidade e etc...</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-012-cocktail"></i>
                        <h4>Elegancia</h4>
                        <p>Aqui serão descritos os pontos de pq contratarem, voces, como por exemplo> preços,
                            locais,
                            acessibilidade, coniabilidade e etc...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Avaliações</span>
                        <h2>O que nossos clientes dizem?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="testimonial-slider owl-carousel">
                        <div class="ts-item">
                            <p>Depois que um projeto de construção demorou mais do que o esperado, meu marido, minha
                                filha e eu
                                precisava de um lugar para ficar por algumas noites. Como residentes de Chicago,
                                sabemos
                                muito sobre nossa
                                cidade, bairro e os tipos de opções de moradia disponíveis e absolutamente amo nosso
                                férias no Sona Hotel</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - Alexander Vasquez</h5>
                            </div>
                            <img src="img/testimonial-logo.png" alt="">
                        </div>
                        <div class="ts-item">
                            <p>Depois que um projeto de construção demorou mais do que o esperado, meu marido, minha
                                filha e eu
                                precisava de um lugar para ficar por algumas noites. Como residentes de Chicago,
                                sabemos
                                muito sobre nossa
                                cidade, bairro e os tipos de opções de moradia disponíveis e absolutamente amo nosso
                                férias no Sona Hotel</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - Alexander Vasquez</h5>
                            </div>
                            <img src="img/testimonial-logo.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ft-about">
                            <div class="logo">
                                <a href="#">
                                    <img src="img/footer-logo.png" alt="">
                                </a>
                            </div>
                            <p>Inspiramos e alcançamos milhões de viajantes<br /> em 90 sites locais</p>
                            <div class="fa-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-contact">
                            <h6>Contact Us</h6>
                            <ul>
                                <li>(12) 345 67890</li>
                                <li>marcosmachadodev@gmail.com</li>
                                <li>856 Cordia Extension Apt. 356, Lake, United State</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-newslatter">
                            <h6>New latest</h6>
                            <p>Get the latest updates and offers.</p>
                            <form action="#" class="fn-form">
                                <input type="text" placeholder="Email">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <ul>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Terms of use</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Environmental Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-5">
                        <div class="co-text">
                            <p>
                                <!-- Link back to marcosmachadodev can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This
                                template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://marcosmachadodev.com" target="_blank">marcosmachadodev</a>
                                <!-- Link back to marcosmachadodev can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/axiosbase.js"></script>
    <script src="js/funcoes_stays_home.js"></script>
</body>

</html>