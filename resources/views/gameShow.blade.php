@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <a href="{{ url('/home') }}">Home</a>

                        | {{ trans('home.game_id', ['id' => $game->id]) }} |

                        <span style="float: right;">
                            <form method="post" action="{{ route('games.destroy', ['game' => $game->id]) }}" class="text-right d-inline-block">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">
                                    {{ trans('home.delete') }}
                                </button>
                            </form>
                        </span>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"> </th>
                                <th scope="col">Player 1</th>
                                <th scope="col">Player 2</th>
                                <th scope="col">Winner</th>                                
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($game->lines as $line)
                                <tr>
                                    <th scope="row">{{ $line['line'] }}</th>
                                    
                                    <td>
                                        @foreach($line['user'] as $linePlayer1)
                                           <img style="padding: 5px; height: 100px" src="/storage/assets/images/cards/{{$linePlayer1}}.png"/> 
                                        @endforeach        
                                    </td>
                                    <td>
                                        @foreach($line['opponent'] as $linePlayer2)
                                           <img style="padding: 5px; height: 100px" src="/storage/assets/images/cards/{{$linePlayer2}}.png"/>
                                        @endforeach        
                                    </td>                                    
                                    
                                    <td>
                                        <b><u>Line Result</u></b> <br>{{ $gameController->checkWinner(implode(",", $line['user']), implode(",", $line['opponent'])) }}
                                    </td>

                                </tr>
 
                            @endforeach

                            </tbody>
                            <div class="jumbotron">
                                <h1 class="display-5">
                                    P1 Total Winner: <?=$_SESSION["P1Win"]?>
                                </h1>
                            </div>                                        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
