<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/additional-methods.min.js'); ?>"></script>
</head>
<body>

<div class="container">
  <h2><?php echo $title; ?></h2>
<a href="<?php echo base_url('welcome/userlist'); ?>" class="btn btn-primary"  style="float:right;" > Customers List</a>
<br><br><br>

  	 <?php echo form_open_multipart(base_url('welcome/saveusers'), array('id' => 'addclient-form','class'=>'form-horizontal')); ?>

     <?php
          if(isset($users))
          {
              $firstname = $users->firstname;
              $email = $users->email;
              $mobile = $users->mobile;
              $country = $users->country;
              $comments = $users->comments;
              ?>
              <input type="hidden" name="id" value="<?php echo $users->id; ?>">

              <?php
          }
          else
          {
             $firstname =  $email =  $mobile =  $country =  $comments ='';
          }
     ?>

  	 <div class="form-group">
      <label class="control-label col-sm-2" for="email">First name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="firstname" placeholder="Enter Firstname" name="firstname" value="<?php echo $firstname;  ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $email;  ?>" >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Mobile:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="mobile" placeholder="Enter mobile" name="mobile" value="<?php echo $mobile;  ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Country:</label>
      <div class="col-sm-10">    
      <select name="country" id="country" class="form-control">
      	<option value="">--Select Country--</option>
      	<option value="India" <?php echo ($country=='India')?'selected':''; ?> >India</option>
      	<option value="USA" <?php echo ($country=='USA')?'selected':''; ?>>USA</option>
      	<option value="Japan" <?php echo ($country=='Japan')?'selected':''; ?>>Japan</option>
      </select>      
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Comments:</label>
      <div class="col-sm-10"> 
      <textarea name="comments" id="comments" class="form-control" ><?php echo $comments;  ?></textarea>         
      </div>
    </div>


    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>



<script type="text/javascript">
$(document).ready(function () {

$.validator.addMethod('fnType', function(value, element) {
return value.match(/^\+(?:[0-9] ?){6,14}[0-9]$/);
},'Enter Valid  phone number');


  var token =  $('input[name="csrf_token_name"]').attr('value'); 

    $('#addclient-form').validate({ 
    errorLabelContainer: "#cs-error-note",
    rules: {
    	 firstname:{
             required: true,
             lettersonly:true
         },
        email: {
            required: true,
            email: true,
        },
        mobile:{
             required: true,
             number:true,
         },
          country:{
             required: true,
         }
    },
    messages: {
    	 firstname: {
            required: "Please enter your firstname.",
            lettersonly: "First Name field should accept only alphabet",
        },
        email: {
            required: "Please enter your email address.",
            email: "Please enter a valid email address.",
        },
         mobile: {
            required: "Please enter your mobile.",
        },
         country: {
            required: "Please select your country.",
        },
    },
    submitHandler: function(form) {
                        form.submit();
                     }
    });
});
</script>
<style type="text/css">
.error
{
	color: red;
}	
</style>
</body>
</html>
