@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Note') }}</div>

                    <div class="card-body">
                        {{-- <div>
                        @if ($error->any())
                            @foreach ($error->all() as $e)
                                {{$e}}
                            @endforeach
                        @endif
                        </div> --}}
                        {{-- change route notes 3 --}}
                        <form action="{{{ $isEdit ? route('notes.update', $note->id) : route('notes.store')}}}" method="POST">
                        @csrf
                        @if ($isEdit)
                            @method('PUT')
                        @endif

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}
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

                            <div class="mb-3"></div>
                            <label for="title"
                                class="col-md-4 col-form-label text-md-end">{{ __('Share Notes') }}</label>
                            <div class="col-md-6">
                                <select name="share[]" class="selectm" id="share" multiple>
                                    {{-- muestra los usuarios exepto al creador de la nota --}}
                                    @foreach (App\Models\User::all()->except(Auth::id()) as $user)
                                        <option value="{{$user->id}}" 
                                            {{$isEdit && $note->share == $user->id ? 'selected' : ''}}>
                                            {{$user->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <div class="bcontainer">
                                <button type="submit" class=""> {{$isEdit ? "Update" : "Create"}} </button>
                                {{-- <a href="{{{route('notes.destroy', $note->id)}}}"> Delete </a> --}}
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
@endsection
