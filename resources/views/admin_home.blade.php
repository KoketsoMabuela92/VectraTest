@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <button class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#addModal">Add album</button>
                <h1 class="text-success text-center">All Albums</h1>
                <!-- The ADD Modal -->
                <div class="modal" id="addModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Add a new album</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form method="post" action="insert" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="album_name">Album Name:</label>
                                        <input type="text" class="form-control" id="album_name" placeholder="Album Name" name="album_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="album_artist">Album Artist:</label>
                                        <input type="text" class="form-control" id="album_artist" placeholder="Album Artist" name="album_artist">
                                    </div>
                                    <div class="form-group">
                                        <label for="album_price">Album Price:</label>
                                        <input type="text" class="form-control" id="album_price" placeholder="Album Price" name="album_price">
                                    </div>
                                    <div class="form-group">
                                        <label for="album_cover">Album Cover:</label>
                                        <input type="file" class="form-control" id="album_cover" placeholder="Album Cover" name="album_cover">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add album</button>
                                </form>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#editModal{{$album->id}}">Edit</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-outline-danger btn-lg" data-toggle="modal" data-target="#deleteModal{{$album->id}}">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- The EDIT Modal -->
                    <div class="modal" id="editModal{{ $album->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Album</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form method="post" action="{{ route('edit') }}" >
                                        @csrf
                                        <input type="hidden" class="form-control" id="album_id" name="album_id" value="{{ $album->id }}">
                                        <div class="form-group">
                                            <label for="albumName">Album Name:</label>
                                            <input type="text" class="form-control" id="album_name" placeholder="Album Name" name="album_name" value="{{ $album->album_name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="artist">Artist Name:</label>
                                            <input type="text" class="form-control" id="artist" name="album_artist" placeholder="album_artist" value="{{ $album->album_artist }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Price:</label>
                                            <input type="text" class="form-control" id="price" name="album_price" placeholder="album_price" value="{{ $album->album_price }}">
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

            @foreach($albums as $album)
            <!-- The DELETE Modal -->
            <div class="modal" id="deleteModal{{ $album->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Delete Album</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                                <form method="post" action="{{ route('delete') }}" >
                                    @csrf
                                    Are you you want to delete this album
                                    <input type="hidden" class="form-control" id="album_id" name="album_id" value="{{ $album->id }}">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                    </div>
                                </form>
                                <button type="submit" class="btn btn-primary" data-dismiss="modal">No</button>
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
@endsection
