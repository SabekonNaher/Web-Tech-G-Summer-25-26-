<!DOCTYPE html>
<html>
    <body>
<?php   //**Write a Employee class which has employee id, employee name and salary attributes; 
// also has constructor, getter, setter and one print function to print the object**    

class Employee
{
    private $employeeId;
    private $employeeName;
    private $salary;

    // Constructor
    public function __construct($employeeId, $employeeName, $salary)
    {
        $this->employeeId = $employeeId;
        $this->employeeName = $employeeName;
        $this->salary = $salary;
    }

    // Getters
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    public function getEmployeeName()
    {
        return $this->employeeName;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    // Setters
    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;
    }

    public function setEmployeeName($employeeName)
    {
        $this->employeeName = $employeeName;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    // Print function
    public function printEmployee()
    {
        echo "Employee ID: " . $this->employeeId . "<br>";
        echo "Employee Name: " . $this->employeeName . "<br>";
        echo "Salary: " . $this->salary . "<br>";
    }
}

// Test case
$employee = new Employee(101, "ABC", 50000);

$employee->printEmployee();

?>
</body>
</html>