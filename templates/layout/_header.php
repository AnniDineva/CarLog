<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>AutoRepair</title>
        <link rel="stylesheet" href="/css/mdb/bootstrap.min.css">
        <link rel="stylesheet" href="/css/mdb/mdb.min.css">
        <link rel="stylesheet" type="text/css" href="/css/datatables.min.css"/>
        <link rel="stylesheet" href="/css/autorepairs.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
    </head>
    <body
        <div class="container">
            <!--Main Navigation-->
        <header class="view">

            <nav class="navbar navbar-expand-lg navbar-dark navbar-dark indigo">
                <a class="navbar-brand" href="/cars"><strong>My cars</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link"  href="/mechanics">Mechanics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/administrativeCost">Administrative cost</a>
                        </li>
                        <li class="dropdown">
                            <a class=" nav-link dropdown-toggle " data-toggle="dropdown" href="#">Repairs
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                               <li><a href="#">Repairs</a></li>
                               <li><a href="/parts">Типове части</a></li>
                               <li><a href="/parts/listParts">Части</a></li>
                               <li><a href="#">Ремонтирани части</a></li>
                            </ul>
                        </li>
                </div>
            </nav>

        </header>
        <!--Main Navigation-->
