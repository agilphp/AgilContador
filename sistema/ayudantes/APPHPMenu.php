<?php

/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * @category   
 * @package    sistema/ayudantes
 * @copyright  Copyright (c) 2006 - 2014 webcol.net (http://www.webcol.net/calima)
 * @license	https://github.com/webcol/Calima/blob/master/LICENSE	MIT
 * @version	##BETA 1.0##, ##2014 - 2015##
 * <http://www.AgilPhp.com>.
 */

namespace sistema\ayudantes;

class APPHPMenu
{
    
    
    function menu_ul($sel = 'inicio')
   {
        $items = array(
            'inicio' => array(
                'id'     => 'inicio',
                'title'  => 'Home',
                'link'   => ''
            ),
            'about' => array(
                'id'     => 'about',
                'title'  => 'About Us',
                'link'   => 'about'
            ),
            'services' => array(
                'id'     => 'services',
                'title'  => 'Our Services',
                'link'   => 'services'
            ),
            'contact' => array(
                'title'  => 'Contact Us',
                'link'   => 'contact'
            )
        );
        
        $menu = '<ul class="inline" >'.  PHP_EOL;
        foreach($items as $item)
        {
            $current = (in_array($sel, $item)) ? ' class="current"' : '';
            $id = (!empty($item['id'])) ? ' id="'.$item['id'].'"' : '';
            $menu .= '<li'.$current.'><a href="'.$item['link'].'"'.$id.'>'.$item['title'].'</a></li>'."\n";
        }
        $menu .= '</ul>'. PHP_EOL . PHP_EOL;
        return $menu;
    }
    
    function menu_p($sel = 'inicio', $separador = '')
   {
        //$CI =& get_instance();
        $items = array(
            'inicio' => array(
                'id'     => 'inicio',
                'title'  => 'Home',
                'link'   => ''
            ),
            'about' => array(
                'id'     => 'about',
                'title'  => 'About Us',
                'link'   => 'about'
            ),
            'services' => array(
                'id'     => 'services',
                'title'  => 'Our Services',
                'link'   => 'services'
            ),
            'contact' => array(
                'title'  => 'Contact Us',
                'link'   => 'contact'
            )
        );

        $count = count($items);
        $i = 0;
        $menu =  PHP_EOL .'<p class="bottom_nav">';
        foreach($items as $item)
        {
            $current = (in_array($sel, $item)) ? ' class="current"' : '';
            $id = (!empty($item['id'])) ? ' id="'.$item['id'].'"' : '';
            $menu .= '<a'.$current.' href="'.$item['link'].'"'.$id.'>'.$item['title'].'</a>';
            $i++;
            if($count != $i)
            {
                $menu .= ' '.$separador.' ';
            }
        }
        $menu .= '</p>'. PHP_EOL ;
        return $menu;
    }
    
    
}