<x-layout>
    <div id="carouselHome" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/carousel/slide01.jpg') }}" class="d-block w-100"
                    alt="Banner uno, Explora la elegancia">
                <div class="carousel-caption d-none d-sm-block">
                    <p class="titulo-banner">Explora la Elegancia</p>
                    <p>Descubre nuestra selección de vinos finos y sumérgete en la elegancia de cada sorbo.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/carousel/slide02.jpg') }}" class="d-block w-100"
                    alt="Banner dos, Experiencia sensorial">
                <div class="carousel-caption d-none d-sm-block">
                    <p class="titulo-banner">Experiencia Sensorial</p>
                    <p>Embárcate en una experiencia sensorial única con nuestros vinos de distintas cepas y sabores.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/carousel/slide03.jpg') }}" class="d-block w-100"
                    alt="Banner tres, Aventura enológica">
                <div class="carousel-caption d-none d-sm-block">
                    <p class="titulo-banner">Aventura enológica</p>
                    <p>Emprende una aventura enológica con nuestras joyas vinícolas de todo el mundo.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <section id="introduccion" class="col-12">
                <h2>Sobre Cepante</h2>
                <img src="{{ asset('images/vino-01.jpg') }}" alt="Introducción de Cepante" class="img-pc">
                <img src="{{ asset('images/vino-02.jpg') }}" alt="Introducción de Cepante" class="img-mobile">
                <p><strong>Cepante, una vinoteca apasionada por el mundo del vino</strong>, se enorgullece de
                    ofrecer una experiencia única a los amantes de esta noble bebida. Fundada con la visión de
                    <strong>compartir la excelencia enológica.</strong>
                </p>
                <p>Con una historia arraigada en la pasión por la viticultura y el compromiso con la calidad, en
                    Cepante nos esforzamos por brindar a nuestros clientes una cuidadosa <strong>selección de vinos
                        que representan la diversidad de cepas, regiones y estilos</strong>. Nuestro compromiso va
                    más allá de la venta; buscamos crear una comunidad donde la cultura del vino se comparta,
                    aprecie y celebre.
                </p>
                <img src="{{ asset('images/vino-03.jpg') }}" alt="Introducción de Cepante" class="img-mobile">
                <p><strong>En Cepante, cada botella cuenta una historia única.</strong> Trabajamos estrechamente con
                    viticultores y enólogos que comparten nuestra dedicación a la excelencia. Desde vinos tintos
                    robustos hasta elegantes blancos y burbujeantes espumosos, nuestra colección refleja la riqueza
                    y la complejidad del mundo vinícola.</p>
                <img src="{{ asset('images/vino-04.jpg') }}" alt="Introducción de Cepante" class="img-mobile">
                <p>Como empresa comprometida con la sostenibilidad, nos esforzamos por <strong>resaltar vinos de
                        productores que adoptan prácticas respetuosas con el medio ambiente.</strong> Cepante es más
                    que una vinoteca; es un destino para aquellos que buscan explorar, aprender y apreciar la magia
                    que reside en cada botella de vino exclusivo que ofrecemos.</p>
            </section>
        </div>
    </div>
</x-layout>
