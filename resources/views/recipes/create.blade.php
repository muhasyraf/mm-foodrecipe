<x-layout>
    <div class="container d-flex justify-content-center py-2 px-2">
        <form action="{{ route('recipes.store') }}" method="post" class="w-75" enctype="multipart/form-data">
            @csrf
            <h1>Buat Resep Baru</h1>
            <div class="d-flex flex-column">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
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
    </div>
</x-layout>
<script>
    function addIngredientsField(addElement) {
        let addButton = document.querySelector("#addMoreIngredients");

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
