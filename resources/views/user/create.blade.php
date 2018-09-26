@extends('layouts.admin_app')

@section('css')
<link rel="stylesheet" href="{{asset('admin/simplemde/simplemde.min.css')}}">
@endsection
@section('script')
<script src="{{asset('admin/simplemde/simplemde.min.js')}}"></script>
<script>
var simplemde = new SimpleMDE({ element: document.getElementById("description") });
</script>
@endsection

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
        <form method="post" action="{{url('/create/ticket')}}">
            <div class="form-group">
                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                <label for="title">Ticket Title:</label>
                <input type="text" class="form-control" name="title"/>
            </div>
            <div class="form-group">
                <label for="description">Ticket Description:</label>
                <textarea  class="form-control" name="description" id="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
</div>
@endsection