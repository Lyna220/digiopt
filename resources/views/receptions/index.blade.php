<!DOCTYPE html>
<html>
<head>
    <title>Liste des Réceptions</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Liste des Réceptions</h1>
    <a href="{{ route('receptions.create') }}">Ajouter une Réception</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>N° Réception</th>
                <th>Date de Réception</th>
                <th>Fournisseur</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Référence</th> <!-- Correction : ajout de la colonne Référence -->
                <th>Responsable</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($receptions as $reception)
                <tr>
                    <td>{{ $reception->id }}</td>
                    <td>{{ $reception->numero_reception }}</td>
                    <td>{{ $reception->date_reception }}</td> <!-- Format de date -->
                    <td>{{ $reception->fournisseur->societe }}</td>
                    <td>{{ $reception->produit->designation }}</td>
                    <td>{{ $reception->quantite }}</td>
                    <td>{{ $reception->reference }}</td> <!-- Correction : affichage de la référence -->
                    <td>{{ $reception->responsable }}</td>
                    <td>
                        <a href="{{ route('receptions.show', $reception->id) }}">Voir</a>
                        <a href="{{ route('receptions.edit', $reception->id) }}">Modifier</a>
                        <form action="{{ route('receptions.destroy', $reception->id) }}" method="POST" style="display:inline;">
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
