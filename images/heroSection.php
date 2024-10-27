<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row gy-4 d-flex justify-content-between">
            <div class="col-lg-6 col-md-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <img src="assets/img/logoBlanco.png" alt="logo">

                <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="1500" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Clientes</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="1000" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Propiedades</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="31" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Años</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="2" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Ubicaciones</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>
            </div>

            <div class="col-lg-5 col-md-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <?php
                    include './conexion.php';
                    $sql_slider = mysqli_query($con, "select * from slider where estado=1 order by orden");
                    $nums_slides = mysqli_num_rows($sql_slider);
                    ?>
                    <ol class="carousel-indicators">
                        <?php
                        for ($i = 0; $i < $nums_slides; $i++) {
                            $active = "active";
                        ?>
                            <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $i; ?>" class="<?php echo $active; ?>"></li>
                        <?php
                            $active = "";
                        }
                        ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                        $active = "active";
                        while ($rw_slider = mysqli_fetch_array($sql_slider)) {
                        ?>

                            <div class="carousel-item <?php echo $active; ?>">
                            <img data-src="holder.js/900x500/auto/#777:#777" alt="900x500" src="images/img/slider/<?php echo $rw_slider['url_image']; ?>" data-holder-rendered="true">
                                <div class="carousel-caption d-none d-md-block">
                                <h5><?php echo $rw_slider['titulo']; ?></h5>
                                <p><?php echo $rw_slider['descripcion']; ?></p>
                                    <a class='btn btn-<?php echo $rw_slider['estilo_boton']; ?> text-right' href="<?php echo $rw_slider['url_boton']; ?>"><?php echo $rw_slider['texto_boton']; ?></a>
                               
                                </div>
                            </div>
                        <?php
                            $active = "";
                        }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
            </div>
        </div>

    </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script>
    $('.carousel').carousel({
  interval: 2000
})
</script>