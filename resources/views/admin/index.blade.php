<!DOCTYPE html>
<html>
<head>
    <title>Admin - Utilisateurs</title>
</head>
<body>
    <h1>Utilisateurs</h1>
    <a href="{{ route('admin.create') }}">Créer un nouvel utilisateur</a>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $user->id) }}">Éditer</a>
                        <form action="{{ route('admin.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
