@extends('layouts.layout')

@section('content')
<div style="text-align: center;">
    <h1>Are you sure?</h1>
    <br>
    <form method="POST" action="/assistant_delete" style="display: inline-block; margin: 10px;">
        @csrf
        <input type="hidden" id="id" name="id" value="{{$id}}">
        <input type="submit" value="Yes" class="btn btn-primary">
    </form>

    <form method="POST" action="/assistant_delete" style="display: inline-block; margin: 10px;">
        @csrf
        <input type="hidden" id="id" name="id" value="-1">
        <input type="submit" value="No" class="btn btn-primary">
    </form>
</div>
@endsection
