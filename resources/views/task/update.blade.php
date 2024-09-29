@extends('layouts.layout')

@section('content')
    <h1>Create task</h1>
    <form action="/assistant_update" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$id}}">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$title}}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{$description}}">
            </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
@endsection
