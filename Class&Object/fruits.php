<!DOCTYPE html>
<html>
    <body>
        <?php

class Fruit
{
    // Properties
    private $name;
    private $color;

    // Constructor
    public function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    // Destructor
    public function __destruct()
    {
        echo "Destructor called<br>";
    }

    // Methods
    public function set_name($name)
    {
        $this->name = $name;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function set_color($color)
    {
        $this->color = $color;
    }

    public function get_color()
    {
        return $this->color;
    }

    // __toString()
    public function __toString()
    {
        return __CLASS__ . "[name=" . $this->name .
               ", color=" . $this->color . "] <br>";
    }
}

// Create object
$apple = new Fruit("Apple", "Green");

// Get values
echo $apple->get_name() . "<br>";
echo $apple->get_color() . "<br>";
// Print object
echo $apple;
echo "<br>"
?>

<?php

class Student
{
    private $id;
    private $name;

    // Constructor
    function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}

// Create an object
$richard = new Student(100, "Richard");

// Show object properties
var_dump($richard);

?>

    </body>
</html>