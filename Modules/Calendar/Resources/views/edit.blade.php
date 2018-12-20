@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Edit Events</h1>
@stop

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit event
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
      <form method="POST" action="{{ route('events.update', $event->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">title</label>
          <input type="text" class="form-control" name="title" value={{ $event->title }} />
        </div>
        <div class="form-group">
          <label for="price">Start date</label>
          <input type="date" class="form-control" name="start_date" value={{ $event->start_date }} />
        </div>
        <div class="form-group">
          <label for="quantity">End date</label>
          <input type="date" class="form-control" name="end_date" value={{ $event->end_date }} />
        </div>
        <div class="form-group">
          <label for="quantity">event Quantity:</label>
          <input type="text" class="form-control" name="description" value={{ $event->description }} />
        </div>
        <div class="form-group">
          <label for="quantity">event Quantity:</label>
          <input type="text" class="form-control" name="categorie" value={{ $event->categorie }} />
        </div>
        <div class="form-group">
          <label for="quantity">event Quantity:</label>
          <input type="file" class="form-control" name="image" value={{ $event->image }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>

@stop