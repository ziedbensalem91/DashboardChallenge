@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a challange</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('challanges.update', $challange->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" value={{ $challange->title }} />
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" name="status" value={{ $challange->status }} />
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description" value={{ $challange->description }} />
            </div>
            <div class="form-group">
                <label for="deadline">Deadline:</label>
                <input type="date" name="deadline" value="{{ old('deadline', date('Y-m-d')) }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
