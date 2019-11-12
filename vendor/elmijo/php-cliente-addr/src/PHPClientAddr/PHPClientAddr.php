<?php
namespace PHPTools\PHPClientAddr;

/**
 * Clas eque permite obtener la Ip y HostName del cliente
 */
class PHPClientAddr
{
    /**
     * Arreglod e expreciones regulres para validar una IP privada.
     * @var array
     */
    private $private_ip = array(
        '/^0\./','/^127\.0\.0\.1/',
        '/^192\.168\..*/','/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
        '/^10\..*/'
    );

    /**
     * Ip del cliente.
     * @var string
     */
    public $ip;

    /**
     * Hostname del Cliente.
     * @var string
     */
    public $hostname;

    /**
     * Arreglo de parametros del servidor.
     * @var array
     */
    private $server;

    /**
     * Arreglo de parametros del entorno.
     * @var array
     */
    private $env;

    public function __construct()
    {
        $this->server = $_SERVER;

        $this->env = $_ENV;

        $this->ip = $this->get_remode_addr();

        $this->get_ip_forwarded();

        $this->hostname = $this->get_remote_hostname();
    }

    /**
     * Permite obtener el hostname de la IP
     * @return string
     */
    private function get_remote_hostname()
    {
        $hostname = NULL;

        if(!is_null($this->ip))
        {
            $hostname = gethostbyaddr($this->ip);   
        }
        
        return $hostname;
    }

    /**
     * Permite obtener la IP proveniente de un servidor proxy
     * @return void
     */
    private function get_ip_forwarded()
    {
        if(!!$this->is_http_x_forwarded_for())
        {
            $entries = $this->get_http_x_forwarded_for_entities();

            $this->ip = $this->get_x_forwarded_ip($entries);          
        }
    }

    /**
     * Permite saber si la peticion proviene de un servidor proxy.
     * @return boolean
     */
    private function is_http_x_forwarded_for()
    {
        return !!isset($this->server['HTTP_X_FORWARDED_FOR'])&&$this->server['HTTP_X_FORWARDED_FOR']!=''; 
    }

    /**
     * Permite obtener todas las entidades enviadas por un servidor proxy. 
     * @return array
     */
    private function get_http_x_forwarded_for_entities()
    {
        $entries = preg_split('[, ]', $this->server['HTTP_X_FORWARDED_FOR']);
        reset($entries);
        return $entries;
    }

    /**
     * Permite obtener la IP real proveniente de un servidor proxy.
     * @param  array $entries Arreglo de entidades enviadas por un servidor proxy
     * @return string
     */
    private function get_x_forwarded_ip($entries)
    {
        $ip = $this->ip;

        while (list(, $entry) = each($entries))
        {
            $entry = trim($entry);
            if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list))
            {
                $found_ip = preg_replace( $this->private_ip, $ip, $ip_list[1]);
     
                if ($ip != $found_ip)
                {
                    $ip = $found_ip;
                    break;
                }
            }
        }

        return $ip;
    }

    /**
     * Permite obtener la IP real del cliente.
     * @return string
     */
    private function get_remode_addr()
    {
        $ip = NULL;

        if(PHP_SAPI=='cli')
        {
            $ip = getHostByName(getHostName());
        }
        else if(!!isset($this->server['REMOTE_ADDR'])&&!empty($this->server['REMOTE_ADDR']))
        {
            $ip = $this->server['REMOTE_ADDR'];
        }
        else if(!!isset($this->env['REMOTE_ADDR'])&&!empty($this->env['REMOTE_ADDR']))
        {
            $ip = $this->env['REMOTE_ADDR'];
        }

        return $ip;
    }
}