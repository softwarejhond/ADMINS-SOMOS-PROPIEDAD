<?php include('conexion.php');?>

<!-- ======= house Section ======= -->
<section id="viviendas" class="pricing pt-0">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <span>Viviendas disponibles</span>
            <h2>Viviendas disponibles</h2>

        </div>

        <div class="">
            <div class=" data-aos=" fade-up" data-aos-delay="100">
                <div class="">

                    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

                    <style>
                    .prop-state {
                        margin: 0;
                        display: inline;
                        background: #008fb3;
                        color: #ffffff;
                        padding: .2em 1em;
                        border-radius: 15px;
                        position: absolute;
                        top: 1em;
                        left: 1em;

                        -webkit-box-shadow: 2px 2px 4px 1px rgba(0, 0, 0, 0.5);
                        -moz-box-shadow: 2px 2px 4px 1px rgba(0, 0, 0, 0.5);
                        box-shadow: 2px 2px 4px 1px rgba(0, 0, 0, 0.5);
                    }


                    .prop-title {
                        margin: 0;
                        font-size: 1.8em;
                        font-weight: bold;
                        color: #008fb3;
                        margin: .4em 0;
                    }

                    .prop-address {
                        font-size: 1.0em;
                        margin: .5em 0;
                    }

                    .prop-price {
                        font-size: 1.8em;
                        font-weight: bold;
                        color: #008fb3;
                        margin: .4em 0;
                    }

                    .prop-aditional {
                        display: flex;
                        height:
                    }

                    .additional-sec {
                        width: 33%;
                        // border: 1px solid #444444;
                    }

                    .prop-numb {
                        margin: 0;
                        text-align: center;
                        font-size: 1.0em;
                        font-weight: bold;
                        color: #008fb3;
                        margin: .4em 0;
                    }

                    .prop-text {
                        margin: 0;
                        text-align: center;
                        font-size: 1.0em;
                        font-weight: bold;
                        color: #000;
                        margin: .4em 0;
                    }
                    </style>

                    <div class="row">
                        <?php
                            $query = mysqli_query($con,"SELECT * FROM houses WHERE tipoVivienda='En Alquiler'");
                          
                                while ($houses = mysqli_fetch_array($query)) {
                                  
                                echo '
                                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                                    <div class="pricing-item featured">
                                        <div class="img-container">
                                            <img src="./INMOBILIARIAADMIN/'.$houses['img1'].'" alt="portada" width="100%"> 
                                            <h3 class="prop-state">'.$houses['tipoVivienda'].'</h3>
                                        </div>
                                    <div class="prop-info">
                                        <h2 class="prop-title">'.$houses['nombre'].'</h2>
                                        <h2 class="prop-title">'.$municipio['municipio'].'</h2>
                                        <h3 class="prop-address">'.$houses['descripcion'].'</h3>
                                        <p class="prop-price">$'.$houses['valor'].'</p>
                                    </div>
                                    <div class="prop-aditional">
                                    <div class="additional-sec">
                                    <p class="prop-text"><img src="images/icons/bed.png" width="30px"></p>
                                    <p class="prop-text">Alcobas</p>
                                    <p class="prop-numb">'.$houses['dormitorios'].'</p>
                                </div> 
                                        <div class="additional-sec">
                                            <p class="prop-text"><img src="images/icons/kitchen.png" width="30px"></p>
                                            <p class="prop-text">Cocina</p>
                                            <p class="prop-numb">'.$houses['cocina'].'</p>
                                        </div>
                                       
                                        <div class="additional-sec">
                                        <p class="prop-text"><img src="images/icons/toilet.png" width="30px"></p>
                                        <p class="prop-text">Baños</p>
                                        <p class="prop-numb">'.$houses['banos'].'</p>
                                    </div>
                                    </div>
                                    <br>
                                    <a href="https://wa.me/573508125688?text=¡Estoy+interesado+en+el+esta+propiedad!+código+de+la+propiedad=+'.$houses['codigo'].'" type="button" target="_blank" class="btn btn-outline-success w-100"><i class="bi bi-whatsapp"></i> ¡Solicitar información ahora! <i class="bi bi-whatsapp"></i></a>
                                    <br><br>
                                    <a href="contact.php" type="button" class="btn btn-outline-warning w-100"><i class="bi bi-send"></i> ¡Solicitar información ahora! <i class="bi bi-send"></i></a>
                                    <br><br>
                                    <a href="details.php?nik='.$houses['codigo'].'" type="button" class="btn btn-outline-info w-100"><i class="bi bi-eye"></i> ¡Ver más detalles! <i class="bi bi-eye"></i></a>
                                
                                    </div>
                            </div>';
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div><!-- End Pricing Item -->
    </div>
</section><!-- End house Section -->