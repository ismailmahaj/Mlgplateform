@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Create Events</h1>
@stop

@section('content')
<div class="col-md-6">
@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Event
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
      <form method="post" action="{{ route('events.store') }}"  enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="name">Title:</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group">
              <label for="price">Start Date :</label>
              <input type="date" class="form-control" name="start_date"/>
          </div> 
          <div class="form-group">
              <label for="quantity">End date:</label>
              <input type="date" class="form-control" name="end_date"/>
          </div>
          <div class="form-group">
              <label for="price">Description</label>
              <input type="text" class="form-control" name="description"/>
          </div>
           <div class="form-group">
              <label for="price">Categorie :</label>
              <input type="text" class="form-control" name="categorie"/>
          </div>
          <div class="form-group">
              <label for="price">Image</label>
              <input type="file" class="" name="image"/>
          </div>
          <div class="form-group">
              <label for="name">Title:</label>
              <input type="text" class="form-control" name="etage"/>
          </div>
          <div class="form-group">
              <label for="price">Start Date :</label>
              <input type="text" class="form-control" name="salle"/>
          </div> 
          <button type="submit" class="btn btn-primary">Add</button>
      </form>

      
  </div>
</div>

@stop