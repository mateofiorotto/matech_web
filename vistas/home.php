<?php 
$listado = Componente::listado_por_precio(); ?>
<!--SECCION 1: Home-->
<section id="home">
    <div id="degradado-banner">
        <div class="container pb-md-5 pt-md-5 pt-lg-0 pb-lg-0">
            <div id="banner-principal" class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-md-12">
                    <h2 class="text-center text-lg-start">Los mejores productos en <span id="h2-matech">Matech</span></h2>
                    <p class="text-lg-start mb-0">Compra los mejores productos del mercado</p>
                    <p class="text-lg-start">al mejor precio</p>
                </div>
                <div class="col-lg-6 col-md-12 text-center">
                    <img alt="Pc pack imagen" src="elementos-graficos/otros/pc-pack.webp" class="img-fluid w-75">
                </div>
            </div>
        </div>
    </div>

    <!--HOME NOSOTROS-->
    <section id="home-nosotros">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 mt-5">
                    <h2>Nosotros</h2>
                    <p>
                        En <strong>Matech</strong> <em>nos apasiona la tecnología y el rendimiento</em>. Nuestra historia comenzó en 2019, cuando un
                        grupo de expertos en informática y entusiastas del hardware decidimos unir fuerzas para crear una
                        marca que ofreciera <strong>soluciones de alto rendimiento</strong> para <em>gamers, creadores de contenido y profesionales</em>.
                        Desde entonces, nos hemos comprometido a <strong>ofrecer productos de calidad, personalizables y adaptados</strong> a las
                        necesidades de cada usuario.
                    </p>
                    <p>
                        Nuestra <strong>misión</strong> es <em>potenciar tu experiencia tecnológica</em> con equipos que no solo cumplan con tus expectativas,
                        sino que las superen. Creemos que cada computadora debe ser una herramienta de alto rendimiento,
                        lista para cualquier desafío.
                    </p>
                </div>

                <div class="col-lg-6 d-flex justify-content-center align-items-center">
                    <img class="img-fluid" alt="imágen sobre nosotros" src="elementos-graficos/otros/nosotros-horizontal.webp">
                </div>

            </div>
        </div>
    </section>

    <!--HOME OFRECEMOS-->
    <section class="pt-0" id="home-ofrecemos">
        <div class="container">
            <h2 class="mb-4">Ofrecemos cosas distintas</h2>
            <div class="row">

                <div class="col-lg-6 col-md-12 mt-3">
                    <h3 class="vineta"><i class="bi bi-pci-card"><span>Tarjeta gráfica (alto rendimiento)</span></i>Componentes de Alto Rendimiento</h3>
                    <p><strong>Seleccionamos cuidadosamente cada pieza</strong>, desde procesadores hasta tarjetas gráficas, <em>asegurando que cada PC ofrezca una experiencia de uso fluida y eficiente</em>.</p>
                </div>

                <div class="col-lg-6 col-md-12 mt-3">
                    <h3 class="vineta"><i class="bi bi-gear-fill"><span>Tuerca (customización)</span></i>Personalización Total</h3>
                    <p><strong>Ofrecemos opciones de personalización</strong> para que puedas diseñar tu PC ideal, <em>ya sea para gaming, edición de video, o productividad</em>.</p>
                </div>

                <div class="col-lg-6 col-md-12 mt-3">
                    <h3 class="vineta"><i class="bi bi-check-circle-fill"><span>Check (calidad)</span></i>Calidad Garantizada</h3>
                    <p><strong>Todos nuestros equipos son armados y probados por expertos</strong>, <em>garantizando estabilidad y durabilidad</em> en cada uno de nuestros armados.</p>
                </div>

                <div class="col-lg-6 col-md-12 mt-3">
                    <h3 class="vineta"><i class="bi bi-calendar-fill"><span>Calendario (innovación)</span></i>Compromiso con la Innovación</h3>
                    <p>Nos mantenemos al día con los <strong>últimos avances tecnológicos</strong> para ofrecerte <em>lo mejor en hardware y rendimiento</em>, siempre buscando elevar tu experiencia.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- SECCION 3 (filtro uno): ordenados por precio (solo muestro tres para decorar la home)
     Utiliza un metodo en la clase Componente.php-->
    <section id="home-productos">
        <div class="container">

            <h2 id="productos-baratos" class="text-center">Productos baratos</h2>
            <p class="p-sub text-center">¡Al mejor precio!</p>

            <div class="row productos-div justify-content-center align-items-center">
                <ul class="list-unstyled row justify-content-center align-items-center">
                    <?php
                    $contador = 0;
                    foreach ($listado as $componente) {
                        if ($contador >= 3) {
                            break;
                        }
                    ?>
                        <li class='pastilla-item col-xl-4 col-lg-6 col-sm-12 mb-5 item'>
                            <img class='pb-4 img-fluid w-75 m-auto d-block' src='elementos-graficos/productos/<?= $componente->getImagen(); ?>' alt='<?= $componente->getNombre(); ?>' />
                            <h3 class='bold'><?= $componente->getNombre(); ?></h3>
                            <p class='bold precio'><?= $componente->precio_formateado(); ?></p>
                            <p class='m-auto descripcion'><?= $componente->descripcion_reducida(); ?></p>
                            <div class="mt-4 row m-auto justify-content-md-center align-items-md-center justify-content-lg-start align-items-lg-start">
                                <a class="ver-detalles col-lg-5 col-md-10 text-center me-3 mb-3" href='index.php?seccion=detalle&id=<?= $componente->getId(); ?>'>Ver detalles</a>
                            </div>
                        </li>
                    <?php
                        $contador++;
                    }
                    ?>
                </ul>
            </div>
        </div>
    </section>

    <!--BENEFICIOS (minibanner)-->
    <div class="degradado">
        <section id="beneficios" class="mt-4 container">
            <div class="row">

                <div class="p-4 col-lg-4 col-md-12">
                    <h3><i class="icono-titulo bi bi-credit-card-fill"><span>Tarjeta (cuotas)</span></i>Cuotas Sin Interés</h3>
                    <p class="text-center">Pagando con tarjeta</p>
                </div>

                <div class="p-4 col-lg-4 col-md-12">
                    <h3><i class="icono-titulo bi bi-envelope-fill"><span>Sobre (envío)</span></i>Envío Gratuito y Rápido</h3>
                    <p class="text-center">A cualquier parte del país</p>
                </div>

                <div class="p-4 col-lg-4 col-md-12">
                    <h3><i class="icono-titulo bi bi-arrow-repeat"><span>Devolución y garantía</span></i>Devolución y Garantía</h3>
                    <p class="text-center">En cualquier producto</p>
                </div>

        </section>
    </div>
</section>