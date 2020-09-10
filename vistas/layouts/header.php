<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/clothes.ico" />
    <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    
    <title>STORET</title>
</head>
<body>
    <div id="container">
    <!--CABECERA-->
    <header id="header"> 
    <div id="logo" class="d-none d-md-block">
    <a href="<?=base_url?>">
    <h1>Storet</h1>
    </a>
    </div>
    </header>

    <!--MENU-->
    <?php  $categorias= Utils::showCategorias(); ?>
    
    <div class="topnav" id="myTopnav">
    <a href="<?=base_url?>" class="active">Inicio</a>
    <?php while($cat= $categorias->fetch_object()):?>
        <?php
        if(isset($_GET["id"])){
            $id = isset($_GET['id']) ? $_GET['id'] : null;
            $idcat=isset($cat->id) ? $cat->id : null;
        } 
        ?>
        <a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>" class="<?=($id!=="$idcat") ? " " : "selected" ?>"><?=$cat->nombre ?></a>
    <?php endwhile; ?>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
    </div>
    
    <div id="content">
    <div id="main"> 
</div>