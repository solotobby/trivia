@extends('layouts.master')
@section('styles')

<style>
    #game-category {
    max-height: 0; /* Initially hidden */
    overflow: hidden;
    transition: max-height 0.3s ease-out; /* Smooth transition effect */
    }
</style>

@endsection
@section('content')

<div class="content">
    {{-- <h2 class="content-heading">Create Game</h2> --}}
    <div class="row items-push">
    <div class="row">
        <div class="col-xl-7 mx-auto">
          <!-- Default Register -->
          <div class="block block-rounded h-100 mb-0">
            <div class="block-header block-header-default">
              <h3 class="block-title">Create Game</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                  <i class="si si-refresh"></i>
                </button>
              </div>
            </div>
            <div class="block-content">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                <!-- Display global validation errors (if any) at the top -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <form action="{{ route('store.game') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="form-label" for="register3-account">Name</label>
                    <div class="input-group">
                        <input type="text" name="name" required class="form-control" id="register3-account" value="{{ old('name') }}" placeholder="Mandy's Wave">
                    </div>
                    <!-- Display validation error for the name field -->
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="row mb-4">
                    <div class="col-6">
                        <label class="form-label" for="register3-firstname">Number of Questions</label>
                        <input type="number" name="number_of_question" value="{{ old('number_of_question') }}" required class="form-control" id="register3-firstname" placeholder="10">
                        <!-- Display validation error for the number_of_question field -->
                        @error('number_of_question')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="register3-lastname">Time Allowed</label>
                        <input type="text" name="time_allowed" value="{{ old('time_allowed') }}" required class="form-control" id="register3-lastname" placeholder="5 for 5min">
                        <!-- Display validation error for the time_allowed field -->
                        @error('time_allowed')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            
                <div class="mb-4">
                    <label class="form-label" for="register3-account">Total Number of Players</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="register3-account" name="number_of_players" value="{{ old('number_of_players') }}" placeholder="30">
                    </div>
                    <!-- Display validation error for the number_of_players field -->
                    @error('number_of_players')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="space-x-2 mb-2">
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" value="1" type="checkbox"  id="example-switch-inline1" name="game_paid">
                        <label class="form-check-label" for="example-switch-inline1">Make Game Paid</label>
                    </div>
                </div>
            
                <!-- Coin amount field is shown/hidden based on game_paid checkbox -->
                <div class="mb-4" id="game-category" style="max-height: 0; overflow: hidden; transition: max-height 0.3s ease-out;">
                    <label class="form-label" for="register3-email">Coin Amount per Play</label>
                    <div class="input-group">
                        <input type="text" name="coin_per_play" value="{{ old('coin_per_play') }}" class="form-control" id="register3-email" placeholder="10">
                    </div>
                    <!-- Display validation error for the coin_per_play field -->
                    @error('coin_per_play')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-4">
                    <label class="form-label" for="register3-account">Description of Game</label>
                    <div class="input-group">
                        <textarea class="form-control" name="description" required>{{ old('description') }}</textarea>
                    </div>
                    <!-- Display validation error for the description field -->
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="space-x-2 mb-4">
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="checkbox" value="1" id="example-switch-inline2" name="question_bank">
                        <label class="form-check-label" for="example-switch-inline2">Select Question From Question Bank</label>
                    </div>
                </div>
            
                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus opacity-50 me-1"></i> Create Game
                    </button>
                </div>
            
               
            </form>

          
            
              {{-- <form action="{{ route('store.game') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="form-label" for="register3-account">Name</label>
                    <div class="input-group">
                      <input type="text" name="name" required class="form-control" id="register3-account" name="register3-account" placeholder="Mandy's Wave">
                     
                    </div>
                </div>

                <div class="row mb-4">
                  <div class="col-6">
                    <label class="form-label" for="register3-firstname">Number of Questions</label>
                    <input type="number" name="number_of_question" required  class="form-control" id="register3-firstname" name="register3-firstname" placeholder="10">
                  </div>
                  <div class="col-6">
                    <label class="form-label" for="register3-lastname">Time Allowed</label>
                    <input type="text" name="time_allowed" required  class="form-control" id="register3-lastname" name="register3-lastname" placeholder="5 for 5min">
                  </div>
                </div>
                <div class="mb-4">
                    <label class="form-label" for="register3-account">Total Number of Players</label>
                    <div class="input-group">
                      <input type="number" class="form-control" id="register3-account" name="number_of_players" placeholder="30">
                    </div>
                </div>
               

                <div class="space-x-2 mb-2">
                    <div class="form-check form-switch form-check-inline">
                      <input class="form-check-input"  type="checkbox" id="example-switch-inline1" name="game_paid">
                      <label class="form-check-label" for="example-switch-inline1">Make Game Paid</label>
                    </div>
                </div>
                  
                  <!-- This is the div you want to show/hide -->
                <div class="mb-4" id="game-category"  style="max-height: 0; overflow: hidden; transition: max-height 0.3s ease-out;">
                    <label class="form-label" for="register3-email">Coin Amount per Play</label>
                    <div class="input-group">
                      <input type="text"  name="coin_per_play" class="form-control" id="register3-email" name="register3-email" placeholder="10">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label" for="register3-account">Description of Game</label>
                    <div class="input-group">
                        <textarea class="form-control" name="description" required>
                           
                        </textarea>
                     
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Question Source</label>
                    <div class="space-x-2">
                      <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="checkbox" value="1" id="example-switch-inline1" name="question_bank">
                        <label class="form-check-label" for="example-switch-inline1">Select Question From Question Bank</label>
                      </div>
                    </div>
                </div>
                
               
                               
                <div class="mb-4">
                  <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus opacity-50 me-1"></i> Create Game
                  </button>
                </div>
              </form> --}}
            </div>
          </div>
          <!-- END Default Register -->
        </div>
        
      </div>
    </div>


</div>

<script>
    // document.getElementById('example-switch-inline1').addEventListener('change', function() {
    //   var gameCategoryDiv = document.getElementById('game-category');
  
    //   if (this.checked) {
    //     gameCategoryDiv.style.display = 'block'; // Show the div when checkbox is checked
    //   } else {
    //     gameCategoryDiv.style.display = 'none';  // Hide the div when checkbox is unchecked
    //   }
    // });
    document.getElementById('example-switch-inline1').addEventListener('change', function() {
    var gameCategoryDiv = document.getElementById('game-category');

    if (this.checked) {
            gameCategoryDiv.style.maxHeight = gameCategoryDiv.scrollHeight + "px"; // Expand the div
        } else {
            gameCategoryDiv.style.maxHeight = "0"; // Collapse the div
        }
    });
  </script>

@endsection