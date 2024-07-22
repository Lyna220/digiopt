<!DOCTYPE html>
<html>
<head>
    <title>Éditer Utilisateur</title>
</head>
<body>
    <h1>Éditer Utilisateur</h1>
    <form action="{{ route('admin.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nom</label>
        <input type="text" name="name" value="{{ $user->name }}" required>
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $user->email }}" required>
        <label for="password">Mot de passe (laissez vide si pas de changement)</label>
        <input type="password" name="password">
        <label for="password_confirmation">Confirmer le mot de passe</label>
        <input type="password" name="password_confirmation">
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>
