<?php

$ruta = !empty($_GET['url']) ? $_GET ['url'] : "Home/index";
$array = explode("/",$ruta);

var_dump($array);

$controllers= $array[0];
$metodo = "index";
$parametro = "";

if (!empty($array[1]))
{
    if (!empty($array[1] !=''))
    {
        $metodo = $array[1];
    }
}

if (!empty($array[2]))
{
    if (!empty($array[2] !=''))
    {
        for ($i =2; $i < count($array); $i++){
            $parametro = $array[$i].",";
        }
        echo $parametro = trim($parametro, ",");
    }
}

require_once 'Config/App/Autoload.php';

$diController ='UsuarioModel';
if (file_exists($diController)){
    require_once  $diController;
    $controllers = new $controllers();
    if (method_exists($controllers,$metodo)){
        $controllers->$metodo($parametro);
    }else{
        echo "No existe el metodo";
    }
}else{
    echo 'No existe controlador';
}
//parametrovar_dump($array);




?>


