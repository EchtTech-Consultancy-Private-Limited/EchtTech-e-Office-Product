// Debounce function to limit the frequency of function calls
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

$(document).ready(function () {

    // Attach the debounced handleInput function to the onkeyup event
    // $('#reg_name_required').on('keyup', debounce(handleCommonInputs('reg_name_required', 'employee_name_error'), 300));
    // $('#reg_email_required').on('keyup', debounce(handleEmailInput('reg_email_required', 'reg_email_error'), 300));

});

// Stepper lement
var element = document.querySelector("#kt_stepper_example_basic");

// Initialize Stepper
var stepper = new KTStepper(element);

// Handle next step
stepper.on("kt.stepper.next", function (stepper) {

    const employee_id = $('#employee_id').val();
    const employee_id_error = $('#employee_id_error');

    const validationErrors = {};

    if(stepper.currentStepIndex === 1){



        if(employee_id ==="")
        {
            validationErrors.employee_id =  employee_id_error.text("Please enter employee ID");
        }
         else
         {
            employee_id_error.text("");
         }


        const name = $("#name").val();
        const name_error = $("#name_error");
        if(name === ""){
            validationErrors.name =  name_error.text("Please enter employee name!");

        }else{
            $("#name_error").text("");
        }

        const email = $("#email").val();
        const email_error = $("#email_error");
        if(email === ""){
            validationErrors.email =  email_error.text("Please enter email");

        }else{
            $("#email_error").text("");
        }

        const emp_mobile_number = $("#emp_mobile_number").val();
        const emp_mob_error = $("#emp_mob_error");
        if(emp_mobile_number === ""){
            validationErrors.emp_mobile_number =  emp_mob_error.text("Please enter number");

        }

        else{

            $("#emp_mob_error").text("");

        }

        const emp_gender_req = $("#emp_gender_req").val();
        const emp_gender_error = $("#emp_gender_error");
        if(emp_gender_req === ""){
            validationErrors.emp_gender_req =  emp_gender_error.text("Please select gender");

        }else{
            $("#emp_gender_error").text("");
        }

        const dob = $("#dob").val();
        const dob_error = $("#dob_error");
        if(dob === ""){
            validationErrors.dob =  dob_error.text("Please select DOB");

        }else{
            $("#dob_error").text("");
        }

        const country = $("#country").val();
        const country_error = $("#country_error");
        if(country === ""){
            validationErrors.country =  country_error.text("Please select country");

        }else{
            $("#country_error").text("");
        }

        const city = $("#city").val();
        const city_error = $("#city_error");
        if(city === ""){
            validationErrors.city =  city_error.text("Please select city");

        }else{
            $("#city_error").text("");
        }

        const state = $("#state").val();
        const state_error = $("#state_error");
        if(state === ""){
            validationErrors.state =  state_error.text("Please select state");

        }else{
            $("#state_error").text("");
        }

        const pincode = $("#pincode").val();
        const pincode_error = $("#pincode_error");
        if(pincode === ""){
            validationErrors.pincode =  pincode_error.text("Please select pincode");

        }else{
            $("#pincode_error").text("");
        }
        const current_address = $("#current_address").val();
        const current_address_error = $("#current_address_error");
        if(current_address === ""){
            validationErrors.current_address =  current_address_error.text("Enter Current address");

        }else{
            $("#current_address_error").text("");
        }
        const permanent_address = $("#permanent_address").val();
        const permanent_address_error = $("#permanent_address_error");
        if(permanent_address === ""){
            validationErrors.permanent_address =  permanent_address_error.text("Enter Permanent address");

        }else{
            $("#permanent_address_error").text("");
        }

        const image = $("#image").val();
        const image_error = $("#image_error");
        if(image === ""){
            validationErrors.image =  image_error.text("Upload Image");

        }else{
            $("#image_error").text("");
        }

        console.log(validationErrors);


        if (Object.keys(validationErrors).length>0)
        {
            $("#" + Object.keys(validationErrors)[0]).focus();
            return;
        }

         // const employee_id = $("#employee_id").val();
        // if(employee_id === ""){
        //     $("#employee_id_error").text("Please enter your employee id");
        //     return;
        // }else{
        //     $("#employee_id_error").text("");
        // }

        // const reg_email_required = $("#reg_email_required").val();
        // if(reg_email_required === ""){
        //     $("#employee_email_error").text("Please enter correct email");
        //     return;
        // }else{
        //     $("#employee_email_error").text("");
        // }

        // const emp_mobile_number = $("#emp_mobile_number").val();
        // if(emp_mobile_number === "" ){
        //     $("#mob_error").text("Please enter correct number");
        //     return;
        // }
        // else{

        //     if(emp_mobile_number.length <10)
        //     {
        //         $("#mob_error").text("Please enter 10 digits");
        //          return;
        //     }

        //     $("#mob_error").text("");
        // }



        // const reg_employee_img = $("#reg_employee_img").val();
        // if(reg_employee_img === ""){
        //     $("#reg_employee_img_error").text("please upload image");
        //     return;
        // }else{
        //     $("#reg_employee_img_error").text("");
        // }




    }

    else if(stepper.currentStepIndex == 2){


        // const employee_degree = $("#employee_degree").val();
        // if(employee_degree === ""){
        //     $("#employee_degree_error").text("Degree must not be empty");
        //     return;
        // }else{
        //     $("#employee_degree_error").text("");
        // }


        // const employee_course = $("#employee_course").val();
        // if(employee_course === ""){
        //     $("#employee_course_error").text("Course must not be empty");
        //     return;
        // }else{
        //     $("#employee_course_error").text("");
        // }

        // const employee_edu_strtdate = $("#employee_edu_strtdate").val();
        // if(employee_edu_strtdate === ""){
        //     $("#employee_edu_strtdate_error").text("select start date");
        //     return;
        // }else{
        //     $("#employee_edu_strtdate").text("");
        // }

        // const employee_edu_enddate = $("#employee_edu_enddate").val();
        // if(employee_edu_enddate === ""){
        //     $("#employee_edu_enddate_error").text("select end date");
        //     return;
        // }else{
        //     $("#employee_edu_enddate_error").text("");
        // }

        // const emp_certificate_file = $("#emp_certificate_file").val();
        // if(emp_certificate_file === ""){
        //     $("#emp_certificate_file_error").text("Certificate must not be empty");
        //     return;
        // }else{
        //     $("#emp_certificate_file_error").text("");
        // }

        // stepper.goNext(); // go next step

    }


    else if(stepper.currentStepIndex == 3){

       const wh_companyname = $("#wh_companyname").val();
       if(wh_companyname==="")
       {
          $("#wh_companyname_error").text("enter company name");
          return;
       }
       else{
        $("#wh_companyname_error").text("");
        }

        const wh_department = $("#wh_department").val();
       if(wh_department==="")
       {
          $("#wh_department_error").text("enter department name");
          return;
       }
       else{
        $("#wh_department_error").text("");
        }

        const wh_designation = $("#wh_designation").val();
       if(wh_designation==="")
       {
          $("#wh_designation_error").text("enter designation name");
          return;
       }
       else{
        $("#wh_designation_error").text("");
        }

        const wh_join_date = $("#wh_join_date").val();
        if(wh_join_date==="")
        {
           $("#wh_join_date_error").text("enter join date");
           return;
        }
        else{
         $("#wh_join_date_error").text("");
         }

         const wh_end_date = $("#wh_end_date").val();
        if(wh_end_date==="")
        {
           $("#wh_end_date_error").text("enter end date");
           return;
        }
        else{
         $("#wh_end_date_error").text("");
         }





    }
    else if(stepper.currentStepIndex == 4){

        const bnk_acctype = $("#bnk_acctype").val();
        if(bnk_acctype==="")
        {
           $("#bnk_acctype_error").text("enter bank type");
           return;
        }
        else{
         $("#bnk_acctype_error").text("");
         }





     }
    stepper.goNext(); // go next step
});

// Handle previous step for dob
stepper.on("kt.stepper.previous", function (stepper) {
    stepper.goPrevious(); // go previous step
});

// calander flatpicker
$("#dob").flatpickr({
    maxDate: new Date()
});
