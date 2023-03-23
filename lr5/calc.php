<?php
                function equalPlus($example){
                    $res = 0;
                    $nums = explode("+", $example); 
                    // var_dump($nums);
                    // echo "я в плюсах смотрю массив<br>";
                    foreach($nums as $num){
                        if( !is_numeric($num)) {
                            // echo "я почемуто тут в плюсах <br>";

                            $num = equalMinus($num);
                        }
                        $res += $num;
                    }
                    // var_dump($res);
                    // echo "я в плюсах смотрю результат <br>";
                    return $res;
                }
                function equalMinus($example){
                    $nums = explode("-", $example); 
                    if (!is_numeric($nums[0])) {
                        $nums[0] = equalmult($nums[0]);
                    }
                    $res = $nums[0];
                    for($i = 1; $i < count($nums); $i++){
                        if (!is_numeric($nums[$i])) {
                            $nums[$i] = equalMult($nums[$i]);
                        }
                        $res -= $nums[$i];
                    }
                    return $res;           
                }
                function equalMult($example){
                    $res = 1;
                    $nums = explode("*", $example); 
                    foreach($nums as $num){
                        if (!is_numeric($num)) $num = equalDel($num);
                        $res *= $num;
                    }
                    return $res;        
                }
                function equalDel($example){
                    $nums = explode("/", $example); 
                    $res = $nums[0];
                    for($i = 1; $i < count($nums); $i++){
                        $res /= $nums[$i];
                    }
                    return $res;           
                }
                function equal($example){
                    // echo "$example я в основе <br>";
                    if (!str_contains($example, "(")) {
                        // echo "я в основе без скобок <br>";
                        return equalPlus($example); //если скобок больше нет   

                    }
                    while(str_contains($example, "(") or str_contains($example, ")")){
                        $brackStak = []; //стек скобок
                        for ($i = 0; $i < strlen($example); $i++) {
                            if ($example[$i] == "("){
                                // echo "$i самая первая открытая скобка<br>";
                                array_push($brackStak, $i); //отправляем в конец скобочку
                            }
                            if ($example[$i] == ")"){
                                $lastOpenBrack = array_pop($brackStak);
                                // echo "$i и $lastOpenBrack пара скобочек  <br>";
                                // echo substr($example,$lastOpenBrack+1, $i - $lastOpenBrack-1)." выражение внутри этих скоб<br>";
                                $exampleInBrackets = equal(substr($example,$lastOpenBrack+1, $i - $lastOpenBrack-1));
                                // var_dump($example);
                                // echo"я еще не заменил внутри скобок на резултат <br>";
                                // echo substr_replace($example,$exampleInBrackets,$lastOpenBrack, $i - $lastOpenBrack + 1). " тут прикол<br>";
                                $example = substr_replace($example,$exampleInBrackets,$lastOpenBrack, $i - $lastOpenBrack + 1);
                                // var_dump($example);
                                // echo"я заменил внутри скобок на резултат <br>";
                                break;
                            };
                        }
                    }
                    return equalPlus($example);
                }
                // echo "hello from backend";
                echo equal($_POST["res"]);           
            ?>