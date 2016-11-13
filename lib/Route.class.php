<?php

namespace src\lib;
/**
 * Classe de routing basico
 *
 * @param url - get
 * @return array
 */

class Route
{
    protected $class;
    protected $method;
    protected $value;

    /**
     * tratativa da url
 	 * @method page_request
 	 * @param url
 	 * @return array methods
	 */

    public function __construct()
    {
        $this->class  = $class;
        $this->method = $method;
        $this->value  = $value;
    }

	public function request()
    {
        $http = substr($_SERVER['REQUEST_URI'], 1);
        $res = ($http !== false)       ?
                self::exploder($http)  :
                "home";
        $this->class  = $res[0];
        $this->method = $res[1];
        $this->value  = $res[2];
        return array(
            'class'  => $this->class  ,
            'method' => $this->method ,
            'value'  => $this->value
        );
    }
    /**
 	 * explode so para transformar
     *      a url em array
	 */
    public function exploder($http)
    {
        $res = array_filter(
                array_map('trim',
                    explode(
                        '/', $http
                )));
        return $res;
    }

}
