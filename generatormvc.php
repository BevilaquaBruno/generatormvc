<?php
    // $agrv is all the paramenters
    $temp_dir = $_SERVER['PHP_SELF'];
    $arr_dir = explode('\\',$temp_dir);
    $my_dir = $arr_dir[0];
    for ($i = 1; $i < count($arr_dir) - 1; $i++){
        $my_dir .= '\\'.$arr_dir[$i];
    }
    $dir = getcwd();
	$func = (isset($argv[1]))? $argv[1] : null;
	$type = (isset($argv[2]))? $argv[2] : null;
	$name = (isset($argv[3]))? $argv[3] : null;
	if(($func === null && $type === null && $name === null)|| $func === 'help'){
	    echo("comand: generatormvc <function> <type> <name>");
	    exit();
    }

	if($func === null || $type === null || $name === null){
		echo('Error, Invalid parameter');
		exit();
	}

	switch($func){
		case 'create':
            switch($type){
                case 'mvc':
                    $content = file_get_contents($my_dir.'\base\controllers\controllerName.php');
                    $trans = array("name" => strtolower($name), "Name" => ucfirst($name));
                    $content_ready = strtr($content, $trans);
                    file_put_contents($dir.'\app\controllers\controller'.ucfirst($name).'.php',$content_ready);

                    $content = file_get_contents($my_dir.'\base\models\modelName.php');
                    $trans = array("name" => strtolower($name), "Name" => ucfirst($name));
                    $content_ready = strtr($content, $trans);
                    file_put_contents($dir.'\app\models\model'.ucfirst($name).'.php',$content_ready);

                    if (!is_dir($dir.'\app\views\\'.strtolower($name))) {
                        mkdir($dir.'\app\views\\'.strtolower($name));
                    }

                    $content = file_get_contents($my_dir.'\base\views\name\name.html');
                    $trans = array("name" => strtolower($name), "Name" => ucfirst($name));
                    $content_ready = strtr($content, $trans);
                    file_put_contents($dir.'\app\views\\'.strtolower($name).'\\'.strtolower($name).'.html',$content_ready);

                    $content = file_get_contents($my_dir.'\base\views\name\name.js');
                    $trans = array("name" => strtolower($name), "Name" => ucfirst($name));
                    $content_ready = strtr($content, $trans);
                    file_put_contents($dir.'\app\views\\'.strtolower($name).'\\'.strtolower($name).'.js',$content_ready);

                    $content = file_get_contents($my_dir.'\base\views\name\name.css');
                    $trans = array("name" => strtolower($name), "Name" => ucfirst($name));
                    $content_ready = strtr($content, $trans);
                    file_put_contents($dir.'\app\views\\'.strtolower($name).'\\'.strtolower($name).'.css',$content_ready);

                    echo('Archives created !');
                    break;
                case 'controller':
                    $content = file_get_contents($my_dir.'\base\controllers\controllerName.php');
                    $trans = array("name" => strtolower($name), "Name" => ucfirst($name));
                    $content_ready = strtr($content, $trans);
                    file_put_contents($dir.'\app\controllers\controller'.ucfirst($name).'.php',$content_ready);
                    echo('Archives created !');
                    break;
                case 'model':
                    $content = file_get_contents($my_dir.'\base\models\modelName.php');
                    $trans = array("name" => strtolower($name), "Name" => ucfirst($name));
                    $content_ready = strtr($content, $trans);
                    file_put_contents($dir.'\app\models\model'.ucfirst($name).'.php',$content_ready);
                    echo('Archives created !');
                    break;
                case 'view':
                    if (!is_dir($dir.'\app\views\\'.strtolower($name))) {
                        mkdir($dir.'\app\views\\'.strtolower($name));
                    }
                    $content = file_get_contents($my_dir.'\base\views\name\name.html');
                    $trans = array("name" => strtolower($name), "Name" => ucfirst($name));
                    $content_ready = strtr($content, $trans);
                    file_put_contents($dir.'\app\views\\'.strtolower($name).'\\'.strtolower($name).'.html',$content_ready);

                    $content = file_get_contents($my_dir.'\base\views\name\name.js');
                    $trans = array("name" => strtolower($name), "Name" => ucfirst($name));
                    $content_ready = strtr($content, $trans);
                    file_put_contents($dir.'\app\views\\'.strtolower($name).'\\'.strtolower($name).'.js',$content_ready);

                    $content = file_get_contents($my_dir.'\base\views\name\name.css');
                    $trans = array("name" => strtolower($name), "Name" => ucfirst($name));
                    $content_ready = strtr($content, $trans);
                    file_put_contents($dir.'\app\views\\'.strtolower($name).'\\'.strtolower($name).'.css',$content_ready);

                    echo('Archives created !');
                    break;
                default:
                    echo('Error, command invalid');
                    break;
            }
			break;
		case 'delete':
		    switch ($type){
                case 'mvc':
                    try{
                        unlink($dir.'\app\controllers\controller'.ucfirst($name).'.php');
                        unlink($dir.'\app\models\model'.ucfirst($name).'.php');
                        unlink($dir.'\app\views\\'.strtolower($name).'\\'.strtolower($name).'.html');
                        unlink($dir.'\app\views\\'.strtolower($name).'\\'.strtolower($name).'.css');
                        unlink($dir.'\app\views\\'.strtolower($name).'\\'.strtolower($name).'.js');
                        rmdir($dir.'\app\views\\'.strtolower($name));
                        echo('Archives deleted !');
                    } catch (Exception $e){
                        echo($e);
                    }
                    break;
                case 'controller':
                    try {
                        if (file_exists($dir.'\app\controllers\controller'.ucfirst($name).'.php')) {
                            unlink($dir.'\app\controllers\controller'.ucfirst($name).'.php');
                            echo('Archive deleted !');
                        } else {
                            throw new Exception('Warning: File does not exists');
                        }
                    } catch (Exception $e){
                        echo ($e);
                    }
                    break;
                case 'model':
                    try{
                        if(file_exists($dir.'\app\models\model'.ucfirst($name).'.php')){
                            unlink($dir.'\app\models\model'.ucfirst($name).'.php');
                            echo('Archive deleted !');
                        }else{
                            throw new Exception('Warning: File does not exists');
                        }
                    } catch (Exception $e){
                        echo($e);
                    }
                    break;
                case 'view':
                    try{
                        unlink($dir.'\app\views\\'.strtolower($name).'\\'.strtolower($name).'.html');
                        unlink($dir.'\app\views\\'.strtolower($name).'\\'.strtolower($name).'.css');
                        unlink($dir.'\app\views\\'.strtolower($name).'\\'.strtolower($name).'.js');
                        rmdir($dir.'\app\views\\'.strtolower($name));
                        echo('Archives deleted !');
                    } catch (Exception $e){
                        echo($e);
                    }
                    break;
                default:
                    echo "Error: invalid command";
                    break;
            }
			break;
		default:
			echo('Error: invalid command');
			break;
	}
?>
