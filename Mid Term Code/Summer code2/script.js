let menuItems = [
    { name: "Dashboard", count: 0 },
    { name: "Patient Profiles", count: 0 },
    { name: "Appointments", count: 0 },
    { name: "Lab Results", count: 0 },
    { name: "Messages", count: 0 }
];

const sidebar = document.getElementById("sidebar");

// Display the menu
function displayMenu() {
    sidebar.innerHTML = "";

    menuItems.forEach((item) => {
        let div = document.createElement("div");
        div.className = "menu-item";

        // Highlight frequently used items
        if (item.count > 0) {
            div.classList.add("highlight");
        }

        div.innerHTML = `${item.name} (${item.count})`;

        div.onclick = function () {
            item.count++;
            reorderMenu();
        };

        sidebar.appendChild(div);
    });
}

// Sort menu based on usage count
function reorderMenu() {
    menuItems.sort((a, b) => b.count - a.count);
    displayMenu();
}

// Initial display
displayMenu();