<!DOCTYPE html>
<html>
<head>
    <title>Liste d'utilisateurs</title>
</head>
<body>
<h1>Liste des utilisateurs</h1>
<table class="table table-striped">
    <thead>
    <tr>
        <td>ID</td>
        <td>Nom</td>
        <td>Email</td>
        <td>Nombre d'emprunts</td>
    </tr>
    </thead>
    <tbody>
@foreach($users as $user)
<tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->loans_count}}</td>
</tr>
@endforeach
    </tbody>
</table>
</body>
</html>
