<?PHP
require 'lib.php';

global $degree; //số mũ
global $num_of_terms; //counts of the array

display_html_head("Algebra Expression");
function display_expression($degree){
    for (; ; ){
        $before_tested = generate_expression($degree);
        // print_r ($before_tested);
        $m = meets_requirements($before_tested,$degree);
        // echo $m ? "True" : "False";
        if ($m){
            print_expression($before_tested);
            break;
        } 
    }
}
display_expression(2);
display_html_foot();

function getRandomNumber($min, $max, $is_exclude_zero)
{
    for (; ; ) {
        $n = rand($min, $max);
        if ($n == 0 && $is_exclude_zero) {
                continue;
            }
        
        return $n;
    }
}

function generate_expression($degree)
{
    $terms = [];
    $num_of_terms = 2 * $degree + 3;
    

    // $Coefficient = getRandomNumber(-20, 20, True);
    // $Exponent = getRandomNumber(0, $degree, False);

    for($i = 0; $i < $num_of_terms; $i++)
    {
        $terms[$i][0] = getRandomNumber(-20, 20, True);
        $terms[$i][1] = getRandomNumber(0, $degree, False);
    }
    //print_r($terms);
    return $terms;
}
//echo generate_expression(3);
// echo generate_expression(2);

function meets_requirements($Array_terms,$degree){
    for($i=0; $i<=$degree; $i++){
        $counting = 0;
        for($j=0; $j<count($Array_terms); $j++){
            if($Array_terms[$j][1]==$i){
                $counting++;
            }            
        }
        if($counting < 2){
            return False;
        } 
    }
    return True;
}

// $variable1 = generate_expression(2);
// $bool_val = meets_requirements($variable1,2);
// echo $bool_val ? 'true' : 'false';

// if ($bool_val){
//     echo 'True';
// }   else {
//     echo "False";
// }

function print_expression($TDAT){
    $expression ="";

    for ($i = 0 ; $i < count($TDAT) ; $i++)
    {
        $coefficient = $TDAT[$i][0];
        $exponent = $TDAT[$i][1];

        if ($i == 0 && $coefficient > 0){
            $expression .= $coefficient; 
        } else {
            $expression .= ($coefficient >= 0 ? '+' : '-') . abs($coefficient);
        }

        if($coefficient == 1){
            $expression .= "";
        }

        if($exponent == 0){
            $expression .= "";
        } else if ($exponent ==1){
            $expression .= "x";
        } else {
            // $expression .= "$coefficient.x<sup>$exponent</sup>";
            $expression .= "x<sup>$exponent</sup>";

        }  
    }
    echo $expression;

    // for($i = 0 ; $i < count($TDAT) ; $i++){
    //     $expression .= $TDAT[i] * 'x<sup>$TDAT[1]<sup>';
    // }

}

// $variable2 = generate_expression(6);
// echo print_expression($variable2);

// echo '-x<sup>4</sup>';
?>