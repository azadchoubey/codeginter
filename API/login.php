<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" >

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php 
                            if(isset($result)){
                                    print_r($result['message']);
                            }
                ?>
                <?php echo form_open('index.php/admin/apilogin');
                            echo form_input(['name'=>'username', 'class'=>'form-control mt-4', 'placeholder'=>'Username',"required"=>"required"]);
                            echo form_input(['name'=>'password', 'class'=>'form-control mt-4', 'placeholder'=>'Password',"required"=>"required"]);
                            echo form_submit(['name'=>'Submit', 'class'=>'btn btn-primary mt-4', 'value'=>'Login']);
                            echo form_close();
                ?>

            </div>    
        </div>
    </div>
</body>
</html>