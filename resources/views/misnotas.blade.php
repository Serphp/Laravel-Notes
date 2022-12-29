@php
use Carbon\Carbon;
@endphp

@extends('layouts.app')


@section('content')
        <div class="rowserph">
            <div class="col-md-8">
                    <div class="container3">

                    {{-- <button id="button1">Mostrar texto</button>
                    <button id="button2">Mostrar imagen</button>
                    <div id="output"></div> --}}

                        <div class="flex1">
                        <button class="buttonCreate" type="button" onclick="window.location='{{ route('notes.create') }}'"> Create Note </button>
                        </div>
                    </div>

                    {{-- Muestra mis notas --}}
                    @foreach (App\Models\Note::all()->where('user_id', Auth::id()) as $item)
                    <div class="card2">
                        <div class="xcontainer">
                            <div class="flexbutton">
                                {{-- @if ($user->role == 'admin')
                                <button>Hacer algo</button>
                                @endif --}}
                <h5><a  href="{{ route('notes.show', $item->id) }}"> 
                    {!! e($item->title) !!} </a>
                            </div>
                            
                        <div class="xicon">
                            <a href="{{ route('notes.show', $item->id) }}">
                            <i class="fa-solid fa-eye"></i>
                            </a>
                        </div>
                        <div class="xicon">
                            <a href="{{ route('notes.edit', $item->id) }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </div>
                        <div class="xicon">  {{-- ICONO DELETE  --}}
                        <a href="{{ route('notes.destroy', $item->id) }}">                             
                        <i class="fa-solid fa-trash"></i>
                        </a>
                        </div>
                    </div>
                    <div class="xname">
                        {!! e($item->user->name) !!}
                    </div>
                    
                    <div class="content">
                    <div class="description">
                    {!! e($item->description) !!}
                    
                    </div>

                    <div class="hour">
                        {!! e(Carbon::parse($item->created_at)->diffForHumans()) !!}
                    </div>
                    
                </div>
                {{-- end justify --}}
                </div>
        @endforeach
@endsection
