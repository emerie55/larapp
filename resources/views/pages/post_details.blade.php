@extends('layout.app_layout', ['active' => "categories"])

@section('head_extras')
    <title>Manage Category</title>
@endsection

@section('page_content')
    <div class="container max-w-6xl mx-auto px-4 py-5">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            {{-- First Column --}}
            <div class="col-span-2 py-4 bg-blue-300 px-4">
                <h2 class="text-3xl font-bold capitalize">{{ $post->title }}</h2>
                <p>By: {{ $post->author->name }}</p>

                <div class="my-8">
                    {!! $post->content !!}
                </div>
            </div>


            


            {{-- Second Column --}}
            <div class="py-4 bg-blue-900 text-white">
                <h2 class="py-2 px-3 font-bold text-2xl">
                    Other Posts
                </h2>
                <ul class="divide-y divide-gray-600">
                    @foreach ($otherpost as $post)
                        <li class="px-3 py-1 bg-white bg-opacity-25">
                            <a href="{{ url('/posts/read-post/' . $post->id) }}">
                                <h2 class="font-bold text-xl">
                                    {{ $post->title }}
                                </h2>
                                <small>
                                    <span>{{ $post->category->category }}</span> <br>
                                    <i> Author: {{ $post->author->name }}</i>
                                </small>
                            </a>
                        </li>
                    @endforeach
                    {{ $otherpost->links() }}
                </ul>
            </div>
        </div>
    </div>
@endsection