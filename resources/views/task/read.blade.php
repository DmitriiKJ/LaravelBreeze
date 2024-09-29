@extends('Layouts.layout')

@section('content')
    <h1>List tasks</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Is completed</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks['tasks'] as $task)
                <tr scope="row">
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->isCompleted }}</td>
                    <td><a class="btn btn-warning" href="/update/{{$task->id}}">Update</a></td>
                    <td><a class="btn btn-danger" href="/delete/{{$task->id}}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <input type="hidden" id="roleFalse" value="<?php echo isset($_GET['role']) ? 1 : 0; ?>">
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const roleFalse = document.getElementById('roleFalse');
            console.log(roleFalse.value);
            if (roleFalse.value == "1") {
                alert("You don't have enough permissions (you are not admin)!");
            }
        });
    </script>
@endsection
