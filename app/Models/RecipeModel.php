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
    private $ingredients;
    private $directions;
    private $time;

    public function __construct($id, $title, $ingredients, $directions, $time) {
        $this->id = $id;
        $this->title = $title;
        $this->ingredients = $ingredients;
        $this->directions = $directions;
        $this->time = $time;
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
}
