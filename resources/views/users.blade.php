@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Users</h1>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td colspan = 2>Role</td>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <div class="form-group row">
                    <div class="col-md-6">
                        <form id="form-role" method="post" action="/users">
                            {{ csrf_field() }}
                        <select name="role" class="form-control" >
                            <option value="organizer">Organizer</option>
                            <option value="participant">Participant</option>
                        </select>
                        <td>
                            <a href="{{ route('users.changeRole',$user->id)}}" class="btn btn-primary">submit</a>
                        </td>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach

    </tbody>

  </table>
<div>
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
</div>
</div>
@endsection
