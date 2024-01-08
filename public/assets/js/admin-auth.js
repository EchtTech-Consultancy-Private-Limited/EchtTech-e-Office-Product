jQuery('#admin_login_form').validate({
    rules: {
        email: {
            required: true,
            email:true
        },
        password: {
            required: true
        },
    },
    messages: {
        email: "Email field is required",
        password: "Password field is required",
    }
});

function onSubmit(token) {
    document.getElementById("admin_login_form").submit();
}
