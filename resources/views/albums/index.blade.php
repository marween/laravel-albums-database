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
<div class="uper">
  @if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}  
  </div><br />
  @endif
  <nav class="navbar navbar-default navbar-inverse"> 
    <nav class="navbar navbar-light bg-light justify-content-between">
      
      <form class="form-inline" action="{{route('albums.search')}}">
        <input class="form-control mr-sm-2" value="" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    
    </nav>
     <div> <a href="{{ route('albums.create')}}" class="btn btn-primary">Add</a></div>
  </nav> 
 
  <table class="table table-striped">
    <tbody>
      @foreach($albums as $album)
      <tr>
        <td>{{$album->id}}</td>
        <td>{{$album->name}}</td>
        <td>{{$album->file}}</td>
        <td>{{$album->year}}</td>
        <td>{{$album->label}}</td>
        <td>{{$album->note}}</td>
        <td>{{$album->artists}}</td>
        <td>{{$album->songs}}</td>
        <td>@auth <a href="{{ route('albums.edit',$album->id)}}" class="btn btn-primary">Edit</a>
        @endauth</td>
         <td>@auth <a href="{{ route('albums.show',$album->id)}}" class="btn btn-primary">Show</a>
        @endauth</td>
        <td>

          @auth
          <form action="{{ route('albums.destroy', $album->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
          @endauth
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div>
    @endsection