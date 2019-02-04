@extends('layouts.master')


@section('title', 'Autor hinzufügen')


@section('content-class', 'author form')
@section('content')
    {!! Form::open(['url' => 'authors/create']) !!}
        <div>
            {!! Form::label('Name', NULL, ['class' => 'required']) !!}
            {!! Form::text('name', NULL, ['maxlength' => 50, 'required', 'autofocus']) !!}
        </div>

        <div>
            {!! Form::submit('Autor hinzufügen') !!}
        </div>
    {!! Form::close() !!}
@stop
