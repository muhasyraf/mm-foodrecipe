<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resep Makanan</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th colspan="4">List of Recipes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            @foreach ($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->id }}</td>
                    <td>{{ $recipe->title }}</td>
                    <td><img src="{{ url('storage/' . $recipe->image) }}" alt="" height="150px"></td>
                    <td>
                        <a href="{{ route('recipes.show', $recipe) }}"><button>Show Details</button></a>
                        <form action="{{ route('recipes.destroy', $recipe) }}" method="post">
                            @method('delete')
                            @csrf
                            <button>Delete recipe</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h2><a href="{{ route('recipes.create') }}">Create New Recipe</a></h2>
</body>

</html>
