@extends('layouts.base')

@section('content')
<div class="container">
    <div class="text-right mb-3">
        <a class="btn btn-success" href="/add">Add task</a>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Completed</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{{$task['title']}}</td>
            <td class="description">{{$task['description']}}</td>
            <td class="text-center"><input class="form-check-input completed_checkbox" data-id="{{$task['id']}}" type="checkbox" @if($task['completed']) checked @endif id="checkbox"></td>
            <td><a href="/edit/{{$task['id']}}"><i class="bi bi-pencil"></i></a></td>
            <td><a href="#" class="delete_link" data-id="{{$task['id']}}" data-toggle="modal" data-target="#deleteModal"><i class="bi bi-trash"></i></a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="alert alert-success mt-3 my-alert hidden">
        Task Edit
        <span class="close_span">X</span>
    </div>
    {{$tasks->links()}}
    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
</div>
@include('confirm_delete')
@endsection
@section('bottom_script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
@endsection

