<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <h1>Home</h1>
        <?php if(isset($result)){ 
              echo "<pre>";
              $ar=json_decode($result,true);          
                if($ar['code']==4){
                        print_r($ar[0]);
                    }
        }if(isset($insert)){
            if($insert['code']==4){

                print_r($insert);
            }else{
                print_r($insert['message']);
            
            }
          
        }
            ?>  

<div class="contanier">
    <div class="row">
        <div class="col-lg-6">
                <?php 
                          echo form_open('index.php/admin/apilogin/adduser');
                          echo form_input(['name'=>'username', 'class'=>'form-control mt-4', 'placeholder'=>'Username',"required"=>"required"]);
                          echo form_input(['name'=>'password', 'class'=>'form-control mt-4', 'placeholder'=>'Password',"required"=>"required"]);
                          echo form_submit(['name'=>'Submit', 'class'=>'btn btn-primary mt-4', 'value'=>'Add User']);
                          echo form_close();
                
                ?>
        </div>
    </div>
</div>
</body>
</html>