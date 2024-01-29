document.addEventListener('DOMContentLoaded', function () {
    function debounce(func, delay) {
        let timer;
        return function () {
            const context = this;
            const args = arguments;
            clearTimeout(timer);
            timer = setTimeout(() => {
                func.apply(context, args);
            }, delay);
        };
    }

    function handleCommonInputs(inputId, errorId) {
        return function () {
            const input = $(`#${inputId}`);
            const error = $(`#${errorId}`);

            let value = input.val();

            // Capitalize the input and ensure only alpha characters are accepted
            value = value.replace(/[^a-zA-Z ]/g, '').toLowerCase().split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');

            input.val(value); // Update the input value

            if (value.length < 4) {
                error.text("Minimum length is 4 characters.");
                return;
            }

            error.text('');
        };
    }


    // calling functions
    $('#module_name').on('keyup', debounce(handleCommonInputs('module_name', 'module_name_error'), 300));
    $('#title').on('keyup', debounce(handleCommonInputs('title', 'title_error'), 300));
});
