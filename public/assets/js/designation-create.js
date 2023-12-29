document.addEventListener('DOMContentLoaded', function() {
    // Your script here
    document.getElementById('designationForm').addEventListener('submit', function(event) {
        // Prevent the form from submitting by default
        event.preventDefault();

        // Validate each input field
        if (!validateName() || !validateTitle() || !validateDescription()) {
            // If any validation fails, stop the form submission
            return false;
        }

        // If all validations pass, submit the form
        this.submit();
    });

    function validateName() {
        var name = document.getElementById('name').value;
        var nameError = document.getElementById('name_error');

        // Example validation: Name should not be empty
        if (name.trim() === '') {
            nameError.textContent = 'Name is required';
            return false;
        } else {
            nameError.textContent = '';
            return true;
        }
    }

    function validateTitle() {
        var title = document.getElementById('title').value;
        var titleError = document.getElementById('title_error');

        // Example validation: Title should not be empty
        if (title.trim() === '') {
            titleError.textContent = 'Title is required';
            return false;
        } else {
            titleError.textContent = '';
            return true;
        }
    }

    function validateDescription() {
        var description = document.getElementById('description').value;
        var descriptionError = document.getElementById('description_error');

        // Example validation: Description should not be empty
        if (description.trim() === '') {
            descriptionError.textContent = 'Description is required';
            return false;
        } else {
            descriptionError.textContent = '';
            return true;
        }
    }
});
