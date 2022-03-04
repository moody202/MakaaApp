<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('POSTS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if (count($posts) > 0)

                    @foreach ($posts as $post )
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-white border-b border-gray-300">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                                        </div>
                        <h3><a href="/posts/{{ $post->id }}">{{ __($post->title) }}</a></h3>
                        <small>{{ __('Written in') }} {{  $post->created_at  }}</small>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Show Post</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <x-button  class="btn btn-danger">Delete</x-button>
                        </form>
                        </div>
                        </div>
                            </div>
                            </div>
                                </div>

                    @endforeach
                    {{-- {{$post->links()}} --}}
                    @else
                    <p>{{ __('No posts Found') }}</p>

                    @endif





                </div>
            </div>
        </div>
    </div>
</x-app-layout>
