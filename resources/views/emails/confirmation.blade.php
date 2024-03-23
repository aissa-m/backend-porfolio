<!DOCTYPE html>
<html>
<head>
    <style>
        /* Tus estilos CSS aquí */
        .email-container {
            max-width: 600px;
            margin: auto;
            background: #f2f2f2;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h1>¡Gracias por ponerte en contacto!</h1>
        <p>Hemos recibido tu mensaje y nos pondremos en contacto contigo pronto.</p>
        <p>Información enviada:</p>
        <div>
            <p>Email: {{ $details['email'] }}</p>
            <p>Mensaje: {{ $details['message'] }}</p>
        </div>
    </div>
</body>
</html>
