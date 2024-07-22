<!DOCTYPE html>
<html>
<head>
    <title>Liste des Ventes</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>
    <h1>Liste des Ventes</h1>
    <a href="{{ route('ventes.create') }}">Ajouter une Vente</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>N° Facture</th>
                <th>Date de Facture</th>
                <th>Client</th>
                <th>Status</th>
                <th>Total</th>
                <th>remise</th>
                <th>avance</th>
                <th>reste_a_payer</th>
                <th>responsable</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventes as $vente)
                <tr>
                    <td>{{ $vente->id }}</td>
                    <td>{{ $vente->numero_facture }}</td>
                    <td>{{ $vente->date_facture }}</td>
                    <td>{{ $vente->client->nom }} {{ $vente->client->prenom }} </td>
                    <td>{{ $vente->status }}</td>
                    <td>{{ $vente->total }} DH</td>
                    <td>{{ $vente->remise }} DH</td>
                    <td>{{ $vente->avance }} DH</td>
                    <td>{{ $vente->reste_a_payer }} DH</td>
                    <td>{{ $vente->responsable }} </td>
                    <td>
                        <a href="{{ route('ventes.show', $vente->id) }}">Voir</a>
                        <a href="{{ route('ventes.edit', $vente->id) }}">Modifier</a>
                        <form action="{{ route('ventes.destroy', $vente->id) }}" method="POST" style="display:inline;">
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
