
<!DOCTYPE html> 
<html lang="en-US"> 
<head> 
<title> Location</title> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script> 


$(document).ready(function(){ 
    $('#end').hide();
    if (navigator.geolocation) { 

        navigator.geolocation.getCurrentPosition(showLocation); 

    } else { 

        $('#location').html('Geolocation is not supported by this browser.'); 

    } 

    $('#submit').click(function(){
       $('.contanier').hide();
        $('#end').show();


    })

}); 

function showLocation(position) { 

    var latitude = position.coords.latitude; 

    var longitude = position.coords.longitude; 

               $("#location").html("Longitude ="+ longitude + ",  Latitude="+ latitude); 
                document.cookie = "Longitude = " + position.coords.longitude; 
                document.cookie = "Latitude = " +  position.coords.latitude;
        

}

</script> 

<script> 
$(window).on('beforeunload ',function() {
    $.cookies.del('Longitude');
   $.cookies.del('Latitude');

});
 

 </script>

<style type="text/css"> 


.heading{border: 2px black ;width: auto; padding: 10px; }
p{ border: 2px dashed #009755; width: auto; padding: 10px; font-size: 18px; border-radius: 5px; color: red;} 

    span.label{ font-weight: bold; color: #000;}

</style> 

</head>     

<body style="background-color:white">
    <div class="contanier text-center mt-5">
 <h2 > SWITCH "ON" LOCATION / GPS OF YOUR MOBILE & SHARE YOUR LOCATION</h2>

 
  

    
     
    <p><span class="label">Your Location:</span> <span id="location"></span></p> 

    <!-- <button type="Submit" class="btn btn-primary btn-lg mt-5 border-danger rounded" id='submit'>CLICK HERE TO SEND YOUR LOCATION</button> -->
  <?php echo form_open_multipart('public/watermarks/submit');?>
  <?php  $today = date("Y-m-d H:i:s"); ?>   
    <form enctype="multipart/form-data" method="POST" action="<?php echo base_url('public/watermarks/submit');?>">
        <input type="file" name="image"> 
        <input type="hidden" name="caption" value=" <?php echo  $var='Longitude = '.$_COOKIE['Longitude']." Longitude= ".$_COOKIE['Latitude']?> ">
        <input type="hidden" name="time" value=" <?php echo  $var='Date : '. $today?> ">
        <input type="submit" name="submit">
    </form>
    

    </div>
  <h3 class="text-center mt-5 " id='end'>Thank You For Sharing Your Location. We Will Send Our Executive At Your Current Location</h3>
    
</body> 

</html>