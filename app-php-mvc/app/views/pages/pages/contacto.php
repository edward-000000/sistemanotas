<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Sistema de Tareas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }
        .container {
            margin: 0 auto;
            background: #fff;

            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
        }
        .button {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Contacto</h1>
        <p>¿Tienes alguna pregunta o comentario sobre el sistema de tareas? ¡Contáctanos!</p>
        <form action="enviar.php" method="post">
            <div class="field">
                <label class="label" for="nombre">Nombre:</label>
                <div class="control">
                    <input class="input" type="text" id="nombre" name="nombre" required>
                </div>
            </div>
            <div class="field">
                <label class="label" for="email">Correo electrónico:</label>
                <div class="control">
                    <input class="input" type="email" id="email" name="email" required>
                </div>
            </div>
            <div class="field">
                <label class="label" for="mensaje">Mensaje:</label>
                <div class="control">
                    <textarea class="textarea" id="mensaje" name="mensaje" rows="4" required></textarea>
                </div>
            </div>
            <div class="control">
                <input class="button" type="submit" value="Enviar">
            </div>
        </form>
    </div>
</body>
</html>
