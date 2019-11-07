<!DOCTYPE html>
<html>
<head>
    <title>Liste des Entrées/Sorties du jour</title>
</head>
<body>
<h1>Retours d'oeuvres</h1>
<table class="table table-striped">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Auteur</td>
        <td>Utilisateur rendant</td>
    </tr>
    </thead>
    <tbody>
    @foreach($in as $resa)
    <tr>
        <td>{{$resa->id}}</td>
        <td>{{$resa->product->name}}</td>
        <td>{{$resa->product->author}}</td>
        <td>{{$resa->user->name}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
<h1>Emprunts du jour</h1>
<table class="table table-striped">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Auteur</td>
        <td>Utilisateur empruntant</td>
    </tr>
    </thead>
    <tbody>
    @foreach($out as $resa)
    <tr>
        <td>{{$resa->id}}</td>
        <td>{{$resa->product->name}}</td>
        <td>{{$resa->product->author}}</td>
        <td>{{$resa->user->name}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
