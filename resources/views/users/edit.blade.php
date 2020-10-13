@extends('layouts.app')

@section('content')
<div class="card">
    @include('partials.success')
    @include('partials.sessionerror')
    <div class="card-header">My Ptofile</div>


        <div class="card-body">
        <form action="{{ route('user.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
            <input id="name" class="form-control" type="text" name="name"  value="{{ $user->name }}">

            </div>
            <div class="form-group">
                <label for="about">about</label>
                <textarea id="about" class="form-control" type="text" name="about">{{ $user->about }}</textarea>
            </div>

            <button type="submit" class="form-control btn btn-success">Update Profile</button>
          </form>
    </div>
</div>
    
   
@endsection
