function employee_validation(){



    var name            =   $("#name").val().trim(); 
    var name_pattern    =   /^[a-zA-Z ]{2,30}$/;
    var email           =   $("#email").val().trim(); 
    var email_pattern   =   /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
    var phone           =   $("#phone").val().trim(); 
    var phone_pattern   =   /^\d{10}$/;
    var address         =   $("#address").val().trim();  
    var dob             =   $("#dob").val().trim();  
    var image           =   $("#image").val().trim();  
    var ext             =   $('#image').val().split('.').pop().toLowerCase();
    var button          =   $("#button").val().trim();  
  
    if(name=="")
    {
       $("#nameErr").fadeIn().html("<small>Name Required</small>");
       setTimeout(function(){ $("#nameErr").fadeOut(); }, 3000);
       $("#name").focus();
       return false; 
    }
    else if(!name_pattern.test(name))
    {
       $("#nameErr").fadeIn().html("<small>Invalid Name</small>");
       setTimeout(function(){ $("#nameErr").fadeOut(); }, 3000);
       $("#name").focus();
       return false;       
    }
   
    if(email=="")
    {
      $("#emailErr").fadeIn().html("<small>Email Required</small>");
      setTimeout(function(){ $("#emailErr").fadeOut(); }, 3000);
      $("#email").focus();
      return false; 
     } 
    else if(!email_pattern.test(email))
    {
       $("#emailErr").fadeIn().html("<small>Invalid Email</small>");
       setTimeout(function(){ $("#emailErr").fadeOut(); }, 3000);
       $("#email").focus();
       return false;       
    }

    if(phone=="")
    {
      $("#phoneErr").fadeIn().html("<small>Phone No. Required</small>");
      setTimeout(function(){ $("#phoneErr").fadeOut(); }, 3000);
      $("#phone").focus();
      return false; 
     } 
    else if(!phone_pattern.test(phone))
    {
       $("#phoneErr").fadeIn().html("<small>Invalid Email</small>");
       setTimeout(function(){ $("#phoneErr").fadeOut(); }, 3000);
       $("#phone").focus();
       return false;       
    }

     if(address=="")
     {
       $("#addressErr").fadeIn().html("<small>Address Required</small>");
       setTimeout(function(){ $("#addressErr").fadeOut(); }, 3000);
       $("#address").focus();
       return false; 
      }

      if(dob=="")
      {
       $("#dobErr").fadeIn().html("<small>Date of Birth Required</small>");
       setTimeout(function(){ $("#dobErr").fadeOut(); }, 3000);
       $("#dob").focus();
       return false; 
      }

      if(button == 'Add'){
         if(image == ''){
         $("#imageErr").fadeIn().html("<small>Image Required</small>");
         setTimeout(function(){ $("#imageErr").fadeOut(); }, 3000);
         $("#image").focus();
         return false; 
      }
      }
     
      
      if(image != ''){
         if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
            $("#imageErr").fadeIn().html("<small>Invalid File Type!</small>");
            setTimeout(function(){ $("#imageErr").fadeOut(); }, 3000);
            $("#image").focus();
            return false; 
        }
      }

   $(".saveBtn").click();
    
}


//set datepicker for date of birth

$( function() {
    $( ".datepicker" ).datepicker({
          maxDate: '0',
          changeMonth: true,
          changeYear: true,
          yearRange: "-100:+0",
          dateFormat: 'yy-mm-dd'
      });
  } );


