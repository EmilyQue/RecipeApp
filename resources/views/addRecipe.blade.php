@extends('layouts.appmaster')
@section('title', 'Add Recipe')

@section('content')
    <div class="recipe-form">
        <form action="addRecipe" method="POST">
            <h2 class="text-center">Add A Recipe</h2>
            <input type="hidden" name="_token" value = "<?php echo csrf_token()?>">
            <div class="form-group">
                <label>Recipe Title:</label>
                <input type="text" class="form-control" name="title" placeholder="" required="required">
            </div>
            <div class="form-group">
                <label>Ingredients:</label>
                <textarea class="form-control" name="ingredients" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label>Directions:</label>
                <textarea class="form-control" name="directions" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label>Estimated Time:</label>
                <input type="text" class="form-control" name="time" placeholder="Ex: 30 mins" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </form>
    </div>
@endsection
