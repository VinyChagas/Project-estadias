<?php include 'includes/head_stay.php' ?>


<body>

    <body>

        <?php include 'includes/header.php' ?>
        <style>
            @font-face {
                font-family: "CastoroTitling";
                src: url("https://s3.us-east-2.amazonaws.com/cdn.spotlessplace.com/wp-content/CastoroTitling-Regular.ttf") format("truetype");
            }

            @font-face {
                font-family: BraahOne;
                src: url("https://s3.us-east-2.amazonaws.com/cdn.spotlessplace.com/wp-content/Merriweather-Regular.ttf");
            }


            @keyframes zoom {
                0% {
                    transform: scale(1);
                }

                50% {
                    transform: scale(1.2);
                }

                100% {
                    transform: scale(1);
                }
            }


            .main {
                background-color: white;
                aspect-ratio: 13/16;
                width: 400px;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                border-radius: 30px;
                backdrop-filter: blur(4px);
                border: 1px solid rgba(255, 255, 255, 0.3);
                overflow: hidden;
                transition: transform 1s ease, width 1s ease;
            }

            .main:hover {
                width: 410px;
            }

            .header {
                color: #fff;
                display: flex;
                padding: 20px;
                align-items: center;
            }

            #pfpname {
                transition: letter-spacing 0.3s ease;
            }

            #pfpname:hover {
                letter-spacing: 2px;
            }

            .notifications {
                background: #2796db;
                border-radius: 100%;
                aspect-ratio: 1;
                width: 25px;
                display: flex;
                justify-content: center;
                align-items: center;
                margin-left: 5px;
                cursor: pointer;
                transition: transform 2s ease;
            }

            .notifications:hover {
                transition: transform 2s ease;
            }

            .header .pfp {
                aspect-ratio: 1;
                width: 40px;
                border-radius: 100%;
                cursor: pointer;
                transition: transform 1s ease;
            }

            .pfp:hover {
                transform: scale(1.2);
            }

            .header .center {
                display: flex;
                justify-content: center;
                text-align: center;
                width: 100%;
            }

            .header .center div p {
                margin: 0;
                font-weight: 700;
            }

            .footer {
                width: 100%;
                height: 100px;
                position: fixed;
                bottom: 0;
                display: inline-flex;
                align-items: center;
            }

            .text-box {
                float: right;
                border-radius: 100px;
                border: 1px solid black;
                background: none;
                padding: 8px 10px;
                width: 65%;
                outline: none;
                color: black;
                transition: transform 1s ease, width 1s ease;
            }

            .text-box:hover {
                width: 75%;
            }

            .send-ico {
                color: #fff;
                position: absolute;
                right: 0;
                background: #2796db;
                border-radius: 100%;
                margin-right: 15px;
                margin-top: 3px;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 13px;
                cursor: pointer;
            }

            .text-box::placeholder {
                color: #c6c6c6;
                font-family: BraahOne;
            }

            .content_chat {
                width: 100%;
                bottom: 100px;
                position: absolute;
                height: 300px;
                text-align: center;
                color: white;
                overflow: auto;
            }

            .msg-btn {
                color: #fff;
                word-wrap: break-word;
                border-radius: 8px;
                display: inline-block;
                max-width: 100%;
                font-size: 14px;
                font-family: "BraahOne";
            }

            .msg-btn p {
                padding: 10px 15px;
                margin: 0;
            }

            .msg-btn-holder {
                padding-bottom: 30px;
                width: 100%;
                margin-top: 10px;
            }

            .receiver-msg {
                background: #4c4c4c;
                float: left;
                color: white;
            }

            .sender-msg {
                background: #2798fc;
                float: right;
                color: white;

            }

            @keyframes rotate {
                from {
                    rotate: 0deg;
                }

                50% {
                    scale: 1 1.5;
                }

                to {
                    rotate: 360deg;
                }
            }
        </style>
        <!-- Header End -->

        <!-- Hero Section Begin -->
        <section class="hero-section">
            <div class="container">
                <div class="row">
                    <div class="booking-form" style="width: 100%!important; padding: 0!important;">
                        <h3 id="" style="font-weight: bold;"><img style="width: 45px;" src="img/localization.png" alt="">
                            Otíma Localização</h3>
                        <div class="hr-text">

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <!-- Gallery -->
                        <div class="row" id="imgs_locate">
                        </div>
                        <!-- Gallery -->
                    </div>

                </div>
            </div>
            <div class="container" style="justify-content: center; align-items: center;">
                <div class="row">

                    <div class="col-xl-6 col-lg-6" style="width: 100%!important; padding: 5px!important;">
                        <div class="booking-form" style="width: 100%!important; padding: 0!important;">
                            <h3 id="locateName">Nome do local</h3>
                            <div class="hr-text">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Capacidade: </td>
                                            <td id="capacidade"></td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Serviços:</td>
                                            <td id="servicos">Wifi, Televisão, Hidro ,...</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <br>
                            <p id="descricao" style="text-align: justify;">
                                Lugar aconchegante, super recomendado para passar uma pequena temporada para descançar e
                                desacelerar. .</p> <br>
                            <!-- <button class="btn btn-success" style="width: 100%;">Reservar.</button> -->
                        </div>
                    </div>
                    <div class="col-xl-1 col-lg-1">

                    </div>
                    <div class="col-xl-5 col-lg-5" style="margin-top: 25px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; padding: 15px;">
                        <div class="container">
                            <div class="booking-form" style="width: 100%!important; padding: 0!important;">

                                <div class="hr-text">
                                    <div class="checkinForom">
                                        <form method="post" action="reservar.php">
                                            <input type="text" id="id_stay" name="id_stay" hidden>
                                            <input type="text" id="price_day" name="price_day" hidden>
                                            <input type="text" id="valorFInal" name="valorFInal" hidden>
                                            <input type="text" id="taxa" name="taxa" hidden>
                                            <input type="text" id="taxaLimpeza" name="taxaLimpeza" hidden>
                                            <input type="text" id="quantidade_dias" name="quantidade_dias" hidden>
                                            <input type="text" id="rezerva" name="rezerva" hidden>
                                            <input type="text" id="preco_sem_taxa" name="preco_sem_taxa" hidden>
                                            <div class="check-date">
                                                <label for="date-in">Data do Check In:</label>
                                                <input type="date" name="date-in" class="date-in" id="date-in">
                                                <!-- <i class="icon_calendar"></i> -->
                                            </div>
                                            <div class="check-date">
                                                <label for="date-out">Data do Check Out:</label>
                                                <input type="date" name="date-out" class="date-in" id="date-out">
                                                <!-- <i class="icon_calendar"></i> -->
                                            </div>
                                            <p>Sua reserva Fica:</p>
                                            <div id="prices">

                                            </div>
                                            <h3 style="color: green;" id="precoComum"><span></span></h3>
                                            <button disabled type="submit" id="calcular">Reservar</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>


        <section class="blog-details-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-1">
                        <div class="blog-details-text">
                            <div class="bd-title">
                            </div>
                            <div class="comment-option">
                                <h4>2 Comentários</h4>
                                <div class="single-comment-item first-comment">
                                    <div class="sc-author">
                                        <img src="img/blog/blog-details/avatar/avatar-1.jpg" alt="">
                                    </div>
                                    <div class="sc-text">
                                        <span>27 Maio 2022</span>
                                        <h5>Brandon Kelley</h5>
                                        <p>Muito interesante o texto abordado, realmente quando fui viajar percebi uma
                                            dificuldade com os pontos abordados no post..</p>
                                        <a href="#" class="comment-btn">Gostei</a>
                                        <a href="#" class="comment-btn">Responder</a>
                                    </div>
                                </div>
                                <div class="single-comment-item reply-comment">
                                    <div class="sc-author">
                                        <img src="img/blog/blog-details/avatar/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="sc-text">
                                        <span>27 Maio 2022</span>
                                        <h5>Kelley Brandon</h5>
                                        <p>Nem me fala eu por isso que eu me mudei de lá, muito complicado morar em uma
                                            cidade assim.</p>
                                        <a href="#" class="comment-btn">Gostei</a>
                                        <a href="#" class="comment-btn">Responder</a>
                                    </div>
                                </div>
                                <div class="single-comment-item second-comment ">
                                    <div class="sc-author">
                                        <img src="img/blog/blog-details/avatar/avatar-3.jpg" alt="">
                                    </div>
                                    <div class="sc-text">
                                        <span>30 Maio 2022</span>
                                        <h5>Brandon Kelley</h5>
                                        <p>Eu amo essa cidade, quero passar minha vida inteira aqui!!</p>
                                        <a href="#" class="comment-btn">Gostei</a>
                                        <a href="#" class="comment-btn">Responder</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4" style="margin: 4%;">

                        <div class="container_perfil">
                            <div class="user-image" id="imgDados">

                            </div>
                            <div class="content">
                                <h3 class="name" id="nomeDono">Suporte</h3>
                                <p class="username" id="user">@ProximoRefugio</p>
                                <p class="details">
                                    Converse conosco para negociar, e tirar duvidas
                                </p>
                                <a class="effect effect-4" href="#" data-toggle="modal" data-target="#exampleModalCenter">
                                    Conversar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div id="map"></div>
        </div>
        <!-- Blog Details Section End -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="background-color: transparent;">
                    <div class="modal-body">
                        <div class="main">
                            <div class="header">
                                <i style="cursor:pointer;display:flex;float:right;" class="fas fa-arrow-left"></i>
                                <div class="notifications"><b>3</b></div>
                                <div class="center">
                                    <div>
                                        <img class="pfp" src="https://cdn.pixabay.com/photo/2014/11/30/14/11/cat-551554_960_720.jpg">
                                        <p id="pfpname">polymars</p>
                                    </div>

                                </div>

                            </div>

                            <div class="content_chat">
                                <div style="padding:11px;" id="mensagem">
                                    <p>Thur, May 26, 10:41 AM</p>



                                </div>

                            </div>
                            <div class="footer">
                                <div style="width:100%;padding:11px;">
                                    <input placeholder="Message" id="msg" class="text-box" name="message">
                                    <div class="send-ico">
                                        <i onclick="setMensage()" style="position:absolute;" class="fas fa-paper-plane"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- About Us Section End -->

        <!-- Blog Section End -->

        <!-- Footer Section Begin -->
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
                                <h6>Entre em contato</h6>
                                <ul>
                                    <li>(12) 345 67890</li>
                                    <li>marcosmachadodev@gmail.com</li>
                                    <li>856 Cordia Extension Apt. 356, Lake, United State</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 offset-lg-1">
                            <div class="ft-newslatter">
                                <h6>Novo mais recente</h6>
                                <p>Receba as atualizações e ofertas mais recentes.</p>
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
        <script src="js/dias/index.js"></script>
        <script src="https://kit.fontawesome.com/704ff50790.js" crossorigin="anonymous"></script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.nice-select.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/jquery.slicknav.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/axiosbase.js"></script>
        <script src="js/funcoes_stay.js"></script>
        <script>
            // array de datas que você quer desabilitar
            var disabledDates = ["20/6/2023", "30/6/2023", "17/6/2023"];
            console.log(disabledDates)
            $("#iddadata").datepicker({
                dateFormat: 'dd/mm/yy',
                beforeShowDay: function(date) {
                    var string = jQuery.datepicker.formatDate('dd/mm/yy', date);
                    return [disabledDates.indexOf(string) == -1];
                }
            });
        </script>
    </body>

    </html>