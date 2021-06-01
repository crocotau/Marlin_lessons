<?php
//class Router
//{
//    // массив для хранения соответствия url => функция
//    private static $routes = array();
//
//    // запрещаем создание и копирование статического объекта
//    private function __construct() {}
//    private function __clone() {}
//
//
//    // данный метод принимает шаблон url-адреса
//    // как шаблон регулярного выражения и связывает его
//    // с пользовательской функцией
//    public static function route($pattern, $callback)
//    {
//        // функция str_replace здесь нужна, для экранирования всех прямых слешей
//        // так как они используются в качестве маркеров регулярного выражения
//        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
//        self::$routes[$pattern] = $callback;
//    }
//
//
//    // данный метод проверяет запрошенный $url(адрес) на
//    // соответствие адресам, хранящимся в массиве $routes
//    public static function execute($url)
//    {
//        foreach (self::$routes as $pattern => $callback)
//        {
//            if (preg_match($pattern, $url, $params)) // сравнение идет через регулярное выражение
//            {
//                // соответствие найдено, поэтому удаляем первый элемент из массива $params
//                // который содержит всю найденную строку
//                array_shift($params);
//                return call_user_func_array($callback, array_values($params));
//            }
//        }
//    }
//}
class Router{
//    public $url = null, $path = [];
//    private function __construct(){
//
//    }



    public static function route($r_uri, $s_name){
        $q_string = $_SERVER['DOCUMENT_ROOT'].$_SERVER['SCRIPT_NAME'] = $s_name;
        $not_found = $_SERVER['DOCUMENT_ROOT'].'/'.'404.php';
        if ($r_uri == $_SERVER['REQUEST_URI'] && file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$s_name)){
            include $q_string;
            xdebug_var_dump($_SERVER);
            return true;
        }else{
//            var_dump($q_string);
            var_dump($r_uri == $_SERVER['REQUEST_URI']);die();
            include $not_found;
            xdebug_var_dump($_SERVER);
            return false;
        }

    }
}