<?php 
    namespace App\router;

    class Router{
        static $routes = [];
        static function get($path, $callback){
            static::$routes['get'][$path] = $callback;
        }
        static function post($path, $callback){
            static::$routes['post'][$path] = $callback;
        }

        function getPath(){
            $path = $_SERVER['REQUEST_URI'] ?? '/';
            $path = str_replace('','/', $path);
            $position = strpos($path,'?');

            if($position){
                $path = substr($path,0, $position);
            }

            return $path;
        }

        function getMethod(){   
            return strtolower($_SERVER['REQUEST_METHOD']);
        }

        function resolve(){
            $path = $this->getPath();
            $method = $this->getMethod();

            $callback = static::$routes[$method][$path] ?? false;

            if($callback === false){
                require_once '404Page.php';
                
                exit;
            }

            if(is_callable($callback)){
                return $callback;
            }

            if(is_array($callback)){

                $class = new $callback[0];
                $action = $callback[1];

                if ($action === 'view' && preg_match('/\/(\d+)$/', $path, $matches)) {
                    $id = $matches[1];
                    return call_user_func([$class, $action], $id);
                }

                return call_user_func(([$class, $action]), []);
            }
        }
    }
?>