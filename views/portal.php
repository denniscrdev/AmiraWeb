<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Inscripciones</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #4CAF50, #2E7D32);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .portal-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        }
        .portal-card h1 {
            font-weight: bold;
            margin-bottom: 20px;
        }
        .btn-custom {
            margin: 10px;
            padding: 12px 25px;
            font-size: 18px;
            border-radius: 30px;
            transition: 0.3s;
        }
        .btn-custom:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="portal-card">
        <h1>Bienvenido al Portal</h1>
        <p>Seleccione una opción para continuar</p>
        <div>
            <a href="home/index" class="btn btn-light btn-custom">Iniciar Sesión</a>
            <a href="?controller=Inscripcion&action=index" class="btn btn-warning btn-custom">Inscribirse</a>
        </div>
    </div>
</body>
</html>
