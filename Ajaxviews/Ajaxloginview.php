<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Ajax Login</title>
  </head>
  <body>
  <div class="container mt-5 form-control border border-success">   
      <h3 class="mt-5" style="text-align: center;"> Login To Your Account </h3>

      <div class="form-floating mb-3 mt-5">
          <p class="result"></p>
  <?php echo form_input(['type'=>'Username', 'value'=>'','class'=>'form-control mr-md-3','id'=>'floatingInput','placeholder'=>'username']); ?>
  <label for="floatingInput">Username</label>
</div>
<div class="form-floating ">
<?php echo form_input(['type'=>'Password','class'=>'form-control','id'=>'floatingPassword','placeholder'=>'Password']); ?>
<label for="floatingPassword">Password</label>
 <button type="submit" class="btn btn-outline-primary btn-lg btn-block mt-3 mb-3 mr-4" id='submit'>Login</button>
 <?php echo  anchor('ajaxincode/ajaxlogin/ajaxsignup','Create a new account !' ); ?>   

</div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <script>
        $(document).ready(function(){
               
                $('#floatingInput').keyup(function(){
                  let userame=$('#floatingInput').val();

                    $.ajax({
                        url: '<?php echo base_url('index.php/ajaxincode/ajaxlogin/ajaxloginpage');?>' ,
                        type: "POST",
                        data:{Username:userame},
                        dataType: 'jsonp',

                        success: function(data){

                          if(data){
                            $('.result').html("username already taken");
                          }
                       
                    else{
                            $('.result').html("username is available");
                          }
                           


                        }


                    })

                })
        })


    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>
