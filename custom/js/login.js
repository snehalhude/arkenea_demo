setTimeout(function(){ $(".flash").fadeOut(); }, 2000);

function login_validation(){

    var email           =   $("#email").val().trim(); 
    var email_pattern   =   /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
    var password        =   $("#password").val().trim(); 

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
    if(password=="")
    {
     $("#passwordErr").fadeIn().html("<small>Password Required</small>");
     setTimeout(function(){ $("#passwordErr").fadeOut(); }, 3000);
     $("#password").focus();
     return false; 
     } 

   $(".saveBtn").click();
    
}


function register_validation(){

    var name            =   $("#name").val().trim(); 
    var name_pattern    =   /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
    var email           =   $("#email").val().trim(); 
    var email_pattern   =   /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
    var password        =   $("#password").val().trim(); 
    var confirm_password=   $("#confirm_password").val().trim(); 
    
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
    if(password=="")
    {
     $("#passwordErr").fadeIn().html("<small>Password Required</small>");
     setTimeout(function(){ $("#passwordErr").fadeOut(); }, 3000);
     $("#password").focus();
     return false; 
     } 

     if(confirm_password==""){
      $("#confirm_passwordErr").fadeIn().html("<small>Confirm Password Required</small>");
      setTimeout(function(){ $("#confirm_passwordEr").fadeOut(); }, 3000);
      $("#confirm_password").focus();
      return false; 
      } 

      if(password != confirm_password ){
         $("#confirm_passwordErr").fadeIn().html("<small>Password and Confirm Password should be same</small>");
         setTimeout(function(){ $("#confirm_passwordEr").fadeOut(); }, 3000);
         $("#confirm_password").focus();
         return false; 
      }

      $(".saveBtn").click();


}