<!DOCTYPE html>
<html>
<head>
    <title>Confirmación de Inscripción</title>
</head>
<body>
    <h1>¡Gracias por inscribirte al taller!</h1>
    <p>Hola, {{ auth()->user()->name }}.</p>
    <p>Te has inscrito exitosamente al taller <strong>{{ $taller->nombre }}</strong>.</p>
    <p><strong>Descripción:</strong> {{ $taller->descripcion }}</p>
    <p><strong>Fecha de inicio:</strong> {{ $taller->fecha_inicio->format('d/m/Y') }}</p>
    <p><strong>Fecha de fin:</strong> {{ $taller->fecha_fin->format('d/m/Y') }}</p>
    <p><strong>Instructor:</strong> {{ $taller->instructor->nombre }}</p>
    <p>¡Esperamos verte pronto!</p>
</body>
</html>
