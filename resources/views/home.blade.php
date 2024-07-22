<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil - DIGIOPTIC</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        header {
            text-align: center;
            margin-bottom: 20px;
        }
        h1 {
            margin: 0;
            font-size: 2em;
            color: #333;
        }
        .content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            flex: 1 1 200px;
            transition: transform 0.3s;
        }
        .card a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            font-size: 1.2em;
        }
        .card a:hover {
            text-decoration: none;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        /* Style pour l'animation de chargement */
        .loader {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        .loader div {
            border: 8px solid #f3f3f3;
            border-radius: 50%;
            border-top: 8px solid #3498db;
            width: 50px;
            height: 50px;
            animation: spin 0.5s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Bienvenue sur l'application DIGIOPTIC</h1>
        </header>
        <div class="content">
            <div class="card"><a href="{{ route('fournisseurs.index') }}" class="redirect-link">Fournisseurs</a></div>
            <div class="card"><a href="{{ route('produits.index') }}" class="redirect-link">Produits</a></div>
            <div class="card"><a href="{{ route('clients.index') }}" class="redirect-link">Clients</a></div>
            <div class="card"><a href="{{ route('stocks.index') }}" class="redirect-link">Stocks</a></div>
            <div class="card"><a href="{{ route('ventes.index') }}" class="redirect-link">Ventes</a></div>
            <div class="card"><a href="{{ route('factures.index') }}" class="redirect-link">Factures</a></div>
            <div class="card"><a href="{{ route('receptions.index') }}" class="redirect-link">Réceptions</a></div>
            <div class="card"><a href="{{ route('caisses.index') }}" class="redirect-link">Caisses</a></div>
        </div>
    </div>
    <div class="loader" id="loader">
        <div></div>
    </div>
    <script>
        document.querySelectorAll('.redirect-link').forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                const url = this.href;
                const loader = document.getElementById('loader');
                loader.style.display = 'flex';

                // Déclenche la redirection après l'animation
                setTimeout(() => {
                    window.location.href = url;
                }, 200); // Durée pendant laquelle l'animation est visible avant la redirection
            });
        });

        // Optionnel: cacher le loader lorsqu'une page se charge complètement
        window.addEventListener('load', () => {
            const loader = document.getElementById('loader');
            loader.style.display = 'none';
        });
    </script>
</body>
</html>
