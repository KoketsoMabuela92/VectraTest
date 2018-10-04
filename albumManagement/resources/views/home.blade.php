@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @foreach ($albums as $album)
                    <hr>
                    <div class="card">
                        <div class="card-header "><h5 class="text-info">ALBUM - {{ $album->album_name }}</h5></div>
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-md-12">
                                    <img class="img-responsive" src="/storage/albums/{{$album->album_cover_path}}" alt="" height="110px" width="170px">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    Album Artist: {{ $album->album_artist }}
                                </div>
                                <div class="col-md-6">
                                    Price: ZAR{{ $album->album_price }}
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    @foreach($reviews as $review)
                                        @if($review->album_id == $album->id)
                                            {{ logger($review) }}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    Review: {{ $review->review_text }}
                                                </div>
                                                <div class="col-md-6">
                                                    Time: {{ $review->created_at }}
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#addReviewModal{{$album->id}}">Add review</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- The REVIEW Modal -->
                    <div class="modal" id="addReviewModal{{ $album->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Review for Album</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form method="post" action="{{ route('review') }}" >
                                        @csrf
                                        <input type="hidden" class="form-control" id="album_id" name="album_id" value="{{ $album->id }}">
                                        <div class="form-group">
                                            <label for="review_text">Review:</label>
                                            <input type="text" class="form-control" id="review_text" placeholder="Your review here..." name="review_text">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
