@extends('layouts.appmaster')
@section('title', 'Home')

<?php
use App\Http\Services\Business\RecipeBusinessService;

//user business service is called
$bs = new RecipeBusinessService();
$recipes = $bs->findAll();
?>

@section('content')
    <div class="container">
      <h3>Emily's Personal Cook Book</h3>
    </div>


    <div class="container">
        <div class="row">
            <?php
    for ($x = 0; $x < count($recipes); $x++) { ?>
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="resources/images/{{$recipes[$x]['image']}}" alt="">
                    </div>
                    <div class="card-desc">
                        <h3>{{$recipes[$x]['title']}}</h3>
                        <p><small>Estimated Time: {{$recipes[$x]['time']}}</small></p>
                        <p>{{$recipes[$x]['description']}}</p>
                            <a href="#" class="btn-card">See Recipe</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

@endsection
