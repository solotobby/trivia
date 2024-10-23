@extends('layouts.master')
@section('styles')

@endsection
@section('content')

<div class="content">

    <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">
           Game List
          </h3>
        </div>
        <div class="block-content block-content-full overflow-x-auto">

            <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive table-responsive">
                <thead>
                  <tr>
                  
                    <th>Name</th>
                    <th>Progress</th>
                    <th style="width: 15%;">Status</th>
                    <th class="d-none d-sm-table-cell text-center">When Created</th>
                    {{-- <th class="d-none d-sm-table-cell text-center" style="width: 20%"></th> --}}
                  </tr>
                </thead>
                <tbody>
                    @foreach ($games as $game)
                    <tr>
                    
                        <td class="fw-semibold">{{ $game->name }}</td>
                        <td>0/{{$game->number_of_players}}</td>
                        <td>

                            @if($game->status == 'ACTIVE')
                                <span class="badge bg-success">{{$game->status}}</span>
                            @elseif($game->status == 'PENDING')
                                <span class="badge bg-warning">{{$game->status}}</span>
                            @endif

                        </td>
                        <td class="d-none d-sm-table-cell text-center">
                          {{  $game->created_at }}
                        </td>
                      </tr>
                    @endforeach
                  
                  
                </tbody>
            </table>

        </div>
    </div>

</div>

@endsection

@section('scripts')

   
@endsection

