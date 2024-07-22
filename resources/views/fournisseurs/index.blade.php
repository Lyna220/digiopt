<!DOCTYPE html>
<html>
<head>
    <title>Liste des Fournisseurs</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>
<div class="container">
    <h1>Liste des Fournisseurs</h1>
    <a href="{{ route('fournisseurs.create') }}" class="btn btn-primary mb-3">Ajouter un Fournisseur</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Société</th>
                <th>Responsable</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fournisseurs as $fournisseur)
                <tr>
                    <td>{{ $fournisseur->id }}</td>
                    <td>{{ $fournisseur->societe }}</td>
                    <td>{{ $fournisseur->responsable }}</td> 
                    <td>{{ $fournisseur->adresse }}</td>
                    <td>
                        <a href="{{ route('fournisseurs.show', $fournisseur->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('fournisseurs.edit', $fournisseur->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('fournisseurs.destroy', $fournisseur->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('home') }}" class="btn btn-secondary">Retour à l'accueil</a>
</div>
</body>
</html>
