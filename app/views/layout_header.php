<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'La Colmena de la Vida') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        naranja: '#EF7F31',
                        rojo: '#E02C35',
                        verdeClaro: '#7CB342',
                        verdeOscuro: '#4D813F',
                        crema: '#FDF9F3',
                        gris: '#424242',
                        azul: '#36A2EB',
                        morado: '#9966FF',
                        rosa: '#FF6384'
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .pantalla { animation: fadeIn 0.3s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="bg-crema text-gris min-h-screen">
    <header class="bg-verdeOscuro text-white p-4 shadow-md flex justify-between items-center">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-leaf text-2xl"></i>
            <h1 class="text-2xl font-bold">La Colmena de la Vida</h1>
        </div>
        <a href="index.php" class="bg-white text-verdeOscuro px-4 py-2 rounded-lg font-bold hover:bg-gray-100 transition">
            <i class="fa-solid fa-house mr-2"></i> Inicio
        </a>
    </header>
    <main class="max-w-4xl mx-auto mt-8 p-4">