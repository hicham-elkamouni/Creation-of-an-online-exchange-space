@extends('layouts.app') {{-- layouts/app --}}

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-gray-50 p-6 rounded-lg">
            <h1 class="mb-4 text-center">POSTS</h1>
            <form action="{{route('posts')}}" method="post" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 
                    border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" 
                    placeholder="Feel Free to post whatever you want"></textarea>
                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded font-meduim">
                        POST
                    </button>
                </div>
            </form>

            <div class="my-3">
                @foreach ($posts as $post)
                <div class="border-2 border- my-4 p-4 rounded-lg">
                    <a href="" class="text-red-600 font-bold ">{{ $post->user->name }}</a>
                    <p class="my-2 text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</p>
                    <p class="mb-5">{{ $post->body }}</p>
                    
                        <form action="{{route('posts.destroy', $post)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    
                </div>
                @endforeach
                <div class="">

                </div>

                {{ $posts->links()}}
            </div>
        </div>
    </div>
@endsection 