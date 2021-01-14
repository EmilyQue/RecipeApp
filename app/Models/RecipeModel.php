<?php
//Activity 1
//Emily Quevedo
//January 7, 2021
//This is my own work

/* Recipe Model Object */
namespace App\Models;

class RecipeModel {
    private $id;
    private $title;
    private $description;
    private $ingredients;
    private $directions;
    private $time;
    private $image;

    public function __construct($id, $title, $description, $ingredients, $directions, $time, $image) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->ingredients = $ingredients;
        $this->directions = $directions;
        $this->time = $time;
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * @return mixed
     */
    public function getDirections()
    {
        return $this->directions;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

     /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $ingredients
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @param mixed $directions
     */
    public function setDirections($directions)
    {
        $this->directions = $directions;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

     /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
}
