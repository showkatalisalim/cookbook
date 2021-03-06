@extends('layouts.master')


@section('title', 'Rezept '.$recipe->name.' bearbeiten')


@section('content-class', 'recipe-form')
@section('content')

{{-- https://ourcodeworld.com/articles/read/359/top-7-best-markdown-editors-javascript-and-jquery-plugins --}}

    {{ Form::open(['url' => route('recipes.update', $recipe->slug), 'enctype="multipart/form-data"', 'class' => 'w3-container w3-card-4 w3-padding']) }}
        @method('PUT')

        <p>
            {{ Form::label('name', __('forms.global.name'),
                ['class' => 'required']) }}
            {{ Form::text('name', $recipe->name, [
                'maxlength' => 200,
                'class'     => 'w3-input',
                'required', 'autofocus']) }}
        </p>

        <p>
            {{ Form::label('author_id', __('forms.recipe.author'),
                ['class' => 'required']) }}
            {{ Form::select('author_id',
                $authors, $recipe->author_id,
                ['class' => 'js-dropdown w3-select']) }}
        </p>

        <p>
            {{ Form::label('category_id', __('forms.recipe.category'),
                ['class' => 'required']) }}
            {{ Form::select('category_id',
                $categories, $recipe->category_id,
                ['class' => 'js-dropdown w3-select']) }}
        </p>

        <div>
            {{ Form::label('tags[]', __('forms.recipe.tag')) }}
            <span class="w3-button w3-medium w3-black w3-card w3-margin-left copy-select2">+</span>
            @foreach ($recipe->tags as $tag)
                <div>
                    {{ Form::select('tags[]',
                        $tags, $tag->id,
                        ['class' => 'js-dropdown w3-input removeable']) }}
                    <span class="w3-button w3-black w3-circle remove-select2">-</span>
                </div>
            @endforeach

            <div class="hidden forced">
                {{ Form::select('tags[]',
                    $tags, null,
                    ['class' => 'js-dropdown w3-input removeable', 'disabled']) }}
                <span class="w3-button w3-black w3-circle remove-select2">-</span>
            </div>
        </div>

        <p>
            {{ Form::label('yield_amount', __('forms.recipe.yield_amount')) }}
            {{ Form::number('yield_amount', $recipe->yield_amount,
                ['max' => 999, 'size' => 3, 'class' => 'w3-input']) }}
        </p>

        <p>
            {{ Form::label('complexity', __('forms.recipe.complexity')) }}
            {{ Form::select('complexity', $complexityTypes, $recipe->complexity) }}
        </p>

        <p>
            {{ Form::label('preparation_time', __('forms.recipe.preparation_time')) }}
            {{ Form::time('preparation_time',
                ($recipe->preparation_time ? date('H:i', strtotime($recipe->preparation_time)) : null),
                ['class' => 'w3-input']) }}
        </p>

        <p>
            {{ Form::label('instructions', __('forms.recipe.instructions'),
                ['class' => 'required']) }}
            {{ Form::textarea('instructions', $recipe->instructions,
                ['required', 'class' => 'w3-input w3-border markdown-editor']) }}
        </p>

        @if ($recipe->photo)
            <p class="checkbox">
                {{ Form::label('delete_photo', __('forms.recipe.delete_old_photo')) }}
                {{ Form::checkbox('delete_photo', null, null,
                    ['class' => 'w3-check']) }}
            </p>
        @endif

        <p>
            {{ Form::label('photo', __('forms.recipe.overwrite_old_photo')) }}
            {{ Form::file('photo', ['class' => 'w3-input']) }}
            {{ Form::hidden('MAX_FILE_SIZE', '2097152') }}
        </p>

        <p>
            {!! FormHelper::backButton(__('forms.global.cancel'), [
                'class' => 'w3-btn w3-black w3-left w3-margin-right'],
                "/recipes/{$recipe->slug}") !!}
            {{ Form::button(__('forms.global.save_edits'), [
                'class' => 'w3-btn w3-black w3-right w3-margin-left',
                'type'  => 'submit']) }}
        </p>

    {{ Form::close() }}

@stop
