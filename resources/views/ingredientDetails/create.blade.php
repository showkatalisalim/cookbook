@extends('layouts.master')


@section('title', $recipe->name . ': ' . __('forms.ingredient.create'))


@section('content-class', 'ingredient-form')
@section('content')

    <a href="{{ \App\Helpers\CodeHelper::previousUrl("/recipes/{$recipe->slug}") }}"><i class="arrow-left"></i>{{ __('forms.global.back') }}</a>
    <br><br>

    {{ Form::open(['url' => route('recipes.ingredient-details.store', $recipe->slug), 'class' => 'w3-container w3-card-4 w3-padding']) }}

        <p>
            {{ Form::label('amount', __('forms.ingredient.ingredient')) }}
            <p>
                {{ Form::number('amount', null, [
                    'max'   => 999999.99,
                    'min'   => 0,
                    'size'  => 8,
                    'step'  => '0.25',
                    'class' => 'w3-inpupt',
                    'placeholder' => __('forms.ingredient.examples.amount'),
                    'autofocus']) }}
                {{ Form::select('unit_id', $units, null, ['class' => 'js-dropdown w3-select w3-third']) }}
                {{ Form::select('ingredient_id', $ingredients, null, ['class' => 'js-dropdown w3-select w3-third']) }}
            </p>
        </p>
        <p>
            {{ Form::label('preps', __('forms.ingredient.prep')) }}
            {{ Form::select('preps[]', $preps, null, ['size' => 7, 'multiple', 'class' => 'w3-select w3-border']) }}
        </p>

        <p>
            {{ Form::label('ingredient_detail_group', 'Gruppe') }}
            {{ Form::select(
                'ingredient_detail_group_id',
                $ingredientDetailGroups,
                $default['ingredientDetailGroup'],
                ['class' => 'js-dropdown w3-select']) }}
        </p>

        <p>
            {{ Form::label('ingredient_detail_id', __('forms.ingredient.alternate')) }}
            {{ Form::select('ingredient_detail_id', $ingredientDetailsAlternate, [null], ['class' => 'js-dropdown w3-input']) }}
        </p>

        <p>
            {{ Form::label('position', __('forms.ingredient.position')) }}
            {{ Form::number('position', 0, [
                'min'   => 0,
                'size'  => 3,
                'step'  => '1',
                'class' => 'w3-input']) }}
        </p>

        <p>
            {!! FormHelper::backButton(__('forms.global.cancel'), [
                'class' => 'w3-btn w3-black w3-left w3-margin-right'], "/recipes/{$recipe->slug}") !!}
            {{ Form::button(__('forms.ingredient.create'), [
                'class' => 'w3-btn w3-black w3-right w3-margin-left',
                'type'  => 'submit']) }}
        </p>

    {{ Form::close() }}

@stop
