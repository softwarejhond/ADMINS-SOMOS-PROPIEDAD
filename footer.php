<!-- Footer -->
<style>
    footer {
        position: relative;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #333;
        color: white;
        text-align: center;
        font-size: 12px;
    }

    .empresa {
        text-transform: capitalize;
        color: orange
    }

    .redes {
        float: right;
        font-size: 16px;
        padding-right: 10px;
    }

    .linkFooter {
        text-decoration: none;
        color: white;

    }

    .linkFooter:hover {
        color: orange;
    }
</style>

<footer class="text-center text-lg-start text-light" style="color: #ffffff; background: #123960;">
    <!-- Copyright -->
    <div class="text-center p-1">
        <?php

        $queryCompany = mysqli_query($con, "SELECT nombre,nit FROM company");
        while ($empresaLog = mysqli_fetch_array($queryCompany)) {
            $empresa = $empresaLog['nombre'] . '</label>';
        }
        ?>
        <br>
        <b>SICA</b> &copy; Copyright <?php echo date("Y"); ?> Todos los derechos de uso para <label class="empresa"><b><?php echo $empresa ?> </b></label>|
        <a class="text-light " href="https://agenciaeaglesoftware.com/">Agencia de Desarrollo Eagle Software</a>
        <a href="https://www.linkedin.com/company/89372098/admin/feed/posts/" target="_blank" class="linkFooter"><i class="fa-brands fa-linkedin redes"></i></a>
        <a href="https://www.instagram.com/eaglesoftwares/" target="_blank" class="linkFooter"><i class="fa-brands fa-instagram redes"></i></a>
        <a href="https://www.facebook.com/eaglesoftwares/" target="_blank" class="linkFooter"><i class="fa-brands fa-facebook redes"></i></a>

    </div>
    <!-- Copyright -->
</footer>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script src="https://kit.fontawesome.com/2611d4a302.js" crossorigin="anonymous"></script>