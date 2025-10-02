<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Motrix</title>
    <!-- Tu CSS en public/css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Bootstrap opcional -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">Motrix</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Carros</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Motos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Vender Vehículo</a></li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Inicia Sesión</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Regístrate</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="text-center text-white" style="background:#002366; padding:100px 20px;">
        <div class="container">
            <h1 class="fw-bold">Cotiza tu nuevo vehículo</h1>
            <p class="lead">Encuentra la mejor opción en Motrix para adquirir tu carro o moto.</p>
            <a href="#" class="btn btn-primary btn-lg">Más Información</a>
        </div>
    </section>

    <!-- Bootstrap JS opcional -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
