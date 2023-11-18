<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Recipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container p-2">
        <h1>Buat Resep Baru</h1>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('recipes.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            <div class="d-flex flex-column p-2">
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" cols="10" rows="3" class="form-control" required></textarea>
                </div>
                <div class="mb-3" id="ingredientList">
                    <label for="ingredients">Ingredients</label>
                    <input type="text" name="ingredients[]" class="form-control mb-1 ingredientsField" required>
                    <input type="text" name="ingredients[]" class="form-control mb-1 ingredientsField" required>
                    <button type="button" class="btn btn-secondary" id="addMoreIngredients"
                        onclick="addIngredientsField(this)">+ Add more</button>
                </div>
                <div class="mb-3" id="stepList">
                    <label for="steps">Steps</label>
                    <input type="text" name="steps[]" class="form-control mb-1 stepsField" required>
                    <input type="text" name="steps[]" class="form-control mb-1 stepsField" required>
                    <button type="button" class="btn btn-secondary" id="addMoreSteps" onclick="addStepsField(this)">+
                        Add more</button>
                </div>
                <div class="div mb-3">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan Resep</button>
            </div>
        </form>
        <h3><a href="{{ route('recipes.index') }}">Back</a></h3>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script>
    function addIngredientsField(addElement) {
        let addButton = document.querySelector("#addMoreIngredients");
        // if (addElement.previousElementSibling.value.trim() === "") {
        //     return false;
        // }
        let inputParrent = document.querySelector("#ingredientList");
        // new input field
        let newInput = document.createElement("input");
        newInput.setAttribute("type", "text");
        newInput.setAttribute("name", "ingredients[]");
        newInput.setAttribute("class", "form-control mb-1 ingredientsField");

        //show delete field button
        let deleteButton = document.createElement("button");
        deleteButton.setAttribute("type", "button");
        deleteButton.setAttribute("class", "btn btn-danger");
        deleteButton.setAttribute("onclick", "removeIngredientsField(this)");
        deleteButton.setAttribute("id", "deleteIngredientsField");
        let deleteText = document.createTextNode("Delete field");
        deleteButton.appendChild(deleteText);

        inputParrent.insertBefore(newInput, addButton);
        if (!document.querySelector("#deleteIngredientsField")) {
            inputParrent.appendChild(deleteButton);
        } else {
            return false;
        }
    }

    function removeIngredientsField(minusElement) {
        let getLastChildField = document.querySelector("#ingredientList > input:nth-last-child(3)");
        if (document.querySelector("#ingredientList > input:nth-child(3)")) {
            getLastChildField.remove();
        } else {
            return false;
        }
        if (!document.querySelector("#ingredientList > input:nth-child(3)")) {
            document.querySelector("#deleteIngredientsField").remove();
        } else {
            return false;
        }
    }

    function addStepsField(addElement) {
        let addButton = document.querySelector("#addMoreSteps");
        // if (addElement.previousElementSibling.value.trim() === "") {
        //     return false;
        // }
        let inputParrent = document.querySelector("#stepList");
        // new input field
        let newInput = document.createElement("input");
        newInput.setAttribute("type", "text");
        newInput.setAttribute("name", "steps[]");
        newInput.setAttribute("class", "form-control mb-1 stepsField");

        //show delete field button
        let deleteButton = document.createElement("button");
        deleteButton.setAttribute("type", "button");
        deleteButton.setAttribute("class", "btn btn-danger");
        deleteButton.setAttribute("onclick", "removeStepsField(this)");
        deleteButton.setAttribute("id", "deleteStepsField");
        let deleteText = document.createTextNode("Delete field");
        deleteButton.appendChild(deleteText);

        inputParrent.insertBefore(newInput, addButton);
        if (!document.querySelector("#deleteStepsField")) {
            inputParrent.appendChild(deleteButton);
        } else {
            return false;
        }
    }

    function removeStepsField(minusElement) {
        let getLastChildField = document.querySelector("#stepList > input:nth-last-child(3)");
        if (document.querySelector("#stepList > input:nth-child(3)")) {
            getLastChildField.remove();
        } else {
            return false;
        }
        if (!document.querySelector("#stepList > input:nth-child(3)")) {
            document.querySelector("#deleteStepsField").remove();
        } else {
            return false;
        }
    }
</script>

</html>
