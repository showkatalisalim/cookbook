@extends('layouts.master')


@section('title', __('forms.recipe.create'))


@section('content-class', 'recipe-form')
@section('content')

    {{ Form::open(['url' => 'recipes', 'enctype="multipart/form-data"', 'class' => 'w3-container w3-card-4 w3-padding']) }}

        <p>
            {{ Form::label('name', __('forms.global.name'),
                ['class' => 'required']) }}
            {{ Form::text('name', null, [
                'placeholder' => __('forms.recipe.examples.name'),
                'maxlength'   => 200,
                'class'       => 'w3-input',
                'required', 'autofocus']) }}
        </p>

        <p>
            {{ Form::label('author_id', __('forms.recipe.author'), [
                'class' => 'required']) }}
            {{ Form::select('author_id',
                $authors, $default['authors'],
                ['class' => 'js-dropdown w3-select']) }}
        </p>

        <p>
            {{ Form::label('category_id', __('forms.recipe.category'),
                ['class' => 'required']) }}
            {{ Form::select('category_id', $categories, null,
                ['class' => 'js-dropdown w3-input']) }}
        </p>

        <div>
            {{ Form::label('tags[]', __('forms.recipe.tag')) }}
            <span class="w3-button w3-medium w3-black w3-card w3-margin-left copy-select2">+</span>

            <div class="hidden forced">
                {{ Form::select('tags[]',
                    $tags, null,
                    ['class' => 'js-dropdown w3-input removeable', 'disabled']) }}
                <span class="w3-button w3-black w3-circle remove-select2">-</span>
            </div>
        </div>

        <p>
            {{ Form::label('yield_amount', __('forms.recipe.yield_amount')) }}
            {{ Form::number('yield_amount', 4, [
                'max'   => 999,
                'size'  => 3,
                'class' => 'w3-input']) }}
        </p>

        <p>
            {{ Form::label('complexity', __('forms.recipe.complexity')) }}
            {{ Form::select('complexity', $complexityTypes, $default['complexityTypes']) }}
        </p>

        <p>
            {{ Form::label('preparation_time', __('forms.recipe.preparation_time')) }}
            {{ Form::time('preparation_time', null, ['class' => 'w3-input']) }}
        </p>


        <p>
            {{ Form::label('instructions', __('forms.recipe.instructions'), ['class' => 'required']) }}
            {{ Form::textarea('instructions', null, ['maxlength' => 16777215, 'required', 'class' => 'w3-input w3-border markdown-editor']) }}
        </p>


        <p>
            {{ Form::label('photo', __('forms.recipe.photo')) }}
            {{ Form::file('photo', ['class' => 'w3-input']) }}
            {{ Form::hidden('MAX_FILE_SIZE', '2097152') }}
        </p>

        <p>
            {!! FormHelper::backButton(__('forms.global.cancel'), [
                'class' => 'w3-btn w3-black w3-left w3-margin-right w3-margin-bottom']) !!}
            {{ Form::button(__('forms.recipe.create'), [
                'class' => 'w3-btn w3-black w3-right w3-margin-left w3-margin-bottom',
                'type'  => 'submit']) }}
        </p>

    {{ Form::close() }}

@stop
