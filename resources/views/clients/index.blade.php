<!DOCTYPE html>
<html>
<head>
    <title>Liste des Clients</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Liste des Clients</h1>
    <a href="{{ route('clients.create') }}">Ajouter un Client</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Genre</th>
                <th>CIN</th>
                <th>Première Visite</th>
                <th>Dernière Visite</th>
                <th>Client Depuis</th>
                <th>Total Vente</th>
                <th>Total Règlement</th>
                <th>Reste dû</th>
                <th>Nombre Visites</th>
                <th>Assurance</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->nom }}</td>
                    <td>{{ $client->prenom }}</td>
                    <td>{{ $client->telephone }}</td>
                    <td>{{ $client->adresse }}</td>
                    <td>{{ $client->genre }}</td>
                    <td>{{ $client->cine }}</td>
                    <td>{{ $client->premiere_visite ? \Carbon\Carbon::parse($client->premiere_visite)->format('d/m/Y') : 'N/A' }}</td>
                    <td>{{ $client->derniere_visite ? \Carbon\Carbon::parse($client->derniere_visite)->format('d/m/Y') : 'N/A' }}</td>
                    <td>{{ $client->client_depuis ? \Carbon\Carbon::parse($client->client_depuis)->format('d/m/Y') : 'N/A' }}</td>
                    <td>{{ $client->total_vente }}</td>
                    <td>{{ $client->total_reglement }}</td>
                    <td>{{ $client->reste_du }}</td>
                    <td>{{ $client->nombre_visite }}</td>
                    <td>{{ $client->assurance }}</td>
                    <td>
                        <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('home') }}" class="btn btn-primary">Retour à l'accueil</a>
</body>
</html>
