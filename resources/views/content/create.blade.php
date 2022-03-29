@extends('content.layout')

@section('title')Create Article @endsection

@section('content')
    <div class="w-75 container">
        <form action="{{ route('articles.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Random shhhhiiiitt" zalupa>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Textarea</label>
                <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="d-none">
                <textarea name="user_id" class="form-control" id="exampleFormControlTextarea2" rows="0">{{ Auth::user()->id }}</textarea>
            </div>
            <button type="submit" class="btn btn-outline-success mt-3">Submit!</button>
        </form>
    </div>
@endsection