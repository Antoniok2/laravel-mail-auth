@extends('layouts.main-layout')

@section('content')

    <h1>Listato Videogames</h1>
    <Videogame-component user="{{Auth::check()}}"></Videogame-component>
    
@endsection