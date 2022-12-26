@php
use Carbon\Carbon;
@endphp

@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container justify-content-center">
                    <h1> Notes </h1>
                    <h2>| Bienvenida </h2>
                    
                    <div class="bcontainer2">
                    <div class="flex1">
                    <button type="button" onclick="window.location='{{ route('notes.create') }}'"> Create </button>
                    </div>
                    <div class="flex2">
                        <h2> Hola </h2>
                    </div>
                </div>
                </div>
                <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th> Title </th>
                            <th> Create </th>
                            <th> Description </th>
                            <th> Actions </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($notes as $item)
                        {{-- @foreach (\App\Models\Note::all() as $item) --}}
                            <tr>
                                <td>{!! e($item->title) !!}</td>
                                <td>{!! e(Carbon::parse($item->created_at)->diffForHumans()) !!}</td>
                                
                                <td>{!! e($item->description) !!}</td>
                                <div class="bcontainer">
                                <td><button class="button"><a  href="{{ route('notes.show', $item->id) }}">Show </a></button></td>
                                <td><a href="{{ route('notes.edit', $item->id) }}"> Edit </a></td>
                                <td>
                                    <form action="{{ route('notes.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"> Delete </button>
                                    </form>
                                </td>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
@endsection
