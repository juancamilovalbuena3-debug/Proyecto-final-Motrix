<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Motrix</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            scroll-behavior: smooth;
        }
        .hero {
            height: 100vh;
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            transition: background-image 1s ease-in-out;
        }
        .overlay {
            position: absolute;
            top:0; left:0;
            width:100%; height:100%;
            background: rgba(0,0,0,0.55);
        }
        .hero-content {
            position: relative;
            z-index: 2;
            animation: fadeIn 2s ease-in-out;
        }
        .hero h1 {
            font-size: 3.2rem;
            font-weight: bold;
        }
        .hero p {
            font-size: 1.3rem;
        }
        .testimonial {
            font-style: italic;
            font-size: 1.1rem;
        }
        .social-icons a {
            font-size: 2rem;
            margin: 0 15px;
            color: #0d6efd;
            transition: 0.3s;
        }
        .social-icons a:hover {
            color: #0a58ca;
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }
        /* OFERTAS transición */
        #ofertas {
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transform: translateY(-50px);
            transition: all 3s ease; /* 3 segundos */
        }
        #ofertas.show {
            max-height: 1000px;
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">Motrix</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#informacion">Información</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonios">Testimonios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contáctanos</a></li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Regístrate</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section id="hero" class="hero" style="background-image: url('{{ asset('images/auto1.jpg') }}');">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>Tu vehículo ideal te espera</h1>
            <p>Motrix: rápido, seguro y confiable.</p>
            <a href="javascript:void(0)" onclick="mostrarOfertas()" class="btn btn-outline-light btn-lg">Ver Ofertas</a>
            <a href="#informacion" class="btn btn-outline-light btn-lg">Más Información</a>
        </div>
    </section>

    <!-- OFERTAS -->
    <section id="ofertas" class="py-5 bg-dark text-white text-center">
        <div class="container">
            <h2 class="mb-4"> Ofertas Exclusivas</h2>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card text-dark h-100">
                        <img src="{{ asset('images/auto2.jpg') }}" class="card-img-top" alt="Auto Oferta">
                        <div class="card-body">
                            <h5 class="card-title">Toyota Corolla</h5>
                            <p class="card-text">Aprovecha descuento del 15% solo por esta semana.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card text-dark h-100">
                        <img src="{{ asset('images/moto1.jpg') }}" class="card-img-top" alt="Moto Oferta">
                        <div class="card-body">
                            <h5 class="card-title">Yamaha FZ</h5>
                            <p class="card-text">¡Precio especial! Financiación hasta 24 meses.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card text-dark h-100">
                        <img src="{{ asset('images/bmw.jpg') }}" class="card-img-top" alt="BMW">
                        <div class="card-body">
                            <h5 class="card-title">BMW X3</h5>
                            <p class="card-text">Últimas unidades con bono de $5,000,000.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- INFORMACIÓN -->
    <section id="informacion" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">¿Por qué elegir Motrix?</h2>
            <p class="text-center mb-5">
                Somos una empresa líder en el sector automotriz, conectando compradores y vendedores de todo el país.
                Con nosotros encontrarás confianza, rapidez y soporte en cada paso.
            </p>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="card shadow-sm p-4 h-100">
                        <h4>✅ Seguridad</h4>
                        <p>Vehículos verificados para que compres con tranquilidad.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm p-4 h-100">
                        <h4>⚡ Rapidez</h4>
                        <p>Compra o vende tu carro o moto en pocos días, sin trámites engorrosos.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm p-4 h-100">
                        <h4>💬 Soporte</h4>
                        <p>Atención personalizada 24/7 para resolver tus inquietudes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIOS -->
    <section id="testimonios" class="py-5">
        <div class="container text-center">
            <h2 class="mb-4">Nuestros clientes hablan</h2>
            <button class="btn btn-outline-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#bloqueTestimonios">
                Ver Testimonios
            </button>
            <div class="collapse" id="bloqueTestimonios">
                <div class="card card-body bg-light">
                    <div id="carouselTestimonios" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                        <div class="carousel-inner text-center">
                            <div class="carousel-item active">
                                <blockquote class="testimonial">"Gracias a Motrix compré mi carro en menos de 5 días. Servicio impecable."</blockquote>
                                <p class="fw-bold mt-2">- Juan Pérez, Bogotá</p>
                            </div>
                            <div class="carousel-item">
                                <blockquote class="testimonial">"Vendí mi moto rápido y sin complicaciones. ¡Excelente plataforma!"</blockquote>
                                <p class="fw-bold mt-2">- María Gómez, Medellín</p>
                            </div>
                            <div class="carousel-item">
                                <blockquote class="testimonial">"Encontré el carro ideal para mi familia. Todo transparente."</blockquote>
                                <p class="fw-bold mt-2">- Carlos Ramírez, Cali</p>
                            </div>
                            <div class="carousel-item">
                                <blockquote class="testimonial">"La atención al cliente fue increíble, me acompañaron en todo."</blockquote>
                                <p class="fw-bold mt-2">- Laura Torres, Barranquilla</p>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselTestimonios" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselTestimonios" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACTO -->
    <section id="contacto" class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="mb-4">📲 Contáctanos</h2>
            <p class="mb-4">Síguenos en nuestras redes sociales o escríbenos a WhatsApp:</p>
            <div class="social-icons">
                <a href="https://facebook.com" target="_blank"><i class="bi bi-facebook"></i></a>
                <a href="https://instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
                <a href="https://wa.me/573001112233" target="_blank"><i class="bi bi-whatsapp"></i></a>
            </div>
            <p class="mt-3">Teléfono/WhatsApp: +57 300 111 2233</p>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-dark text-white text-center py-4">
        <p class="mb-0">&copy; {{ date('Y') }} Motrix. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const images = [
            "{{ asset('images/auto1.jpg') }}",
            "{{ asset('images/auto2.jpg') }}",
            "{{ asset('images/auto3.jpg') }}",
            "{{ asset('images/bmw.jpg') }}",
            "{{ asset('images/auto5.jpg') }}"
        ];
        let index = 0;
        const hero = document.getElementById("hero");

        setInterval(() => {
            index = (index + 1) % images.length;
            hero.style.backgroundImage = `url('${images[index]}')`;
        }, 3500);

        function mostrarOfertas() {
            const ofertas = document.getElementById("ofertas");
            ofertas.classList.add("show");
            ofertas.scrollIntoView({ behavior: "smooth" });
        }
    </script>
</body>
</html>
