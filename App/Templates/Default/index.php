<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kyla Framework</title>
    <link rel="stylesheet" href="<?=url('assets.css')?>/style.css">
</head>
<body>
    <header>
        <div class="container">
            <a href="#" class="logo-bar">
                <h1 class="logo">KylaFW</h1>
            </a>
        </div>
    </header>
    <div class="main">
        <!--Sidebar -->
        <div class="sidebar">
            <span class="menu-sidebar title">Main  Menu</span>
            <a href="<?=url('')?>" class="menu-sidebar <?php if(segment(0) == "Segment Not Found"):?>active<?php endif; ?>">Dashboard</a>
        </div>
        <div class="content">
            <div class="container">
                <?php view($page,$parram);?>         
            </div>
        </div>
    </div>
</body>
</html>
