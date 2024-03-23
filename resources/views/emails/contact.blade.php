<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Message</title>
</head>
<body>
    <p><strong>Nombre:</strong> {{ $details['name'] }}</p>
    <p><strong>Email:</strong> {{ $details['email'] }}</p>
    <p><strong>Teléfono:</strong> {{ $details['telef'] ?? 'No proporcionado' }}</p>
    <p><strong>Asunto:</strong> {{ $details['subject'] }}</p>
    <p><strong>Mensaje:</strong> {{ $details['message'] }}</p>
</body>
</html>
