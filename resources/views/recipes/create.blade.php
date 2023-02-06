<x-app-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une nouvelle recette') }}
        </h2>
    </x-slot:header>

    {{-- La logique back n'a rien à faire dans les vues en front mais pour me former rapidement j'ai décidé de laisser le code ainsi --}}
    {{-- @php
        $recipe = App\Models\Recipe::latest()->first();
        $recipe->ingredients->map(fn ($ingredient) => dump($ingredient->pivot->amount));
    @endphp --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-5">Créer votre nouvelle recette!</div>
            <form action="{{ route('recipes.store') }}" method="post">
                @csrf
    
                <x-input-label value="Titre de la recette" for="title"></x-input-label>
                <x-text-input name="title" id="title"></x-text-input>
    
                @foreach ($ingredients as $ingredient)
                {{-- @foreach (App\Models\Ingredient::all() as $ingredient) --}}
                <div class="my-5" x-data="{isEnabled: false}">
                    <x-input-label value="{{ $ingredient->name }}" for="{{ $ingredient->id }}"></x-input-label>
                    <x-text-input type="checkbox" id="{{ $ingredient->id }}" x-model="isEnabled"></x-text-input>
    
                    <x-text-input name="ingredients[{{ $ingredient->id }}][amount]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" x-bind:disabled="!isEnabled"></x-input>
                    <x-text-input name="ingredients[{{ $ingredient->id }}][unit]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" x-bind:disabled="!isEnabled"></x-input>
                </div>
                @endforeach
    
                <x-danger-button type="submit">Créer ma recette</x-danger-button>
            </form>
        </div>
    </div>
</x-app-layout>