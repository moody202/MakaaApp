<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- {!! Form::open(['method'=>'PUT']) !!} --}}
                    <form action="{{ route('posts.store') }}"  method="POST" enctype="multipart/form-data">

                    @csrf
                        <div class="form-group">
                            {{ Form::label('title','Title') }}
                            {{ Form::text('title','', ['class' => 'form-control', 'placeholder' =>'Title']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('body','Post') }}
                            {{ Form::textarea('body','', ['id'=>'article-ckeditor','class' => 'form-control', 'placeholder' =>'Post']) }}

                        </div>
                        <div class="form-group">
                            {{Form::file('cover_image')}}
                        </div>

                        <div class="form-group">
                            {{ Form::submit('submit', ['class' => 'btn btn-primary']) }}
                        </div>
                      {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
