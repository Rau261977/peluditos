<?php get_header(); ?>

<!-- presentacion -->
<header>

    <div class="container-fluid py-4" aria-label="Imagen de fondo con textura arrugada" style="background-image: url('<?php echo get_template_directory_uri(); ?>/imagenes/arrugado.webp'); background-size: cover; background-repeat: no-repeat; background-position: center; min-height: 100vh;">

        Raul

        <div class="gap-2 grow grow:hover text-center">
            <a href="https://api.whatsapp.com/send?phone=5492216182490&text=Hola,%20quiero%20más%20información" aria-label="Enlace para consultar información en WhatsApp" target="_blank" class="btn btn-primary" style="border-radius:50px;" role="button">Consulte ya!</a>
        </div>


    </div>
</header>




<div class="container py-5 gap-2 grow grow:hover text-center">
    <a href="https://api.whatsapp.com/send?phone=5492216182490&text=Hola,%20quiero%20más%20información" target="_blank" aria-label="Enlace para consultar información en WhatsApp" class="btn btn-primary" style="border-radius:50px;" role="button">Consulte antes que la competencia</a>
</div>


<?php get_footer(); ?>