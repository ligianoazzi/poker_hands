@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ trans('home.new_game') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="post"
                              action="{{ route('users.files.store', ['user' => auth()->user()->id]) }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">

                                    <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">

   

                                <div class="form-group col-md-12">
                                    <label for="file">{{ trans('home.choose_file') }}</label>
                                    <input type="file" class="form-control-file" id="file" name="file" accept=".txt">
                                    @if ($errors->has('file'))
                                        <small class="form-text text-muted">
                                            {{ $errors->first('file') }}
                                        </small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">
                                        {{ trans('home.upload') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ trans('home.games') }} ({{ count($games) }})
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">{{ trans('home.filename') }}</th>
                                <th scope="col">{{ trans('home.details') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($games as $game)
                                <tr>
                                    <th scope="row">{{ $game->id }}</th>
                                    <td>{{ $game->file->getOriginal('filename') }}</td>
                                    <td>
                                        <a href="{{ route('games.show', ['game' => $game->id]) }}">
                                            {{ trans('home.show_details') }}
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
