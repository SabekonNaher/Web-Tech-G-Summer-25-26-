<!DOCTYPE html>
<html>
    <body>
<?php

class MyCircle
{
    private float $radius;

    public function __construct(float $radius = 1)
    {
        $this->radius = $radius;
    }

    public function __destruct()
    {
        // Destructor
    }

    public function getRadius(): float
    {
        return $this->radius;
    }

    public function setRadius(float $radius): void
    {
        $this->radius = $radius;
    }

    public function getArea(): float
    {
        return pi() * $this->radius * $this->radius;
    }

    public function __toString(): string
    {
        return "MyCircle[radius=" . $this->radius . "]";
    }
}
?>

<?php

$circle = new MyCircle(5);

echo "Radius: " . $circle->getRadius() . "<br>";
echo "Area: " . $circle->getArea() . "<br>";

$circle->setRadius(10);

echo "New Radius: " . $circle->getRadius() . "<br>";
echo "New Area: " . $circle->getArea() . "<br>";

echo "Circle: " . $circle;

?>

    </body>
</html>