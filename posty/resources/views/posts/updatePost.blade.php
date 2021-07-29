@extends('layouts.app')

@section('content')

<div class="flex justify-center pb-3">
    <div class="w-4/12 bg-gray-50 p-6 rounded-lg">
        <h1 class="mb-4 text-center">POST</h1>
        <form action="{{route('post.update')}}" method="post" class="mb-4">
            @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <input type="hidden" name="id" value="{{$data[0]['id']}}">
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 
                    border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" 
                    placeholder="Feel Free to post whatever you want">{{$data[0]['body']}}</textarea>
                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            <div>
                <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-4 border 
                            border-blue-500 hover:border-transparent rounded">
                    UPDATE
                </button>
            </div>
        </form>
    </div>
</div>


@endsection