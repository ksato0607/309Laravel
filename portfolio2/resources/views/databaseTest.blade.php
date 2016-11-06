@extends('layout')

@section('new')
 <h1>Database connection is successful </h1>
 <?php foreach ($database as $data): ?>
   <img src="{{ $data->imageUrl }}" width="200" height="150">
 <?php endforeach; ?>
@stop
