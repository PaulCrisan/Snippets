index

spl_autoload_register(function($class){
  $root = dirname(__DIR__);
  $file = $root . '/' .'public_html/'. str_replace('\\', '/' , $class) . '.php';
  if(is_readable($file)){
    require $root . '/'.'public_html/' . str_replace('\\', '/', $class) . '.php';
  }
});

$url = $_SERVER['QUERY_STRING'];


$router = new Router();
$router->add('{controller}/{action}');
$router->assign($url);