<?php

    require_once "vendor/autoload.php";

    $ast = json_decode(file_get_contents("ast.txt"), 1);

    $a = new \PL\VirtualMachine\VM();

    $a->addRule("Const_Integer", function($vm, $data){
        return $data;
    });

    $a->addRule("Expr_Plus", function($vm, $data){
        return ($vm->real($data['left']) + $vm->real($data['right']));
    });

    $a->addRule("Expr_Minus", function($vm, $data){
        return ($vm->real($data['left']) - $vm->real($data['right']));
    });

    var_export($a->run($ast));