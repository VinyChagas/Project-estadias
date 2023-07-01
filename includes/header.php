 <!-- Page Preloder -->
 <div id="preloder">
     <div class="loader"></div>
 </div>

 <!-- Offcanvas Menu Section Begin -->
 <div class="offcanvas-menu-overlay"></div>
 <div class="canvas-open">
     <i class="icon_menu"></i>
 </div>
 <div class="offcanvas-menu-wrapper">
     <div class="canvas-close">
         <i class="icon_close"></i>
     </div>
     <div class="search-icon  search-switch">
         <i class="icon_search"></i>
     </div>
     <nav class="mainmenu mobile-menu">
         <ul>
             <li class="active"><a href="./index.html">Home</a></li>
             <!-- <li><a href="./rooms.html">Catalogo</a></li> -->
             <li><a href="./about-us.html">Sobre nós</a></li>
             <!-- <li><a href="./blog.html">Novidades</a></li> -->
             <li><a href="./contact.html">Contato</a></li>
         </ul>
     </nav>
     <div id="mobile-menu-wrap"></div>
     <div class="top-social">
         <a href="#"><i class="fa fa-facebook"></i></a>
         <a href="#"><i class="fa fa-twitter"></i></a>
         <a href="#"><i class="fa fa-tripadvisor"></i></a>
         <a href="#"><i class="fa fa-instagram"></i></a>
     </div>
 </div>
 <!-- Offcanvas Menu Section End -->

 <!-- Header Section Begin -->
 <header class="header-section">

     <div class="menu-item">
         <div class="container">
             <div class="row">
                 <div class="col-lg-2 col-sm-2">
                     <div class="logo">
                         <a href="./index.html">
                             <img src="img/logo.png" alt="">
                         </a>
                     </div>
                 </div>
                 <div class="col-lg-10">
                     <div class="nav-menu">
                         <nav class="mainmenu">
                             <ul>
                                 <li class="active"><a href="./index.php">Inicio</a></li>
                                 <!-- <li><a href="./rooms.html">Catalogo</a></li> -->
                                 <li><a href="./about-us.html">Sobre nós</a></li>
                                 <!-- <li><a href="./blog.html">Novidades</a></li> -->
                                 <li><a href="./contact.html">Contato</a></li>
                             </ul>
                         </nav>

                         <div class="nav-right search-switch">
                             <i class="icon_search"></i>
                         </div>

                         <?php if (isset($_SESSION['id'])) { ?>
                             <div class="nav-right">
                                 <div id="user-menu-wrap" class="user-menu-wrap">
                                     <a class="mini-photo-wrapper" href="#"><img class="mini-photo" src="https://publicdomainvectors.org/tn_img/abstract-user-flat-4.webp" width="36" height="36" /></a>
                                     <div class="menu-container">
                                         <ul class="user-menu">
                                             <div class="profile-highlight">
                                                 <img src="<?php echo $_SESSION['url_foto']; ?>" alt="profile-img" width=36 height=36>
                                                 <div class="details">
                                                     <div><?php echo $_SESSION['name']; ?></div>
                                                     <div><?php echo $_SESSION['tel']; ?></div>
                                                 </div>
                                             </div>
                                             <li class="user-menu__item">
                                                 <a class="user-menu-link" href="#">
                                                     <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1604623/team.png" alt="team_icon" width=20 height=20>
                                                     <div>Notificações</div>
                                                 </a>
                                             </li>
                                             <li class="user-menu__item">
                                                 <a class="user-menu-link" href="minhas_reservas.php">
                                                     <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1604623/trophy.png" alt="trophy_icon" width=20 height=20>
                                                     <div>Reservas</div>
                                                 </a>
                                             </li>
                                             <div class="footer">
                                                 <li class="user-menu__item"><a class="user-menu-link" onclick="deslogar()" href="#" style="color: #F44336;">Logout</a></li>
                                                 <li class="user-menu__item"><a class="user-menu-link" href="#">Configurações</a></li>
                                             </div>
                                         </ul>
                                     </div>
                                 </div>
                                 <script>
                                     document
                                         .querySelector(".mini-photo-wrapper")
                                         .addEventListener("click", function() {
                                             document.querySelector(".menu-container").classList.toggle("active");
                                         });
                                     if (localStorage.getItem('logado') == 'true') {
                                         document.getElementById('loginBtn').style.display = 'none';
                                         document.getElementById('user-menu-wrap').style.display = 'block';
                                         document.getElementById('profile-name').innerHTML = localStorage.getItem('user').substring(0, 15) + '...';
                                         document.getElementById('profile-footer').innerHTML = localStorage.getItem('email').substring(0, 20) + '...';
                                     }

                                     function deslogar() {
                                         window.location.href = 'sair.php'
                                     }
                                 </script>
                             </div>
                         <?php  } else {
                            ?>
                             <div class="nav-right" id="loginBtn">
                                 <a href="Login.php" style="color: black;" class="primary-btn">Fazer Login</a>
                             </div>
                         <?php
                            }
                            ?>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </header>