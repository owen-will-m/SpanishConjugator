<!DOCTYPE html>




<?php
$verb = $_GET['verbo'];
?>


<html lang="en">
<head>
     <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="translate.js"></script>
</head>


<body>
    
    
    <div class="jumbotron">

        <div class="container">
            <h1 class="display-3" id="header">
               
            </h1>
            <h2 id="def"></h2>
        </div>

    </div>
    
    
    
    
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
            
               <h1>Yo</h1> 
                <input type="text" class="form-control" id="pro1">
                <h2 id="ans1"> </h2>

          
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
               
               <h1>Tu</h1> 
                <input type="text" class="form-control" id="pro2">
                <h2 id="ans2"> </h2>
             
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                
               <h1>El</h1> 
               <input type="text" class="form-control" id="pro3">
               <h2 id="ans3"> </h2>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
               
               <h1>Nosotros</h1> 
                <input type="text" class="form-control" id="pro4">
                <h2 id="ans4"> </h2>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
               
               <h1>Ustedes</h1> 
                <input type="text" class="form-control" id="pro5">
                <h2 id="ans5"> </h2>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
       
                <button class="btn-primary btn-lg" id="check_correct">Submit</button>
                <button class="btn-danger btn-lg" id="i_dunno">I dunno!</button>
            </div>
            
            
        </div>
        
        
    </div>
    
</body>