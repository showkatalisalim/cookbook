@extends('layouts.master')


@section('title', 'Suchen')


@section('class', 'search form')
@section('content')
    {!! Form::open(['url' => 'search']) !!}
        <div>
            {!! Form::label('Suchen in') !!}
            {!! Form::select('table', $tables) !!}
        </div>

        <div>
            {!! Form::label('Suchkriterium') !!}
            {!! Form::text('term') !!}
        </div>

        <div>
            {!! Form::submit('Rezepte suchen') !!}
        </div>
    {!! Form::close() !!}
@stop
