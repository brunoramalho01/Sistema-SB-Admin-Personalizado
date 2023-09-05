<!DOCTYPE html>
<?php
@session_start();
include_once ("../config/conection_bd.php");
include_once ('verificar-permissao.php');

$perfilUsuario = $_SESSION['perfil_usuario'];
?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Painel Adm - SB Admin</title>
        <link rel="stylesheet" href="../vendor/css/styles.css">
        <link rel="stylesheet" href="../vendor/icons/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <script src="../vendor/js/datatables-simple-demo.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">Sistema SB Admin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Procurar por ..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Configurações</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../auth/logout.php">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <?php
                                // Aqui nesta Array se define os menus disponíveis para cada perfil
                                $menusPorPerfil = [
                                    'Administrador' => ['Dashboard', 'Interfaces', 'Config', 'Addons'],
                                    'Ajudante' => ['Dashboard', 'Addons'],
                                ];
                                //laço para chamar menus de acordo com o perfil
                                // deve se criar os menus dentro do laço, assim de acordo a a Array o menu será exibido para o perfil adequado
                                foreach ($menusPorPerfil[$perfilUsuario] as $menu) {
                                    switch ($menu) {
                                        case 'Dashboard':
                                            echo '<div class="sb-sidenav-menu-heading">Core</div>';
                                            echo '<a class="nav-link" href="index.php?page=dash">';
                                            echo '<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>';
                                            echo 'Dashboard';
                                            echo '</a>';
                                            break;
                                        case 'Interfaces':
                                            echo '<div class="sb-sidenav-menu-heading">Interface</div>';
                                            echo '<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">';
                                            echo '<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>';
                                            echo 'Layouts';
                                            echo '<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>';
                                            echo '</a>';
                                            echo '<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">';
                                            echo '<nav class="sb-sidenav-menu-nested nav">';
                                            echo '<a class="nav-link" href="layout-static.html">Static Navigation</a>';
                                            echo '<a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>';
                                            echo '</nav>';
                                            echo '</div>';
                                            echo '<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">';
                                            echo '<div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>';
                                            echo 'Pages';
                                            echo '<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>';
                                            echo '</a>';
                                            echo '<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">';
                                            echo '<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">';
                                            echo '<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">';
                                            echo 'Authentication';
                                            echo '<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>';
                                            echo '</a>';
                                            echo '<div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">';
                                            echo '<nav class="sb-sidenav-menu-nested nav">';
                                            echo '<a class="nav-link" href="login.html">Login</a>';
                                            echo '<a class="nav-link" href="register.html">Register</a>';
                                            echo '<a class="nav-link" href="password.html">Forgot Password</a>';
                                            echo '</nav>';
                                            echo '</div>';
                                            echo '<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">';
                                            echo 'Error';
                                            echo '<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>';
                                            echo '</a>';
                                            echo '<div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">';
                                            echo '<nav class="sb-sidenav-menu-nested nav">';
                                            echo '<a class="nav-link" href="401.html">401 Page</a>';
                                            echo '<a class="nav-link" href="404.html">404 Page</a>';
                                            echo '<a class="nav-link" href="500.html">500 Page</a>';
                                            echo '</nav>';
                                            echo '</div>';
                                            echo '</nav>';
                                            echo '</div>';
                                            break;
                                        case 'Config':
                                            echo '<div class="sb-sidenav-menu-heading">Configurations</div>';
                                            echo '<a class="nav-link" href="index.php?page=charts">';
                                            echo '<div class="sb-nav-link-icon"><i class="bi bi-gear"></i></div>';
                                            echo 'Charts';
                                            echo '</a>';
                                            break;
                                        case 'Addons':
                                            echo '<div class="sb-sidenav-menu-heading">Addons</div>';
                                            echo '<a class="nav-link" href="charts.html">';
                                            echo '<div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>';
                                            echo 'Charts';
                                            echo '</a>';
                                            echo '<a class="nav-link" href="tables.html">';
                                            echo '<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>';
                                            echo 'Tables';
                                            echo '</a>';
                                            echo '<a class="nav-link" href="index.php?page=cadastroUsuario">';
                                            echo '<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>';
                                            echo 'Cadastro Usuário';
                                            echo '</a>';
                                            echo '<a class="nav-link" href="index.php?page=Portaria">';
                                            echo '<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>';
                                            echo 'Portaria';
                                            echo '</a>';
                                            break;
                                        default:
                                            // Lidar com menus desconhecidos ou não permitidos, se necessário.
                                            break;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logado como:</div>
                        <p><?php echo $_SESSION['nome_usuario'];?></p>Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="col">
                            <div class="row">
                                <?php
                                    // Verifique se a variável 'page' está definida na URL
                                    if (isset($_GET['page'])) {
                                        $page = $_GET['page'];
                                        // Use um switch case para direcionar com base na página solicitada
                                        switch ($page) {
                                            case 'cadastroUsuario':
                                                include('pages/cadastroUsuario.php');
                                                break;
                                            case 'charts':
                                                include('pages/charts.html');
                                                break;
                                            case 'contact':
                                                include('pages/contact.php');
                                                break;
                                            case 'Portaria':
                                                include('pages/portaria.php');
                                                break;
                                            case 'dash':
                                                include('pages/home.php');
                                                break;
                                            // Adicione mais casos conforme necessário
                                            default:
                                                // Caso a página solicitada não seja encontrada, você pode exibir uma mensagem de erro ou redirecionar para uma página de erro 404
                                                echo "Página não encontrada";
                                                break;
                                        }
                                    } else {
                                        // Se 'page' não estiver definido na URL, você pode incluir uma página padrão ou redirecionar para a página desejada
                                        // Por exemplo, incluir a página de dashboard:
                                        include('pages/home.php');
                                    }
                                ?>
                            </div>
                        </div>    
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Política de Privacidade</a>
                                &middot;
                                <a href="#">Termos &amp; Condições</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../vendor/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <<script src="../vendor/assets/demo/chart-area-demo.js"></script>
        <script src="../vendor/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../vendor/js/datatables-simple-demo.js"></script>
    </body>
</html>
