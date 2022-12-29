@php
use Carbon\Carbon;
@endphp

@extends('layouts.app')

<script> 
const card2 = document.querySelector('.card2');

card2.addEventListener('click', () => {
    card2.classList.toggle('is-flipped');

});

</script>
@section('content')
        <div class="rowserph">
            <div class="col-md-8">
                    <div class="container3">
                        <div class="flex1">
                        <button class="buttonCreate" type="button" onclick="window.location='{{ route('notes.create') }}'"> Create Note </button>
                        </div>
                    </div>

                    @foreach ($notes as $item)
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
{{-- <div class="container">
    <table class="table">
        <thead>
            <tr>
                <th> Title </th>
                <th>By</th>
                <th> Create </th>
                <th> Description </th>
                <th> Actions </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($notes as $item)

                <tr>
                    <td>{!! e($item->title) !!}</td>
                    <td>{!! e($item->user->name) !!}</td>
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
</div> --}}