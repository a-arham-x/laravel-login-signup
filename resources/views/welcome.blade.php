@extends("layout")
@section("title", "Home Page")
@section("content")
    <!-- {{auth()->user()}} -->
    @auth
    <h1>Name: {{auth()->user()->name}}</h1>
    <h2>Email: {{auth()->user()->email}}</h2>
    @endauth
@endsection