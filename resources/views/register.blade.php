<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiante</title>

    <style>
        <?php 
            $path = resource_path('css/app.css');
            if (file_exists($path)) {
                echo file_get_contents($path);
            }
        ?>
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Registro de Estudiante</h1>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ url('/register') }}" method="POST">
            @csrf

            <label>Nombre:</label>
            <input type="text" name="name" required>

            <label>Correo:</label>
            <input type="email" name="email" required>

            <label>Contraseña:</label>
            <input type="password" name="password" required>

            <label>Confirmar Contraseña:</label>
            <input type="password" name="password_confirmation" required>

            <label>Carrera:</label>
            <select name="career_id" required>
                <option value="" disabled selected>Selecciona tu carrera</option>
                @foreach($careers as $career)
                    <option value="{{ $career->id }}">{{ $career->name }}</option>
                @endforeach
            </select>

            <div class="checkbox-group">
                <input type="checkbox" name="terms_accepted" id="terms" required>
                <label for="terms" style="display: inline; font-weight: normal; margin: 0;">
                    Acepto los términos
                </label>
            </div>

            <button type="submit">Registrar Estudiante</button>
        </form>
    </div>
</body>
</html>