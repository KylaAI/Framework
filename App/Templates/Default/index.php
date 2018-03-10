<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kyla Framework</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="<?=url('assets.css')?>/style.css?t=<?=random(16,'numeric')?>">
</head>
<body>
    <header class="desktop">
        <div class="container">
            <div class="item logo">
                <a href="">Kyla Framework</a>
            </div>
            <a href="" class="item hidden">Menu 1</a>
            <a href="" class="item hidden">Menu 2</a>
            <a href="" class="item hidden">Menu 3</a>
            <div class="item-right">
                <div>
                    <a href="" class="item hidden">Right 1</a>
                    <a href="" class="item hidden">Right 2</a>
                    <a href="#" class="item  show toggle">&#9776;</a>
                </div>
            </div>
        </div>
    </header>
    <header class="mobile left">
        <nav>
            <div class="item">
                <div class="item-header">Navigation</div>
                <a href="" class="item">Menu 1</a>
                <a href="" class="item">Menu 2</a>
                <a href="" class="item">Menu 3</a>
            </div>
        </nav>
    </header>
    <div class="content">
        <div class="content-data">
            <div class="container">
                <?php view($page,$parram)?>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        document.querySelector(".toggle").addEventListener("click",function(){
            var el = document.querySelector("header.mobile");
            el.classList.toggle('visible');
        });
    </script>
</body>
</html>
