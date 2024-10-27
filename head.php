<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SIVP - Sistema Integrado de Viviendas y Propiedades </title>
<link rel="shortcut icon" href="images/logSIVP.png" type="image/x-icon">

<!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<!-- Bootstrap fin  -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<!-- fuentes -->
<link href="https://fonts.cdnfonts.com/css/verdana" rel="stylesheet">
<link href="https://fonts.cdnfonts.com/css/lucida-console" rel="stylesheet">
<!-- fuentes fin -->

<!-- iconos -->
<script src="https://kit.fontawesome.com/d78c995630.js" crossorigin="anonymous"></script>

<!-- iconos fin -->
<script src="js/jqueryv4.js"></script>
<!-- data table -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<!-- data table fin -->
<style>
    .content {
        margin-top: 80px;
    }

    /*INICIA CODIGO DE LA FIRMA*/
    :root {
        --blue: #072c44;
        --white: #ffffff;
        --pink: #FF0083;
        --gold: #efb810;
        --red: #F93448;
        --morado: #CF65F4;
        --naranja: #FF5C00;
        --verde: #04C40F;
    }

    .verde {
        border-color: var(--verde);
        color: var(--verde);
    }

    .border-verde {
        border-color: var(--verde);
    }

    .verde:hover {
        background-color: var(--verde);
        color: #000000
    }

    .pink {
        border-color: var(--pink);
        color: var(--pink);
    }

    /*Tarjeta morada */
    .bg-morado {
        background-color: var(--morado);
    }

    .border-morado {
        border-color: var(--morado);
    }

    .text-morado {
        color: var(--morado);
    }

    /*Fin Tarjeta morada */
    /*Tarjeta pink */
    .bg-pink {
        background-color: var(--pink);
    }

    .border-pink {
        border-color: var(--pink);
    }

    .text-pink {
        color: var(--pink);
    }

    /*Fin Tarjeta pink */
    .pink:hover {
        background-color: var(--pink);
        color: #ffffff
    }

    .morado {
        border-color: var(--morado);
        color: var(--morado);
    }

    .morado:hover {
        background-color: var(--morado);
        color: #ffffff
    }

    .naranjas {
        border-color: var(--naranja);
        color: var(--naranja);
    }

    .naranjas:hover {
        background-color: var(--naranja);
        color: #ffffff
    }

    .red {
        border-color: var(--red);
        color: var(--red);
    }

    .red:hover {
        background-color: var(--red);
        color: #ffffff
    }

    .naranja {
        border-color: var(--naranja);
        color: var(--naranja);
    }

    .naranja:hover {
        background-color: linear-gradient(208deg, #FF806C 0%, #FF5C00 95.3%);
        color: #000;
    }

    .blue {
        border-color: var(--blue);
        color: var(--blue);
    }

    .toastPink {
        background-color: var(--pink);
        opacity: 0.8;
        color: var(--white);
    }

    .modalPink {
        background-color: var(--pink);
        color: var(--white);
    }

    .candado {
        border-color: var(--gold);
        color: var(--gold);
        cursor: not-allowed;


    }
</style>