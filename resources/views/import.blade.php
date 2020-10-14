@extends('layouts.app')
@section('content')
<div class="container main-section">

    <div class="row">

        <div class="col-md-8 offset-md-2">

            <div class="card bg-light mt-3">

                <div class="card-header">

                    Post Import Export Excel

                </div>

                <div class="card-body">

                    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <input type="file" name="file" class="form-control">

                        <br>

                        <button class="btn btn-success">Import Posts</button>

                        <a class="btn btn-warning" href="{{ route('export') }}">Export Posts</a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection