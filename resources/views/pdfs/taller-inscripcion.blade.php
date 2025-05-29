<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $titulo }}</title>
    <style>
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $titulo }}</h1>
    </div>

    <table>
        <tr>
            <th>Participante:</th>
            <td>{{ $participante }}</td>
        </tr>
        <tr>
            <th>Taller:</th>
            <td>{{ $nombre_taller }}</td>
        </tr>
        <tr>
            <th>Descripción:</th>
            <td>{{ $descripcion }}</td>
        </tr>
        <tr>
            <th>Instructor:</th>
            <td>{{ $instructor }}</td>
        </tr>
        <tr>
            <th>Fecha de inicio:</th>
            <td>{{ $fecha_inicio }}</td>
        </tr>
        <tr>
            <th>Fecha de fin:</th>
            <td>{{ $fecha_fin }}</td>
        </tr>
        <tr>
            <th>Fecha de inscripción:</th>
            <td>{{ $fecha_inscripcion }}</td>
        </tr>
    </table>
</body>
</html>
