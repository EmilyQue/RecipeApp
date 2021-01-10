@extends('layouts.appmaster')
@section('title', 'Home')

@section('content')
    <div class="container">
      <h3>Emily's Recipe Book</h3>
      <p>Recipe book for everyone by everyone.</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="https://www.seriouseats.com/2018/03/20180413-brownie-mix-vicky-wasik-20-1500x1125.jpg" alt="">
                    </div>
                    <div class="card-desc">
                        <h3>Brownies</h3>
                        <p><small>By: Emily Quevedo</small></p>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                            <a href="#" class="btn-card">See Recipe</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="https://tastesbetterfromscratch.com/wp-content/uploads/2020/04/Cajun-Chicken-Pasta-2-500x500.jpg" alt="">
                    </div>
                    <div class="card-desc">
                        <h3>Pasta</h3>
                        <p><small>By: Emily Quevedo</small></p>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                            <a href="#" class="btn-card">See Recipe</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="https://cdn.loveandlemons.com/wp-content/uploads/2020/03/bean-recipes-1.jpg" alt="">
                    </div>
                    <div class="card-desc">
                        <h3>Bean Soup</h3>
                        <p><small>By: Emily Quevedo</small></p>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                            <a href="#" class="btn-card">See Recipe</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
