@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="rowserph">
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
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">
                                    {{ __('Share with:') }}
                                    <ul>
                                    @foreach ($note->shared as $u)
                                        <li>{{ $u->name }}</li>
                                    @endforeach
                                    <ul>
                                </label>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <div class="container">
                                <form action="{{{route('notes.destroy', $note->id)}}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <div class="bcontainer">
                                <button type="button" class="buttonCreate" onclick="window.location='{{ route('notes.index') }}'"> Back </button>
                                <button type="button" class="buttonCreate" onclick="window.location='{{ route('notes.edit', $note->id) }}'"> Edit </button>
                                <button class="buttonCreate" type="submit">Delete </button>
                                </div>
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
