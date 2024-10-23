@extends('layouts.master')
@section('styles')

@endsection

@section('content')
<div class="content">

    <div class="row items-push">
        <div class="row">
            <div class="col-xl-8 mx-auto">

                <div class="block block-rounded h-100 mb-0">
                    <div class="block-header block-header-default">
                      <h3 class="block-title">Game Instruction for {{ $game->name }}</h3>
                      <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                          <i class="si si-refresh"></i>
                        </button>
                      </div>
                    </div>


                    <div class="block-content">
                    
                        <ul class="list-group push">
                            <li class="list-group-item d-flex justify-content-between align-items-center fw-semibold">
                              Total Number of Question
                              <span> {{ $game->number_of_question }} </span>
                              {{-- <span class="badge rounded-pill bg-success">Operational</span> --}}
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fw-semibold">
                              Time Allowed
                              <span> {{ $game->time_allowed }} </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fw-semibold">
                              Play Stat
                              <span> {{ $game->questions_count == null ? '0' :  $game->questions_count}} of {{ $game->number_of_players }} </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fw-semibold">
                              Coin Amount
                              <span> {{ $game->coin_per_play == null ? 'Free' : $game->coin_per_play }} </span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center fw-semibold">
                                Potential Win
                                @if($game->coin_per_play == null )
                                <span> 10 </span>
                                @else
                                <span> 890 </span>
                                @endif
                            </li>
                          </ul>
                          {{-- <p>
                            <b>Description</b><br>
                            {{ $game->description }}
                          </p> --}}

                          <a class="btn btn-sm btn-outline-secondary me-1 my-1 mb-3" href=" {{ url('game/instruction/'.$game->_id) }} ">
                            <i class="fa fa-play opacity-50 me-1"></i> Start Playing
                        </a>

                    </div>


                </div>
            </div>
        </div>
    </div>


</div>

@endsection
