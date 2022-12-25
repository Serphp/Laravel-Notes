@extends('layouts.app')

<style>
    .container {
        display: flex;
        flex-direction: column wrap;
        justify-content: center;
        align-items: center;
        text-decoration: none;
    }
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
        font-weight: bold; 
    }
</style>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Note') }} - {{ "Create by: ".$note->user->name }}</div>

                    <div class="card-body">

                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title"
                                    value="{{ $note->title }}" required readonly>
                            </div>

                            <div class="mb-3"></div>

                            <label for="title"
                                class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description" required readonly> {{ $note->description }} </textarea>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <div class="container">
                                <button type="button" onclick="window.location='{{ route('notes.index') }}'"> Back </button>
                                <button type="button" class="" onclick="window.location='{{ route('notes.edit', $note->id) }}'"> Edit </button>
                                    <form action="{{{route('notes.destroy', $note->id)}}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete </button>
                                    </form>
                            </div>
                            </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
