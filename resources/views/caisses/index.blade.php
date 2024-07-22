<!DOCTYPE html>
<html>
<head>
    <title>Liste des Caisse</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>
    <h1>Liste des Caisse</h1>
    <a href="{{ route('caisses.create') }}">Ajouter un Enregistrement</a>
    <form action="{{ route('caisses.index') }}" method="GET">
    <h2>Filtrer par date:</h2>
    <label for="start_date">Date de début:</label>
    <input type="date" name="start_date" id="start_date">
    <label for="end_date">Date de fin:</label>
    <input type="date" name="end_date" id="end_date">
    <button type="submit">Filtrer</button>
</form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Date de Facture</th>
                <th>Status</th>
                <th>Client</th>
                <th>Paiement</th>
                <th>Actions</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($caisses as $caisse)
                <tr>
                    <td>{{ $caisse->id }}</td>
                    <td>{{ $caisse->date_facture }}</td>
                    <td>{{ $caisse->status }}</td>
                    <td>{{ $caisse->client->nom }} {{ $caisse->client->prenom }}   </td>
                    <td>{{ $caisse->paiement }}</td>
                    <td>
                        <a href="{{ route('caisses.show', $caisse->id) }}">Voir</a>
                        <a href="{{ route('caisses.edit', $caisse->id) }}">Modifier</a>
                        <form action="{{ route('caisses.destroy', $caisse->id) }}" method="POST" style="display:inline;">
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
