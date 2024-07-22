<!DOCTYPE html>
<html>
<head>
    <title>Liste des Factures</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Liste des Factures</h1>
    <a href="{{ route('factures.create') }}">Ajouter une Facture</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Numéro de Facture</th>
                <th>Date de Facture</th>
                <th>Client</th>
                <th>Status</th>
                <th>Total</th>
                <th>Remise</th>
                <th>Avance</th>
                <th>Reste à Payer</th>
                <th>Responsable</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($factures as $facture)
                <tr>
                    <td>{{ $facture->id }}</td>
                    <td>{{ $facture->numero_facture }}</td>
                    <td>{{ $facture->date_facture }}</td>
                    <td>{{ $facture->client->nom }} {{ $facture->client->prenom }}</td>
                    <td>{{ $facture->status }}</td>
                    <td>{{ $facture->total }} DH</td>
                    <td>{{ $facture->remise?? 'N/A'}} DH</td>
                    <td>{{ $facture->avance ?? 'N/A'}} DH</td>
                    <td>{{ $facture->reste_a_payer ?? 'N/A'}} DH</td>
                    <td>{{ $facture->responsable }}</td>
                    <td>
                        <a href="{{ route('factures.show', $facture->id) }}">Voir</a>
                        <a href="{{ route('factures.edit', $facture->id) }}">Modifier</a>
                        <form action="{{ route('factures.destroy', $facture->id) }}" method="POST" style="display:inline;">
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
