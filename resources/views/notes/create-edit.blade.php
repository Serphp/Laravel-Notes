@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="rowserph">
            <div class="col-md-8">
                <div class="">
                    <h2 style="color: white;">{{ __('Note') }}</h2>

                    <div class="card2">
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
                            <label for="title" class="col-md-3 col-form-label text-md-end">
                                <h5> {{ __('Title') }} </h5>
                            </label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form" name="title"
                                    value="{{$isEdit ? $note->title : ''}}">
                            </div>

                            <div class="mb-3"></div>
                            <label for="title"
                                class="col-md-3 col-form-label text-md-end">
                                <h5>  {{ __('Description') }} </h5>
                            </label>
                            <div class="col-md-6">
                                <textarea id="description" type="description" class="form" name="description" value=""> 
                                    {{$isEdit ? $note->description : htmlspecialchars('')}}
                                </textarea>
                            </div>

                            <div class="mb-3"></div>
                            <label for="title"
                                class="col-md-3 col-form-label text-md-end">
                                <h5> {{ __('Share Notes') }} </h5>
                                </label>
                            <div class="col-md-6">
                                <select name="share[]" class="selectm form" id="share" multiple>
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
                                        <button type="button" class="buttonCreate" onclick="window.location='{{ route('notes.index') }}'"> Back </button>
                                <button type="submit" class="buttonCreate"> {{$isEdit ? "Update" : "Create"}} </button>
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
