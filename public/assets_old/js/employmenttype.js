function emp_type_save(){

    const employementtype = $("#employementtype").val();
    if(employementtype==="")
    {
     $("#employementtype_error").text("enter employment type");
    }
    else if(!employementtype=="")
    {

      $("#kt_modal_1").hide();
      $('.fade').css('opacity','0');
      location. reload();
    }
    else
    {
     $("#employementtype_error").text("");
    }
}
