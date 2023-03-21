<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 4</title>
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
        <h1 class="header_text">1.2. Домашняя работа: Solve the equation.</h1>
    </header>
    <main>
        <section class="main-content">
            <?php
                function equalplus($example){
                    $res = 0;
                    $nums = explode("+", $example); 
                    foreach($nums as $num){
                        if( !is_numeric($num)) {
                            $num = equalminus($num);
                        }
                        $res += $num;
                    }
                    return $res;
                }
                function equalminus($example){
                    $nums = explode("-", $example); 
                    if (!is_numeric($nums[0])) {
                        $nums[0] = equalmult($nums[0]);
                    }
                    $res = $nums[0];
                    for($i = 1; $i < count($nums); $i++){
                        if (!is_numeric($nums[$i])) {
                            $nums[$i] = equalmult($nums[$i]);
                        }
                        $res -= $nums[$i];
                    }
                    return $res;           
                }
                function equalmult($example){
                    $res = 1;
                    $nums = explode("*", $example); 
                    foreach($nums as $num){
                        if (!is_numeric($num)) $num = equaldel($num);
                        $res *= $num;
                    }
                    return $res;        
                }
                function equaldel($example){
                    $nums = explode("/", $example); 
                    $res = $nums[0];
                    for($i = 1; $i < count($nums); $i++){
                        $res /= $nums[$i];
                    }
                    return $res;           
                }
                
                $primer = "4+4+2";
                echo "результат ".equalplus($primer);
            ?>
            </p>
        </section>
    </main>
    <footer class="footer">
        <p class="footer_text"> Выполнил: Данцаранов Владислав</p>
    </footer>
</body>
</html>