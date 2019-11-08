@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tickets</div>

                <div class="card-body">
                   <div class="row">
                       @foreach ($tickets as $ticket)
                           <div class="col-md-3">
                               <div class="alert alert-primary" role="alert">
                                    <p>{{$ticket->customer->formattedName()}}</p>
                                    <p>{{$ticket->status}}</p>
                                    <p>{{$ticket->title}}</p>
                               </div>
                           </div>
                       @endforeach
                   </div>
                   {{$tickets->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
