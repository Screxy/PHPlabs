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
                function brackets($example){
                    $brackets_index = [];
                    $brackstak = [];
                    
                    for ($i = 0; $i < strlen($example); $i++) {
                        if ($example[$i] == "("){
                            array_push($brackstak, $i);
                        }
                        if ($example[$i] == ")"){
                            $lastbrack = array_pop($brackstak);
                            array_unshift($brackets_index, $lastbrack." ".$i);
                        };
                    }
                    array_unshift($brackets_index, "0 ".strlen($example)-1);
                    return $brackets_index;
                };
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
                function equal($example, $bracks){
                    $indexs = explode(" ", array_shift($bracks));
                    $fstindx = (int)($indexs[0]);
                    $lstindx = (int)($indexs[1]);
                    while (!empty($bracks) && explode(" ", $bracks[0])[0] > $fstindx && explode(" ", $bracks[0])[1] < $lstindx) {
                        $nested = array_shift($bracks);
                        $nested_res = equal(substr($example, $nested[0], $nested[1] - $nested[0] + 1), [$nested]);
                        $example = substr_replace($example, $nested_res, $nested[0], $nested[1] - $nested[0] + 1);
                        $lstindx = $lstindx - ($nested[1] - $nested[0] + 1) + strlen((string)$nested_res);
                    }
                    return equalplus(substr($example, $fstindx, $lstindx - $fstindx + 1));
                }
                $primer = "4+(4+2)";
                $brackets_index = brackets($primer);
                echo "результат ".equal($primer, $brackets_index);
            ?>
            </p>
        </section>
    </main>
    <footer class="footer">
        <p class="footer_text"> Выполнил: Данцаранов Владислав</p>
    </footer>
</body>
</html>