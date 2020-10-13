@extends('layouts.app')

@section('content')

<div class="card">
  @include('partials.success')
    <div class="card-header">
        Users
    </div>
    <div class="card-body">

        <table class="table">
            <thead>
              <tr>
                <th scope="col">Image</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
               
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                 <td><img width="40" height="40" class="rounded" src="{{ Gravatar::src($user->email) }}" /></td> 
                <td>
                    {{ $user->name}}
                </td>
                
                
                  <td>{{$user->email}}</td>
                  
                  <td>
                   
                      @if (!$user->isAdmin())
                      <form action="{{ route('user.makeAdmin',$user->id) }}" method="post">  
                        @csrf
                       
                        <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
                      </form>   
                      @endif
                     
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>

@endsection