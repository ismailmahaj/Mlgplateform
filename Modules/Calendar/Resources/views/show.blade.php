@extends('adminlte::page')
@section('content')
 @foreach($events as $event)
        <tr>
            <td><img src="{{asset('image/'.$event->image)}}"/></td>
            <td>{{ $event->id }}</td>
            <td>{{ $event->title }}</td>
            <td>{{ $event->start_date }}</td>
            <td>{{ $event->end_date }}</td>
            <td>{!! $event->description !!}</td>



            <!-- we will also add show, edit, and delete buttons -->
            <td>

 
    @endforeach
@endsection