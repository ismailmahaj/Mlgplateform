@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Calendrier</h1>
@stop

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">

  <table class="table table-striped">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
    <thead>
        <tr>
          <td>ID</td>
          <td>Title</td>
          <td>Start Date</td>
          <td>End Date</td>
          <td>Image</td>
          <td>categorie</td>
          <td>description</td>
          <td>etage</td>
          <td>salle</td>




          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event )
        <tr>
            <td>{{$event->id}}</td>
            <td>{{$event->title}}</td>
            <td>{{$event->start_date}}</td>
            <td>{{$event->end_date}}</td>
            <td><img src="{{asset('image/'.$event->image)}}"/></td>
            <td>{{$event->categorie}}</td>
            <td>{{$event->description}}</td>
            <td> {{$event->rooms[0]->etage}} </td>
            <td> {{$event->rooms[0]->salle}} </td>


            <td><a href="{{ route('events.edit',$event->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('events.destroy', $event->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@stop