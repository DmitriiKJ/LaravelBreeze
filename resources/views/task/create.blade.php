@extends('Layouts.layout')

@section('content')
    <h1>Create Task</h1>
    <!--route('home.assistant_create') in web.php important add ->name(...)-->
    <form class="col-12 d-flex justify-content-center align-items-center flex-column" action="{{route('home.assistant_create')}}" method="post">
        @csrf <!--https://laravel.com/docs/11.x/csrf-->
        <div class="col-5">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="titleId">
          </div>
          <div class="col-5">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="descriptionId">
          </div>
          <div class="col-5">
            <label for="isCompleted" class="form-label">Is Completed</label>
            <input type="text" class="form-control" name="isCompleted" id="isCompletedId">
          </div>
          <button type="submit" class="btn btn-primary">Send</button>
    </form>
@endsection
