// Set default value and text
let isActive = 0;
updateStatus();

// Add event listener for checkbox change event
const checkbox = document.getElementById('is_active');

if (checkbox) {
    checkbox.addEventListener('change', updateStatus);
}

function updateStatus() {
    // Get the checkbox element
    const checkbox = document.getElementById('is_active');

    // Check if the checkbox element exists
    if (!checkbox) {
        console.error("Checkbox element not found.");
        return;
    }

    // Update the value based on the checkbox state
    isActive = checkbox.checked ? 1 : 0;

    // Get the label element
    const statusLabel = document.getElementById('statusLabel');

    // Update the label text and color
    statusLabel.textContent = checkbox.checked ? 'Active' : 'Inactive';
    statusLabel.style.color = checkbox.checked ? 'green' : 'red';
}
