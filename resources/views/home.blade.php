@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' Notas ') }}\ Perfil \ {{ Auth::user()->id }}
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                        {{ __('You are logged in!') }}
                    </div>
                @endif
                </div>

                <div class="card-body" style="text-align: center">
                    <p> {{ Auth::user()->name }} </p>
                    <p> {{ Auth::user()->email }} </p>
                    <p> {{ Auth::user()->created_at }} </p>
                    <p> {{ Auth::user()->updated_at }} </p>
                    
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <a href="{{ route('notes.index') }}" style="color: white; text-decoration: none;"> ir a Notas</a>
                        </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
