@extends('layouts.base')
@section('content')
    <div class="container">

        <form class="mt-3" action="/create" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="Title">Title</label>
                <input type="text" name="title" max="255" class="form-control" id="Title" @if(old('title') !== null) value="{{old('title')}}" @endif placeholder="Enter title">
                @if($errors->has('title')) <small id="title" class="form-text text-danger"> {{$errors->first('title')}} </small> @endif
            </div>

            <div class="form-group">
                <label for="userSelect">Select user</label>
                <select name="user_id" class="form-control" id="userSelect">
                    @foreach($users as $user)
                        <option value="{{$user['id']}}" @if(old('user_id') == $user['id']) selected @endif>{{$user['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" rows="7"  class="form-control" id="description" placeholder="Description">@if(old('description') !== null){{old('description')}}@endif</textarea>
                @if($errors->has('description')) <small id="description" class="form-text text-danger">{{$errors->first('description')}}</small> @endif
            </div>
            <button type="submit" class="btn btn-primary w-100">Create</button>
        </form>
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection
