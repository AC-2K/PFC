    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                    <i> <img src="assets/images/logo.png" alt="" width="70%"> </i>
                <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Geral</label>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
                        <a href="mainPage.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Inicio</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Entidades</label>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Serviços técnicos</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="paginaServico.php" class="">Operações</a></li>
                            <li class=""><a href="listaServico.php" class="">Lista</a></li>
                            <?php if($_SESSION["usuario"] == 1 || $_SESSION["usuario"] == 2){
                                echo ' <li><a href="material.php">Material</a></li>';
                                echo ' <li><a href="historico.php">Historico</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Relatórios técnicos</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="paginaRelatorio.php" class="">Operações</a></li>
                            <li class=""><a href="listaRelatorio.php" class="">Lista</a></li>
                        </ul>
                    </li>
                    <?php 
                    if($_SESSION["usuario"] == 1 || $_SESSION["usuario"] == 2 ){
                    echo ' <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">';           
                        echo '<a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Clientes</span></a>';
                        echo '<ul class="pcoded-submenu">';
                            echo '<li class=""><a href="paginaCliente.php" class="">Operações</a></li>';
                            echo '<li class=""><a href="listaCliente.php" class="">Lista</a></li>';
                            echo '<li class=""><a href="estatistica.php" class="">Estatisticas</a></li>';
                        echo '</ul>';     
                    echo '</li>'; 
                    }
                    ?>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Levantamentos</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="paginaLevantamento.php" class="">Operações</a></li>
                            <li class=""><a href="listaLevantamento.php" class="">Lista</a></li>
                        </ul>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Opções</label>
                    </li>
                    <?php 
                    if($_SESSION["usuario"] == 2 ){
                    echo ' <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">';           
                        echo '<a href="admin.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-server"></i></span><span class="pcoded-mtext">Privilegios</span></a>';
                    echo '</li>';
                    }
                    ?>
                    <li data-username="Table bootstrap datatable footable" class="nav-item">
                        <a href="sair.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Sign out</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
            <a href="index.html" class="b-brand">
                   <div class="b-bg">
                       <i class="feather icon-trending-up"></i>
                   </div>
                   <span class="b-title">Amiware</span>
               </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="javascript:">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
            </ul>
        </div>
    </header>
    <!-- [ Header ] end -->