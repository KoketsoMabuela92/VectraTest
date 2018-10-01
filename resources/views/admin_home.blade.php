@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Welcome admin!
                        <div class="row">
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($albums as $album)
                            @if($counter % 3 === 0)
                        </div><div class="row">
                            @endif
                            <div class="column" style="padding:0 20px 0 20px;">
                                <img src="{{ $album->album_cover_path }}}">
                                <h2>{{ $album->album_name }}</h2>
                                <p>{{ $album->album_artist }}</p>
                                <p>ZAR{{ $album->album_price }}
                                <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#deleteModal" data-album-name="{{ $album->album_name }}}">Delete</button> | <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#editModal">Edit</button>
                            </div>
                            @php
                                $counter = $counter + 1;
                            @endphp
                            <br>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
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
            $(".modal-body #album_name").val( album_name );
            $('#deleteModal').modal('show');
        });
    </script>
@endsection
