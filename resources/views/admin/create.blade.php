<!DOCTYPE html>
<html>
<head>
    <title>Créer un Utilisateur</title>
</head>
<body>
    <h1>Créer un nouvel utilisateur</h1>
    <form action="{{ route('admin.store') }}" method="POST">
        @csrf
        <label for="name">Nom</label>
        <input type="text" name="name" required>
        <label for="email">Email</label>
        <input type="email" name="email" required>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" required>
        <label for="password_confirmation">Confirmer le mot de passe</label>
        <input type="password" name="password_confirmation" required>
        <button type="submit">Créer</button>
    </form>
</body>
</html>
