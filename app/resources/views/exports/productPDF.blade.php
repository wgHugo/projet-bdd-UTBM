<!DOCTYPE html>
<html>
<head>
    <title>Liste d'utilisateurs</title>
</head>
<body>
<h1>Liste des produits</h1>
<table class="table table-striped">
    <thead>
    <tr>
        <td>ID</td>
        <td>Nom</td>
        <td>Auteur</td>
        <td>Catégorie</td>
        <td>Type</td>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
    <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->author}}</td>
        <td>{{$product->category->name}}</td>
        <td>{{$product->type->name}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
