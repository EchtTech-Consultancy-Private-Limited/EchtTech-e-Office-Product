// roles.js

$(document).ready(function () {
    const nameInput = $('#name');
    const titleInput = $('#title');
    const nameError = $('#nameError');
    const titleError = $('#titleError');
    const loader = $('#loader');
    const rolesData = $('#rolesData');

    function clearForm() {
        nameInput.val('');
        titleInput.val('');
        nameError.text('');
        titleError.text('');
    }

    function updateErrorMessages() {
        nameError.text(nameInput.val().trim() === '' ? 'Name is required.' : '');
        titleError.text(titleInput.val().trim() === '' ? 'Title is required.' : '');
    }

    function submitForm() {
        updateErrorMessages();

        const name = nameInput.val();
        const title = titleInput.val();

        if (name.trim() === '' || title.trim() === '') {
            return;
        }

        $.ajax({
            type: 'POST',
            url: "/admin/roles",
            data: { name: name, title: title },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            success: function (response) {
                $('#kt_modal_new_client').modal('hide');
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: response.message,
                    showConfirmButton: false,
                    timer: 3000
                });

                clearForm();
                getRoles();
            },
            error: function (xhr, status, error) {
                const errors = xhr.responseJSON.errors;
                for (const key in errors) {
                    if (key === 'name') {
                        nameError.text(errors[key][0]);
                    } else if (key === 'title') {
                        titleError.text(errors[key][0]);
                    }
                }
            }
        });
    }

    function getRoles() {
        loader.show();
        $.ajax({
            type: 'GET',
            url: "/admin/get-roles",
            dataType: 'json',
            success: function (response) {
                loader.hide();
                rolesData.empty();

                $.each(response, function (index, role) {
                    const row = `<tr>
                        <td>${role.name}</td>
                        <td>${role.title}</td>
                        <td>${role.is_active === 1 ? 'Active' : 'Inactive'}</td>
                        <td class="text-end">
                            <a class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    </tr>`;
                    rolesData.append(row);
                });
            },
            error: function (xhr, status, error) {
                console.error('Error fetching roles data:', error);
                loader.hide();
            }
        });
    }

    // Call the function on page load or wherever needed
    getRoles();

    // Attach the submitForm function to the click event of the submitBtn
    $('#submitBtn').click(submitForm);

    // Attach input event listeners to clear error messages as the user types
    nameInput.on('input', updateErrorMessages);
    titleInput.on('input', updateErrorMessages);
});
