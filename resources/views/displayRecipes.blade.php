@extends('layouts.appmaster')
@section('title', 'All Recipes')

<?php
use App\Http\Services\Business\RecipeBusinessService;
?>

@section('content')

<div class="table-responsive">
    <div class="displayTable">
        <h1>All Recipes</h1>
        <table id="recipe" class="table">
            <thead>
            <th>ID</th>
            <th>Title</th>
            <th>Ingredients</th>
            <th>Directions</th>
            <th>Time</th>
            </thead>
        <tbody>

        <?php
        //user business service is called
        $bs = new RecipeBusinessService();
        $recipes = $bs->findAll();
        //for loop to populate the data table in the displayUsers view
        for ($x = 0; $x < count($recipes); $x++) {
            echo "<tr>";
            echo "<td>" . $recipes[$x]['id'] . "</td>";
            echo "<td>" . $recipes[$x]['title'] . "</td>";
            echo "<td>" . $recipes[$x]['ingredients'] . "</td>";
            echo "<td>" . $recipes[$x]['directions'] . "</td>";
            echo "<td>" . $recipes[$x]['time'] . "</td>";
        }
        ?>
        </table>
    </div>
</div>

@endsection
