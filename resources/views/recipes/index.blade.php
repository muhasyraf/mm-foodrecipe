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
                            <div class="d-flex flex-row justify-content-start align-items-center">
                                <a href="{{ route('recipes.show', $recipe) }}"
                                    class="btn btn-primary mt-auto me-1 flex-grow-1">Show
                                    Recipe</a>
                                <div>
                                    @if (Auth::user()->likesRecipe($recipe))
                                        <form action="{{ route('recipes.unlike', $recipe->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="nav-link fs-5"><span
                                                    class="fa-solid fa-heart"></span>
                                                {{ $recipe->likes()->count() }}</button>
                                        </form>
                                    @else
                                        <form action="{{ route('recipes.like', $recipe->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="nav-link fs-5"><span
                                                    class="fa-regular fa-heart"></span>
                                                {{ $recipe->likes()->count() }}</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
