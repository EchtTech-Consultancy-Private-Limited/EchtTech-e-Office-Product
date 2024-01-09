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

function handlePincodeInput(inputId, errorId) {
    return function () {
        const input = $(`#${inputId}`);
        const error = $(`#${errorId}`);

        let pincode = input.val().trim();

        // Remove non-numeric characters
        pincode = pincode.replace(/\D/g, '');

        // Basic pincode validation for 6-digit numeric values
        const pincodePattern = /^\d{6}$/;

        if (!pincodePattern.test(pincode)) {
            error.text("Please enter a valid 6-digit numeric pincode.");
            return;
        }

        input.val(pincode); // Update the input value

        error.text('');
    };
}

function handleEmailInput(inputId, errorId) {
    return function () {
        const input = $(`#${inputId}`);
        const error = $(`#${errorId}`);

        let email = input.val().trim();

        // Basic email format validation using a regular expression
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailPattern.test(email)) {
            error.text("Please enter a valid email address.");
            return;
        }

        input.val(email); // Update the input value

        error.text('');
    };
}

$(document).ready(function () {

    // Attach the debounced handleInput function to the onkeyup event
    $('#reg_name_required').on('keyup', debounce(handleCommonInputs('reg_name_required', 'employee_name_error'), 300));
    $('#reg_email_required').on('keyup', debounce(handleEmailInput('reg_email_required', 'reg_email_error'), 300));
    $('#pincode').on('keyup', debounce(handlePincodeInput('pincode', 'pincode_error'), 300));

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








    }

    else if(stepper.currentStepIndex == 2){


        // degree name validation
        const degreename = $("#degreename").val();
        const degreename_error = $("#degreename_error");
        if(degreename === ""){
            validationErrors.degreename =  degreename_error.text("degree name missing");

        }else{
            $("#degreename_error").text("");
        }
         // course title validation
        const coursetitle = $("#coursetitle").val();
        const coursetitle_error = $("#coursetitle_error");
        if(coursetitle === ""){
            validationErrors.coursetitle =  coursetitle_error.text("course title missing");

        }else{
            $("#coursetitle_error").text("");
        }

         // start date validation
         const startdate = $("#kt_datepicker_12").val();
         const startdate_error = $("#startdate_error");
         if(startdate === ""){
             validationErrors.startdate =  startdate_error.text("select start date");

         }else{
             $("#startdate_error").text("");
         }

         // start date validation
         const enddate = $("#kt_datepicker_21").val();
         const enddate_error = $("#enddate_error");
         if(enddate === ""){
             validationErrors.enddate =  enddate_error.text("select end date");

         }else{
             $("#enddate_error").text("");
         }
         // certificate file validation
         const certificatefile = $("#certificatefile").val();
         const certificatefile_error = $("#certificatefile_error");
         if(certificatefile === ""){
             validationErrors.certificatefile =  certificatefile_error.text("select certificate file");

         }else{
             $("#certificatefile_error").text("");
         }


        if (Object.keys(validationErrors).length>0)
        {
            $("#" + Object.keys(validationErrors)[1]).focus();
            return;
        }
    }


    else if(stepper.currentStepIndex == 3){



      // company name validation
      const companyname = $("#companyname").val();
      const companyname_error = $("#companyname_error");
      if(companyname === ""){
          validationErrors.companyname =  companyname_error.text("select company name");

      }else{
          $("#companyname_error").text("");
      }

      // department validation
      const department = $("#department").val();
      const department_error = $("#department_error");
      if(department === ""){
          validationErrors.department =  department_error.text("select department");

      }else{
          $("#department_error").text("");
      }

      // designation validation
      const designation = $("#designation").val();
      const designation_error = $("#designation_error");
      if(designation === ""){
          validationErrors.designation =  designation_error.text("select designation");

      }else{
          $("#designation_error").text("");
      }

      // joining date validation
      const joiningdate = $("#kt_datepicker_jd").val();
      const joiningdate_error = $("#joiningdate_error");
      if(joiningdate === ""){
          validationErrors.joiningdate =  joiningdate_error.text("select joining date");

      }else{
          $("#joiningdate_error").text("");
      }

      // leaving date validation
      const leavingdate = $("#kt_datepicker_ld").val();
      const leavingdate_error = $("#leavingdate_error");
      if(leavingdate === ""){
          validationErrors.leavingdate =  leavingdate_error.text("select leaving date");

      }else{
          $("#leavingdate_error").text("");
      }


      if (Object.keys(validationErrors).length>0)
      {
          $("#" + Object.keys(validationErrors)[2]).focus();
          return;
      }


    }
    else if(stepper.currentStepIndex == 4){


          // account type validation
      const accounttype = $("#accounttype").val();
      const accounttype_error = $("#accounttype_error");
      if(accounttype === ""){
          validationErrors.accounttype =  accounttype_error.text("select account type");

      }else{
          $("#accounttype_error").text("");
      }

         // account number validation
         const accountnumber = $("#accountnumber").val();
         const accountnumber_error = $("#accountnumber_error");
         if(accountnumber === ""){
             validationErrors.accountnumber =  accountnumber_error.text("account number missing");

         }else{
             $("#accountnumber_error").text("");
         }

         // bank name validation
         const bankname = $("#bankname").val();
         const bankname_error = $("#bankname_error");
         if(bankname === ""){
             validationErrors.bankname =  bankname_error.text("bank name missing");

         }else{
             $("#bankname_error").text("");
         }

         // ifsc code validation
         const ifsccode = $("#ifsccode").val();
         const ifsccode_error = $("#ifsccode_error");
         if(ifsccode === ""){
             validationErrors.ifsccode =  ifsccode_error.text("ifsc code missing");

         }else{
             $("#bankname_error").text("");
         }


          // branch address validation
          const branchaddress = $("#branchaddress").val();
          const branchaddress_error = $("#branchaddress_error");
          if(branchaddress === ""){
              validationErrors.branchaddress =  branchaddress_error.text("branch address missing");

          }else{
              $("#branchaddress_error").text("");
          }

          // passbook validation
          const passbook = $("#passbook").val();
          const passbook_error = $("#passbook_error");
          if(passbook === ""){
              validationErrors.passbook =  passbook_error.text("passbook missing");

          }else{
              $("#passbook_error").text("");
          }

          // documentation file validation
          const documentfile = $("#documentfile").val();
          const documentfile_error = $("#documentfile_error");
          if(documentfile === ""){
              validationErrors.documentfile =  documentfile_error.text("doc file missing");

          }else{
              $("#documentfile_error").text("");
          }


        if (Object.keys(validationErrors).length>0)
        {
            $("#" + Object.keys(validationErrors)[3]).focus();
            return;
        }
     }
    stepper.goNext(); // go next step
});

// Handle previous step for dob
stepper.on("kt.stepper.previous", function (stepper) {
    stepper.goPrevious(); // go previous step
});

new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_date_only"), {
    display: {
        viewMode: "calendar",
        components: {
            decades: true,
            year: true,
            month: true,
            date: true,
            hours: false,
            minutes: false,
            seconds: false
        }
    }
});


// Format options for country select
var optionFormat = function(item) {
    if ( !item.id ) {
        return item.text;
    }

    var span = document.createElement('span');
    var imgUrl = item.element.getAttribute('data-kt-select2-country');
    var template = '';

    template += '<img src="' + imgUrl + '" class="rounded-circle h-20px me-2" alt="image"/>';
    template += item.text;

    span.innerHTML = template;

    return $(span);
}

// Init Select2 --- more info: https://select2.org/
$('#kt_docs_select2_country').select2({
    templateSelection: optionFormat,
    templateResult: optionFormat
});
