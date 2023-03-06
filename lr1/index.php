<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 1</title>
    <link rel="stylesheet" href="main.css" />
    <link rel="stylesheet" href="reset.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap"
      rel="stylesheet"
    />
</head>
<body>
    <header class="header">
        <img src="img\mospolytech_logo_white.png" alt="Логотип МПУ" class="header_logo">
        <h1 class="header_text">2.1.Домашняя работа: Hello, World!</h1>
    </header>
    <main>
        <section class="main-content">
            <?php
                $pics = array("./img/melon-music-1.jpg", "./img/melon-music-2.jpg", "./img/melon-music-3.jpg", "./img/melon-music-4.jpg");
                for ($i = 0; $i < 4; $i++) {     
                    echo "<div class='card'>";
                    echo "<a href='https://www.instagram.com/budaog'><img src='$pics[$i]'></a>";
                    echo "<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora aliquid, nesciunt maxime illum quo quas reprehenderit asperiores facilis, corporis harum quis eveniet. Consectetur dolorum debitis iste dolores vitae, exercitationem sapiente!</p>";
                    echo "</div>";
                }
            ?>
            
        </section>
    </main>
    <footer class="footer">
        <p class="footer_text"> Выполнил: Данцаранов Владислав</p>
    </footer>
</body>
</html>