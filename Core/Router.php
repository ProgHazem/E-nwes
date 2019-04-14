<?php
namespace Core;

class Router {

    /** 
     * Associative array of all the registered routs
     * act as a routing table for the app
     * @var array
    */
    protected $routes = [];
    /**
     * the parameters of the mached route
     * @var array
     */
    protected $params = [];

    /**
     * Adds a rout to the routing table after converting it to a regular expression
     * @param string $route the route we want to register
     * @param array $params an array specifying the controller, action ..etc
     * @return void
     */

    public function add($route, $params = []){
        // Converting a route to a regular expression
        //escape forward slashes
        $route = preg_replace('/\//', '\\/', $route);
        //convert {variable-name} to a named capturing group (?P<variable-name>[a-z-]+)
        $route = preg_replace('/\{([a-z-]+)\}/', '(?P<\1>[a-z-]+)', $route);
        //convert {variable-name:custom-regex} to a named capturing group (?P<variable-name>custom-regex).
        $route = preg_replace('/\{([a-z-]+):([^\}]+)\}/', '(?P<\1>\2+)', $route);
        //add start and end delimiters and case insestive falg
        $route = "/^" . $route . "$/i";
        $this->routes[$route] = $params;
    }

    /**
     * @return array an array of all routes
     */

    public function getRoutes(){
        return $this->routes;
    }
    /**
     * find a match for a given url in the routing table and puts
     * the matched url parameters in the params instance variable
     * @param string $url the requested url
     * @return boolean true if found a match, false otherwise
     */

     public function match($url){
         foreach($this->routes as $route => $params){
            $matches = [];
            if(preg_match($route, $url, $matches)){
                foreach($matches as $key => $match){
                    if(is_string($key)){
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
         }
         return false;
     }

     /**
      * gets the params instance variabsle
      * @return array of the paramrers
      */

      public function getParams(){
          return $this->params;
      }

      /**
       * dispatches the proper controller and action from the given url if it matches 
       * to the route table
       * @param str $url 
       * @return void 
       */
      public function dispatch($url){
          $url = $this->removeQueryStringVariables($url);

          if(!static::endsWith($url, "/")){
            $url .= "/";
          }
          if($this->match($url)){
              $controller = $this->getNamespace() . $this->converToStudlyCaps($this->params['controller']) . "Controller";
              if(class_exists($controller)){
                  $controller_obj = new $controller($this->params);
                  //if an action is given call it if it's callable
                  $action = isset($this->params['action']) ? $this->converToCamelCase($this->params['action']) : "index";
                  if(is_callable([$controller_obj, $action])){
                      $controller_obj->$action();
                  }
                  else echo "method {$action} in controller {$controller} is not found";
              }
              else echo "Controller {$controller} is not found";
          }
          else echo "URL {$url} is not found";
      }

      /**
       * converts a string to StudlyCaps form.
       * @param str string to be converted
       * @return str converted string
       */
      public function converToStudlyCaps($str){
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $str)));
      }

      /**
       * converts a string to camelCase form.
       * @param str string to be converted
       * @return str converted string
       */
      public function converToCamelCase($str){
        return lcfirst($this->converToStudlyCaps($str));
      }

    /**
     * Remove the query string variables from the URL (if any). As the full
     * query string is used for the route, any variables at the end will need
     * to be removed before the route is matched to the routing table. For
     * example:
     *
     *   URL                           $_SERVER['QUERY_STRING']  Route
     *   -------------------------------------------------------------------
     *   localhost                     ''                        ''
     *   localhost/?                   ''                        ''
     *   localhost/?page=1             page=1                    ''
     *   localhost/posts?page=1        posts&page=1              posts
     *   localhost/posts/index         posts/index               posts/index
     *   localhost/posts/index?page=1  posts/index&page=1        posts/index
     *
     * A URL of the format localhost/?page (one variable name, no value) won't
     * work however. (NB. The .htaccess file converts the first ? to a & when
     * it's passed through to the $_SERVER variable).
     *
     * @param string $url The full URL
     *
     * @return string The URL with the query string variables removed
     */
    protected function removeQueryStringVariables($url){
        if($url != ''){
            $parts = explode('&', $url, 2);
            if(strpos($parts[0], '=') === false)
                $url = $parts[0];
            else
                $url = '';
        }
        return $url;
    }

        /**
     * Returns the full namespace of a url
     * @return str the full namespace
     */
    protected function getNamespace(){
        $namespace = ROOT_CONTROLLERS_NS;
        if(array_key_exists("namespace", $this->params))
            $namespace .= $this->params["namespace"] . "\\";
        return $namespace;
    }
    /**
     * checks if a string ends with a specific string
     * @param str $haystack thestring we want to check against
     * @param str $needls the string we want to match
     * @return boolean
     */
    protected static function endsWith($haystack, $needle){
        $length = strlen($needle);
        return (substr($haystack, -$length, $length) === $needle);
    }

}


?>