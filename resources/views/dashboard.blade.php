<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white leading-tight">
            {{ __('Panel de estadísticas Digital Sound Sculp') }}
        </h2>
    </x-slot>

    <!-- Contenedor Principal -->
    

        <!-- Carrusel -->
        <div class="carousel-container bg-black " style="
        width: 100%;  background-image: url('{{ asset('images/Fondogrislogin.jpg') }}'); 
        background-size: cover; 
        background-position: center; 
        background-repeat: no-repeat; ">
            <div id="carouselExampleControls" class="carousel slide">
                <div class="carousel-inner">
                    <!-- Imágenes en el Carrusel -->
                    <div class="carousel-item active">
                        <img src="{{ asset('images/DSC_0305.jpg') }}" class="d-block w-100" alt="Foto sintetizador">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/DSC_0307.jpg') }}" class="d-block w-100" alt="Foto sintetizador">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/DSC_0304.jpg') }}" class="d-block w-100" alt="Foto sintetizador">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <!-- Logo y Texto de Introducción -->
        <div class="flex flex-col md:flex-row items-center justify-between mb-12">
            
        </div>

        <!-- Descripción del Panel y Video -->
            <div class="flex flex-col md:flex-row gap-8 mb-12" style="padding-left: 250px;">
                <!-- Cuadro de texto más estrecho -->
                <div class="text-container">
                    <p class="text-3xl text-gray-700 mb-4">
                        {{ __("La información que muestra este panel de estadísticas es una recolección de datos con interés de estudio de mercado.") }}
                    </p>
                    <p class="text-3xl text-gray-700">
                        {{ __("Este panel es exclusivo para el análisis del rendimiento y las estadísticas del sintetizador Digital Sound Sculp.") }}
                    </p>
                </div>
                
                <!-- Contenedor del video más ancho -->
                <div class="video-container">
                    <video autoplay loop muted>
                        <source src="{{ asset('videos/Automatic.mp4') }}" type="video/mp4">
                        Tu navegador no soporta el elemento de video.
                    </video>
                </div>
            </div>
    
</x-app-layout>

<style>
    .text-container {
        height: 550px;
        width: 400px; /* Ajusta el ancho según sea necesario */
        margin-top: 25px;
        padding: 1.5rem; /* Espaciado interno */
        background-color: transparent;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); /* Sombra sutil */
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .video-container {
        height: 600px;
        width: 100%;
        max-width: 1000px; /* Ajusta el ancho máximo según sea necesario */
        padding: 1.5rem;
        border-radius: 8px; /* Bordes redondeados */
        overflow: hidden;
    }

    .video-container video {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ajusta el video para cubrir el contenedor */
    }
    .carousel {
        width: 80%;
        max-width: 800px;
        margin: 0 auto;
        height: 500px;
    }

    .carousel-inner {
        height: 100%;
    }

    .carousel-item img,
    .carousel-item video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .carousel-control-prev,
    .carousel-control-next {
        height: 130%;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: orange;
    }

    .carousel-control-prev-icon::before,
    .carousel-control-next-icon::before {
        color: orangered;
    }

    .video-container {
        margin-bottom: 40px;
    }
</style>
