<!DOCTYPE html>
<html>
<head>
    <title>Liste des Stocks</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>

<div class="container">
        <h1>Stocks</h1>
        <a href="{{ route('stocks.create') }}" class="btn btn-primary">ajouter</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Référence</th>
                    <th>Désignation</th>
                    <th>Catégorie</th>
                    <th>Stock Min</th>
                    <th>Stock Max</th>
                    <th>Stock Réel</th>
                    <th>Prix de Vente</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stocks as $stock)
                    <tr>
                        <td>{{ $stock->produit->reference ?? 'Non défini' }}</td>
                        <td>{{ $stock->produit->designation ?? 'Non défini' }}</td>
                        <td>{{ $stock->produit->categorie ?? 'Non défini' }}</td>
                        <td>{{ $stock->stock_min }}</td>
                        <td>{{ $stock->stock_max }}</td>
                        <td>{{ $stock->stock_reel }}</td>
                        <td>{{ $stock->prix_vente }}</td>
                        <td>
                            <a href="{{ route('stocks.show', $stock->id) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('stocks.edit', $stock->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('home') }}" class="btn btn-primary">Retour à l'accueil</a>

</body>
</html>
