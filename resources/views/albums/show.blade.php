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
    album
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
    
    <p>nom album :{{ $albums->name }} </p>
    <p>image:{{ $albums->file }} </p>
    <p>gendre:{{ $albums->gender }} </p>
    <p>nom year :{{ $albums->year }} </p>
    <p>nom label :{{ $albums->label}} </p>
    <p>nom note :{{ $albums->note}} </p>
    <p>nom artists :{{ $albums->artists }} </p>
    <p>nom songs :{{ $albums->songs }} </p>

    @endsection