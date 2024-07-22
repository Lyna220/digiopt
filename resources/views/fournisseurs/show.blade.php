<!DOCTYPE html>
<html>
<head>
    <title>Détails Fournisseur</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>
<div class="container">
    <h1>Détails Fournisseur</h1>
    <p><strong>Société:</strong> {{ $fournisseur->societe }}</p>
    <p><strong>Responsable:</strong> {{ $fournisseur->responsable }}</p>
    <p><strong>Adresse:</strong> {{ $fournisseur->adresse }}</p>
    <p><strong>Ville:</strong> {{ $fournisseur->ville }}</p>
    <p><strong>Téléphone:</strong> {{ $fournisseur->telephone }}</p>
    <p><strong>Mobile:</strong> {{ $fournisseur->mobile }}</p>
    <p><strong>Email:</strong> {{ $fournisseur->email }}</p>
    <p><strong>ICE:</strong> {{ $fournisseur->ice }}</p>
    <p><strong>Observation:</strong> {{ $fournisseur->observation }}</p>

    <a href="{{ route('fournisseurs.edit', $fournisseur->id) }}" class="btn btn-warning">Modifier</a>
    <a href="{{ route('fournisseurs.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
</body>
</html>
