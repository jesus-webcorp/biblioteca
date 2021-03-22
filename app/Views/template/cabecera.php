<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Codeigniter4</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" 
    crossorigin="anonymous">

</head>
<body>  
    <h1 class="text-center">Biblioteca con Codeigniter4</h1>

    <div class="container">

        <?php if(session('mensaje')){ ?>

        <div class="alert alert-danger" role="alert">
            <?php 
                echo session('mensaje');
            ?>
        </div>
        <?php
            }
        ?>