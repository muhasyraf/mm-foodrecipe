<x-layout>
    <div class="container d-flex justify-content-center p-2">
        <div class="row row-cols-3 justify-content-center">
            @php
                $reversedRecipes = $recipes->reverse();
            @endphp
            @foreach ($reversedRecipes as $recipe)
                <div class="col m-2 d-flex align-items-stretch" style="width: 18rem">
                    <div class="card p-2">
                        <img src="{{ url('storage/' . $recipe->image) }}" style="height: 200px">
                        <div class="card-body d-flex flex-column" style="max-height: 25ch">
                            <h5 class="card-title">{{ $recipe->title }}</h5>
                            <p class="card-text overflow-auto">{{ $recipe->description }}</p>
                            <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-primary mt-auto">Show Post</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
