@extends('layouts.app')

<style>
    button {
        border-radius: 5px 5px  5px 5px;
        margin: 5px;
        padding: 5px;
        background-color: rgba(0, 0, 0, 0.1);
        border: none;

    }

    button:hover {
        text-decoration: underline;
        background-color: rgba(0, 0, 0, 0.326); 
    }
    a {
        text-decoration: none;
        font-weight: bold;
    }
</style>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Note') }}</div>

                    <div class="card-body">
                        {{-- change route notes 3 --}}
                        <form action="{{{ $isEdit ? route('notes.update', $note->id) : route('notes.store')}}}" method="POST">
                        @csrf
                        @if ($isEdit)
                            @method('PUT')
                        @endif

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Titulo') }}
                            </label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title"
                                    value="{{$isEdit ? $note->title : ''}}">
                            </div>

                            <div class="mb-3"></div>

                            <label for="title"
                                class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description"> 
                                    {{$isEdit ? $note->description : ''}}
                                </textarea>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">

                                <button type="submit" class=""> {{$isEdit ? "Update" : "Create"}} </button>
                                {{-- <a href="{{{route('notes.destroy', $note->id)}}}"> Delete </a> --}}
                            </form>
                            </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
