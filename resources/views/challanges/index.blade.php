@extends('base')
@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Challenges</h1>
  <table class="table table-striped">
    <thead>
    <div>
    <a style="margin: 19px;" href="{{ route('challanges.create')}}" class="btn btn-primary">New contact</a>
    </div>
        <tr>
          <td>ID</td>
          <td>Title</td>
          <td>Status</td>
          <td>Description</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($challanges as $challange)
        <tr>
            <td>{{$challange->id}}</td>
            <td>{{$challange->title}} {{$challange->title}}</td>
            <td>{{$challange->status}}</td>
            <td>{{$challange->description}}</td>
            <td>
                <a href="{{ route('challanges.edit',$challange->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('challanges.destroy', $challange->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
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
