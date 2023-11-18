<x-layout>
    <div class="container d-flex justify-content-center py-4 px-8">
        <div class="d-flex flex-column">
            <img src="{{ url('storage/' . $recipe->image) }}" alt="" width="300px" class="align-self-center mb-2">
            <div class="mb-2">
                <h1 class="display-4 fw-bold">{{ $recipe->title }}</h1>
                <p class="fs-5">{{ $recipe->description }}</p>
            </div>
            <div class="mb-2">
                <h1 class="display-6 fw-bold">Bahan-bahan</h1>
                @php
                    $ingredients = json_decode($recipe->ingredients);
                @endphp
                <ul class="fs-5" style="list-style: none">
                    @foreach ($ingredients as $ingredient)
                        <li>{{ $ingredient }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="mb-2">
                <h1 class="display-6 fw-bold">Cara Membuat</h1>
                @php
                    $steps = json_decode($recipe->steps);
                @endphp
                <ol class="fs-5">
                    @foreach ($steps as $step)
                        <li>{{ $step }}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
    <h2><a href="{{ route('recipes.index') }}">Back</a></h2>
</x-layout>
