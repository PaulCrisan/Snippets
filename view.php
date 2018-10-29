view 

<?

class View{

public static function render($view = null, $args = []){
    extract($args, EXTR_SKIP);
    $file = "home.html";
}