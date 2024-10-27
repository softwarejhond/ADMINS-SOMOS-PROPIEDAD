<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='css/nav2.css?v=0.0.1' rel='stylesheet'>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <a class="navbar-brand icon" href="main.php"><img src="images/logSIVP.png" width="100px"></a>
            <div class="logo_name">SIVP</div>

            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">

            <li>
                <a href="main.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="add_user.php">
                    <i class='fas fa-user-plus'></i>
                    <span class="links_name">Agregar usuario</span>
                </a>
                <span class="tooltip">Agregar usuario</span>
            </li>
            <li>
                <a href="add_proprietor.php">
                    <i class="fa fa-home" aria-hidden="true"></i>

                    <span class="links_name">Crear propiedad</span>

                </a>
                <span class="tooltip">Crear propiedad</span>
            </li>
            <li>
                <a href="inventarios.php">
                    <i class="fa fa-archive" aria-hidden="true"></i><span class="badge badge-success ">⭐️</span>
                    <span class="links_name">Inventario ⭐️</span>
                </a>
                <span class="tooltip">Inventario ⭐️</span>
            </li>
            <li>
                <a href="#" data-toggle="modal" data-target="#modalReparador">
                    <i class="bi bi-wrench-adjustable"></i>
                    <span class="links_name">Crear reparador</span>
                </a>
                <span class="tooltip">Crear reparador</span>
            </li>
            <li>
                <a href="#" data-toggle="modal" data-target="#modalReporte">
                    <i class="bi bi-receipt"></i>
                    <span class="links_name">Registrar daño o petición</span>
                </a>
                <span class="tooltip">Registrar daño o petición</span>
            </li>
            <li>
                <a href="#" data-toggle="modal" data-target="#exampleModal">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span class="links_name">Registrar barrio </span>
                </a>
                <span class="tooltip">Registrar barrio </span>
            </li>

            <li>
                <a href="sliders.php">
                    <i class="fa fa-file-image" aria-hidden="true"></i><span class="badge badge-success "></span>
                    <span class="links_name">Carrusel </span>
                </a>
                <span class="tooltip">Carrusel </span>
            </li>
            <li>
                <a href="registrarRetiroInquilino.php">
                    <i class="fa fa-window-close" aria-hidden="true"></i><span class="badge badge-success ">⭐️</span>
                    <span class="links_name">Programar retiro ⭐️</span>
                </a>
                <span class="tooltip">Programar retiro ⭐️</span>
            </li>
            <li>
                <a href="perfil.php">
                    <i class='fas fa-user'></i>
                    <span class="links_name">Perfil</span>
                </a>
                <span class="tooltip">Perfil</span>
            </li>

            <li>
                <a href="company.php">
                    <i class='fas fa-users-cog'></i>
                    <span class="links_name">Configuración</span>
                </a>
                <span class="tooltip">Configuración</span>
            </li>
            <li class="profile">

                <a href="https://agenciaeaglesoftware.com/" target="_blank">
                    <img src="images/icons/eagleLogo.png" width="70px" alt="Eagle Software">
                    <span class="links_name">Visitar</span>
                </a>
                <span class="tooltip">Visitar</span>

            </li>
        </ul>
    </div>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });



        // following are the code to change sidebar button(optional)
        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
            }
        }
    </script>
</body>
<?php include 'modals/registerBarrios.php'; ?>
<?php include 'modals/registarReparador.php'; ?>
<?php include 'modals/registrarReportes.php'; ?>
<?php include 'modals/inquilinoRetirado.php'; ?>
<?php include 'modals/actualizarPorcentaje.php'; ?>
<?php include 'modals/actualizarPorcentajeLocales.php'; ?>
<?php include 'modals/registrarRetiroInquilino.php'; ?>

</html>