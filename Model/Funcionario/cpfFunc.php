<?php

function ValidaCpf($cpf)
    {
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    $d1= 0;
    $d2 = 0;

    for($i=0,$x=10;$i<=8;$i++,$x--)
    {
        $d1 += $cpf[$i] * $x;
    }
    for($i=0,$x=11;$i<=9;$i++,$x--)
    {
        $d2 += $cpf[$i] * $x;

        if(str_repeat($i,11) == $cpf)
        {
            die('NÃO REPITA OS NÚMEROS');
        }
    }
    $result1 = (($d1%11) < 2) ? 0 : 11-($d1%11);
    $result2 = (($d2%11) < 2) ? 0 : 11-($d2%11);

    if($result1 != $cpf[9] || $result2 != $cpf[10])
    {
        return false;
    }else
    {
        return true;
    }
}

?>