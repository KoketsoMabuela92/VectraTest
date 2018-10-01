@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1 class="text-success text-center">All Albums</h1>
                @foreach ($albums as $album)
                    <hr>
                    <div class="card">
                        <div class="card-header "><h5 class="text-info">ALBUM - {{ $album->album_name }}</h5></div>
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-md-12">
                                    <img class="img-responsive" src="/albums/{{$album->album_cover_path}}" alt="" height="110px" width="170px">
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
                                    <button class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#albumModal{{$album->id}}">Edit</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-outline-danger btn-lg">Delete</button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- The Modal -->
                    <div class="modal" id="albumModal{{$album->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Album with id: {{ $album->id }}</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="">
                                        <div class="form-group">
                                            <label for="albumName">Album Name:</label>
                                            <input type="text" class="form-control" id="albumName" placeholder="Album Name" name="AlbumName" value="{{ $album->album_name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="artist">Artist Name:</label>
                                            <input type="text" class="form-control" id="artist" name="artist" placeholder="Artist" value="{{ $album->album_artist }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Price:</label>
                                            <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{ $album->album_price }}">
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

        <!-- Modal -->
        <div id="deleteModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit album</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <span id="data-content"></span>
                            Album name: <input type="text" id="album_name" name="album_name" placeholder="">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <script type="text/javascript">
            $(document).on("click", ".open-deleteModal", function () {
                var album_name = $(this).data('album-name');
                $(".modal-body #album_name").val(album_name);
                $('#deleteModal').modal('show');
            });
        </script>
@endsection
