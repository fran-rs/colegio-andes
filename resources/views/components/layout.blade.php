<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $metaTitle ?? 'Default title' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'defaultDescription' }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <style>
        /* Colores principales */
        :root {
            --color-primary: #2C3E50;
            /* Azul oscuro */
            --color-secondary: #2980B9;
            /* Azul claro */
            --color-accent: #E67E22;
            /* Naranja */
            --color-background: #ECF0F1;
            /* Gris claro */
            --color-text: #34495E;
            /* Texto oscuro */
            --color-menu: #1A1A1A;
            /* Gris oscuro */
        }

        /* Estilo del body */
        body {
            background-color: var(--color-background);
            color: var(--color-text);
            font-family: Arial, sans-serif;
        }

        /* Estilo de los encabezados */
        h1,
        h2 {
            color: var(--color-primary);
            text-align: center;
        }

        /* Estilo de las tarjetas */
        .card {
            border: 1px solid var(--color-secondary);
            border-radius: 8px;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* Botones */
        .btn-primary {
            background-color: var(--color-secondary);
            border-color: var(--color-secondary);
        }

        .btn-primary:hover {
            background-color: var(--color-accent);
            border-color: var(--color-accent);
        }

        /* Estilos de navegación */
        .navbar {
            background-color: var(--color-menu);
            padding: 1rem;
        }

        .nav-link {
            color: white;
            margin-right: 1rem;
            text-decoration: none;
        }

        .nav-link:hover {
            color: var(--color-accent);
        }

        /* Espaciado */
        .mt-4 {
            margin-top: 2rem;
        }

        .mb-4 {
            margin-bottom: 2rem;
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
    </style>
</head>

<body>
    <x-navigation />


    {{ $slot }}


</body>

</html>
