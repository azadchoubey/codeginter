<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  
        <link rel = "stylesheet" type = "text/css" 
   href = "<?php echo base_url(); ?>css/loading.css">
    <title>Ajax Login</title>
</head>

<body>
    <div class="container mt-5 col-5 border border-success">
        <h3 class="mt-5" style="text-align: center;"> Login To Your Account </h3>
        <div class="row mt-5">
        <p id="result" class="text-danger "></p>

            <div class="col-11 form-floating">
                <?php echo form_input(['type'=>'Username', 'value'=>'','class'=>'form-control mr-md-3','id'=>'floatingInput','placeholder'=>'username']); ?>

                <label for="floatingInput"> Username</label>
               
            </div>
            <div class="col-11 form-floating mt-4">

                <?php echo form_input(['type'=>'Password','class'=>'form-control','id'=>'floatingPassword','placeholder'=>'Password','required'=>'']); ?>
                <label for="floatingPassword"> Password</label>
                
                <div id="cover-spin"></div>

                <button type="submit" class="btn btn-outline-primary btn-lg btn-block mt-3 mb-3 mr-4" id='submit'
                    >Login</button>
                <?php echo  anchor('ajaxincode/ajaxlogin/ajaxsignup','Create a new account !' ); ?>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
      
        // $('#floatingPassword').mouseout(function() {
        //     let password = $('#floatingPassword').val();
        // let userame = $('#floatingInput').val();

        //     if (userame.length > 3 && password.length > 3) {

        //         $.ajax({
        //             url: '<?php echo base_url('index.php/ajaxincode/ajaxlogin/ajaxloginpage');?>',
        //             type: "POST",
        //             dataType: 'json',
        //             data: {
        //                 Username: userame
        //             },
        //             success: function(data) {
        //                 if (data == true) {
        //                     $('#floatingInput').css('border-color', 'Green ');
        //                     submit.disabled = false;

        //                 } else {

        //                     $('#result').fadeIn();
        //                     $('#result').html("invaild username");
        //                     $('#floatingInput').css('border-color', 'Red');
        //                     setTimeout(function() {
        //                         $('#result').fadeOut()
        //                     }, 3000)
        //                     submit.disabled = true;
        //                 }

        //             }

        //         })

        //     } else {
        //         submit.disabled = true;

        //     }
        // })

       
                $('#submit').click(function() {

                    $('#cover-spin').show(0);
                    let password = $('#floatingPassword').val();
                         let userame = $('#floatingInput').val();
                    $.ajax({
                        url: '<?php echo base_url('index.php/ajaxincode/ajaxlogin/submitlogin'); ?>',
                        type: "POST",
                        dataType: 'json',
                        data: {
                             Username: userame, 
                             Password: password

                    },
                        success: function(data) {
                            if (data == true) {
                                location.replace("http://localhost/ci/index.php/ajaxincode/ajaxlogin/homepage")
                            }else if(data == 2){
                                $('#cover-spin').hide(0);

                                $('#result').html("invaild username");
                            $('#floatingInput').css('border-color', 'Red');
                            setTimeout(function() {
                                $('#result').fadeOut()
                            }, 3000)
                            }
                            else {
                                $('#cover-spin').hide(0);

                                $('#floatingPassword').css('border-color', 'Red');

                                $('#result').html("invaild Password");

                            }

                        }


                    })

                })

    })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>