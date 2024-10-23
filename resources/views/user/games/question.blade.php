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

    <div class="row items-push">
        <div class="row">
            <div class="col-xl-8 mx-auto">

                <div class="block block-rounded h-100 mb-0">
                    <div class="block-header block-header-default">
                      <h3 class="block-title">Create Question</h3> <small>Uploaded {{ @$game->questions_count }} of {{ $game->number_of_question}} question</small>
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

                        <form action="{{ route('store.question') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label class="form-label" for="register3-account">Question</label>
                                <div class="input-group">
                                    <textarea class="form-control" name="content" required>{{ old('description') }}</textarea>
                                </div>
                                <!-- Display validation error for the description field -->
                                @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                          
                            <div class="form-group mb-4">
                                <label for="exampleInputEmail1">Option A</label>
                                <input type="text" class="form-control" name="option_A" placeholder="Option A" required>
                            </div>

                          

                            <div class="form-group mb-4">
                                <label for="exampleInputEmail1">Option B</label>
                                <input type="text" class="form-control" name="option_B" placeholder="Option B" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleInputEmail1">Option C</label>
                                <input type="text" class="form-control" name="option_C" placeholder="Option C" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleInputEmail1">Option D</label>
                                <input type="text" class="form-control" name="option_D" placeholder="Option D" required>
                            </div>
    
                            <div class="form-group mb-4">
                                <label for="exampleInputEmail1">Select Correct Answer</label>
                                <select name="correct_answer" class="form-control" required>
                                    <option value="option_A">Option A</option>
                                    <option value="option_B">Option B</option>
                                    <option value="option_C">Option C</option>
                                    <option value="option_D">Option D</option>
                                </select>
                            </div>

                            <input type="hidden" name="game_id" value="{{ $game->id }}">

                            @if($game->questions_count >= $game->number_of_question)
                            <div class="mb-4">
                                <button type="button" class="btn btn-primary disabled" >
                                    <i class="fa fa-plus opacity-50 me-1"></i> Question Completed
                                </button>
                                @if($game->status == 'PENDING')
                                <a href="{{ url('publish/game/'.$game->_id) }}" class="btn btn-success" >
                                    <i class="fa fa-check opacity-50 me-1"></i> Publish Game
                                </a>
                                @else
                                <a href="{{ url('home') }}" class="btn btn-secondary" >
                                    <i class="fa fa-check opacity-50 me-1"></i> Game Published
                                </a>
                                @endif
                            </div>
                            @else
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus opacity-50 me-1"></i> Save Question
                                </button>
                            </div>
                            @endif

                        </form>

                    </div>

                </div>



            </div>
        </div>
    </div>

</div>
@endsection