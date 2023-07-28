<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dom Manipulation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <h1>Crud Operations with DOM Manipulation</h1>
    <button id="addButton" class="btn btn-primary">Add New Entry</button>

    <table id="dataTable" class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>


        <!-- modal for adding new entry -->
        <div id="addModal" style="display: none;" >
            <input type="text" id="nameInput" placeholder="Name">
            <input type="text" id="descriptionInput" placeholder="Description">
            <button id="saveButton">Save</button>
            <button id="cancelButton">Cancel</button>
        </div>
    </table>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        // Sample data to start with
let data = [
  { id: 1, name: "Item 1", description: "This is item 1" },
  { id: 2, name: "Item 2", description: "This is item 2" },
];

// Function to create the table row for each entry
function createTableRow(item) {
  const row = document.createElement("tr");
  row.innerHTML = `
    <td>${item.name}</td>
    <td>${item.description}</td>
    <td>
      <button class="editButton" data-id="${item.id}">Edit</button>
      <button class="deleteButton" data-id="${item.id}">Delete</button>
    </td>
  `;

  // Add event listeners for edit and delete buttons
  row.querySelector(".editButton").addEventListener("click", handleEdit);
  row.querySelector(".deleteButton").addEventListener("click", handleDelete);

  return row;
}

// Function to render the table with data
function renderTable() {
  const tableBody = document.querySelector("#dataTable tbody");
  tableBody.innerHTML = "";

  data.forEach((item) => {
    tableBody.appendChild(createTableRow(item));
  });
}

// Function to show the add modal
function showAddModal() {
  const addModal = document.querySelector("#addModal");
  addModal.style.display = "block";
}

// Function to hide the add modal
function hideAddModal() {
  const addModal = document.querySelector("#addModal");
  addModal.style.display = "none";
}

// Function to handle the click event on the Add button
document.querySelector("#addButton").addEventListener("click", showAddModal);

// Function to handle the click event on the Save button inside the add modal
document.querySelector("#saveButton").addEventListener("click", () => {
  const nameInput = document.querySelector("#nameInput");
  const descriptionInput = document.querySelector("#descriptionInput");

  // Create a new item object with input values
  const newItem = {
    id: data.length + 1, // Simple ID generation (replace this with a more robust method in a real-world app)
    name: nameInput.value,
    description: descriptionInput.value,
  };

  // Add the new item to the data array
  data.push(newItem);

  // Render the updated table
  renderTable();

  // Clear input fields and hide the add modal
  nameInput.value = "";
  descriptionInput.value = "";
  hideAddModal();
});

// Function to handle the click event on the Cancel button inside the add modal
document.querySelector("#cancelButton").addEventListener("click", hideAddModal);

// Function to handle the click event on the Edit button
function handleEdit(event) {
  const itemId = event.target.dataset.id;
  // Implement code to handle editing an item (if required)
  // For this tutorial, we won't dive into the editing functionality.
}

// Function to handle the click event on the Delete button
function handleDelete(event) {
  const itemId = event.target.dataset.id;
  // Find the index of the item to delete in the data array
  const itemIndex = data.findIndex((item) => item.id === parseInt(itemId, 10));

  // If the item is found, remove it from the data array
  if (itemIndex !== -1) {
    data.splice(itemIndex, 1);
    // Re-render the table to reflect the changes
    renderTable();
  }
}

// Initial rendering of the table
renderTable();

    </script>
</body>

</html>