@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Reviews</div>

                <div class="card-body">
                   <div class="row">
                       @foreach ($reviews as $review)
                           <div class="col-md-3">
                               <div class="alert alert-primary" role="alert">
                                    <p>{{$review->customer->formattedName()}}</p>
                                    <p>{{$review->product->title}}</p>
                                    <p>Stars : 

                                        @php
                                            $total = 5;
                                            $currentStars = $review->stars;
                                            $remainingStars = $total - $currentStars;
                                        @endphp
                                        @for($i=0 ; $i<$review->stars ; $i++)
                                        <span class="fa fa-star checked"></span>
                                        @endfor
                                        @for($i=0 ; $i<$remainingStars ; $i++)
                                        <span class="fa fa-star "></span>
                                        @endfor

                                    </p>
                                    <p>{{$review->review}}</p>
                                    <p>{{($review->created_at)->diffForHumans()}}</p>
                               </div>
                           </div>
                       @endforeach
                   </div>
                   {{$reviews->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
