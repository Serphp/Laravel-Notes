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
        border-radius: 5px 5px 5px 5px;
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
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container justify-content-center">
                    <h1> Notes </h1>
                    <h2>|</h2>
                    <button type="button" onclick="window.location='{{ route('notes.create') }}'"> Create </button>
                </div>

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
                                <td>{!! e($item->created_at) !!}</td>
                                <td>{!! e($item->description) !!}</td>
                                <td><a href="{{ route('notes.show', $item->id) }}"> Show </a></td>
                                <td><a href="{{ route('notes.edit', $item->id) }}"> Edit </a></td>
                                <td>
                                    <form action="{{ route('notes.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"> Delete </button>
                                    </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
