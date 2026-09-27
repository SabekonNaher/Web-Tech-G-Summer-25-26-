function validateForm() {

    // Clear previous error messages
    document.getElementById("name_error").innerText = "";
    document.getElementById("marks_error").innerText = "";

    // Name Validation
    var nameInput = document.getElementById("name");

    if (nameInput.value == "") {
        document.getElementById("name_error").innerText = "Name cannot be empty";
        return false;
    }

    var namePattern = /^[A-Za-z]+$/;

    if (!namePattern.test(nameInput.value)) {
        document.getElementById("name_error").innerText = "Name must contain only letters";
        return false;
    }

    // Marks Validation
    var marksInput = document.getElementById("marks");

    if (marksInput.value == "") {
        document.getElementById("marks_error").innerText = "Marks cannot be empty";
        return false;
    }

    var marks = Number(marksInput.value);

    if (isNaN(marks) || marks < 0 || marks > 100) {
        document.getElementById("marks_error").innerText = "Marks must be between 0 and 100";
        return false;
    }

    // Add row to table
    var table = document.getElementById("studentTable");
    var row = table.insertRow(-1);

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);

    cell1.innerHTML = nameInput.value;
    cell2.innerHTML = marks;

    // Change row color
    if (marks > 50) {
        row.style.backgroundColor = "green";
    } else {
        row.style.backgroundColor = "red";
    }

    // Clear input fields
    nameInput.value = "";
    marksInput.value = "";

    return false;
}