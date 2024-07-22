<!DOCTYPE html>
<html>
<head>
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>
    <h1>Liste des Produits</h1>
    <a href="{{ route('produits.create') }}">Ajouter un Produit</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Référence</th>
                <th>Désignation</th>
                <th>Catégorie</th>
                <th>Fournisseur</th>
                <th>Qté en stock</th>
                <th>Prix d’achat</th>
                <th>Prix de vente</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produits as $produit)
                <tr>
                    <td>{{ $produit->id }}</td>
                    <td>{{ $produit->reference }}</td>
                    <td>{{ $produit->designation }}</td>
                    <td>{{ $produit->categorie }}</td>
                    <td>{{ $produit->fournisseur->societe }}</td>
                    <td>{{ $produit->quantite_stock }}</td>
                    <td>{{ $produit->prix_achat }}</td>
                    <td>{{ $produit->prix_vente }}</td>
                    <td>
                        <a href="{{ route('produits.show', $produit->id) }}">Voir</a>
                        <a href="{{ route('produits.edit', $produit->id) }}">Modifier</a>
                        <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('home') }}" class="btn btn-primary">Retour à l'accueil</a>

</body>
</html>
