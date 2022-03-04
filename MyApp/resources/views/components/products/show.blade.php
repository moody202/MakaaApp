<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('products.index') }}"><x-button class="btn btn-primary">{{ __('products') }}</x-button></a>
                  <h1>{{ __($product->name) }}</h1>
                  <x-button>{{ __('Price = ') }}{{ _($product->price) }}</x-button>
                  <span>{{ __($product->description) }}</span>
                  <small>{{ __($product->comment) }}</small>

                  <hr>
                  <small>{{ $product->created_at  }}</small>

                  <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Show product</a>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-default">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" >
                    @csrf
                    @method('DELETE')
                    <x-button  class="btn btn-danger">Delete</x-button>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
