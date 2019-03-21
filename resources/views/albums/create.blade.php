@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="content">
  <div class="title m-b-md">
    <h1>Mes albums</h1>
  </div>  
</div>
<div class="card uper">
  <div class="card-header">
    Add Album
  </div>
  <div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div><br />
    @endif
    <form method="post" action="{{ route('albums.store') }}">
      <div class="form-group">
        @csrf
        <label for="name">Albums Name:</label>
        <input type="text" class="form-control" name="name"/>
      </div>
      <div class="form-group">
        @csrf
        <label for="name">files:</label>
        <input type="file" class="form-control" name="file"/>
      </div>
      <div class="form-group">
        @csrf
        <label for="name">gender:</label>
        <input type="text" class="form-control" name="gender"/>
      </div>
      <div class="form-group">
        @csrf
        <label for="name">year:</label>
        <input type="text" class="form-control" name="year"/>
      </div>
      <div class="form-group">
        @csrf
        <label for="name">label:</label>
        <input type="text" class="form-control" name="label"/>
      </div>
      <div class="form-group">
        @csrf
        <label for="name">note:</label>
        <input type="text" class="form-control" name="note"/>
      </div>
      <div class="form-group">
        @csrf
        <label for="name">artists:</label>
        <input type="textarea" class="form-control" name="artists"/>
      </div>
      <div class="form-group">
        @csrf
        <label for="name">songs:</label>
        <input type="textarea" class="form-control" name="songs"/>
      </div>
      <button type="submit" class="btn btn-primary">Add</button>
    </form>
  </div>
</div>
@endsection