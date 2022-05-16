@extends('layout.master')

@section('content')
    <div class="container mx-auto p-5 my-20 w-1/3 border border-gray-500 rounded-md p-5">
        <h1 class="text-center text-3xl font-bold underline">
            Contact Ivan
        </h1>
        <div id="laravelContact" class="my-10"></div>

        <h2 class="text-center text-2xl font-bold underline">
            <a href="{{ route('home') }}"><- Back to Home</a>
        </h2>
    </div>
@endsection

