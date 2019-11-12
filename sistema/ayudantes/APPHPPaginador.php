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

// se agradece a ArrayZone por el aporte de esta clase

/**
 * @name paginator for Kernel Web
 * @version 1.1
 * @copyright ArrayZone 2014
 * @license AZPL or later; see License.txt or http://arrayzone.com/license
 * @category plugin
 * 
 * Description: This script do a pagination to you web very easy and flexible
 * It paginate VIA $_GET[], and if you specify "$cur_page" and edit some of code, useing $_POST[] too.
 * 
 * NOTICE: If you are using KernelWeb, this script NOT FILTER GET petition because it will not be executed 
 * (you can pass the most critical GETs manually if you like)
 */
 
 //Esta clase fue editada por programadores de AP con la aprobacion de Ruben Arroyo

namespace sistema\ayudantes;

class AP_PHPPaginator {
	/*
	 * MAIN Settings (required)
	 */
	
	/**
	 * 
	 * @total_records string Total of records to paginate (specify manually)
	 */
	public $total_records = 0;
	
	
	/*
	 * MAIN Settings (optional)
	 */
	
	/**
	 * @style string  Specify Class to define
	 * @tutorial If is specified, it would create <div class="style"> otherwise it not create div
	 */
	public $style = '';
	
	/**
	 * @records number Max records to show on every page
	 */
	public $records = 20;
	
	/** 
	 * @max_links number Maxium quantity of links to show before and after actual page
	 * @example If current page is 4 and MAX is 2, it show "2 3 4 5 6"
	 */
	public $max_links = 3;
	
	/**
	 * @get_name string Specify INDEX of GET that is used
	 * 
	 * It will load automatically the current page. 
	 * If you like, you can specify manually in "$cur_page" 
	 * (if you like filter previously or the script will not load directly from URL)  
	 */
	public $get_name = 'pag';
	
	/**
	 * @max_records number Specify maxium quantity of registers will be loaded. "0" disable this
	 */
	public $max_records = 0;
	
	
	/**
	 * @recicle_url boolean If is true, modify directly tue current URL to put the pagination (if not exist any, add &pag= to the end)
	 * If is true, $url_start and $url_end will be ignored
	 */
	public $recicle_url = true;
	
	/**
	 * @specific_get array Specify what GETs (and order) you like recicle.
	 * Set array() to ALL (not recomended to avoid atacks DoS)  
	 * Set '' for any
	 * @example array('section', 'pag', 'subsection');
	 * If you don't need 'pag' in the midle, you can ignore it.
	 * WARNING: If the order is very important, use the pag at THE END of url   
	 */
	public $specific_get = '';
	
	/**
	 * @url_start string specify how the URL of every link start. IF $recicle_url is TRUE, this will be ignored 
	 * @example If you use MOD_REWRITE or JAVASCRIPT, you can put "http://mywebsite.com/subdir/pag-" or "javascript:paginate("
	 * 
	 * This value will auto completed if you leave empty 
	 */
	public $url_start = '';
	
	/**
	 * @url_end string specify how the URL of every link ends. IF $recicle_url is TRUE, this will be ignored
	 * @example If you use MOD_REWRITE or JAVASCRIPT, you can put "/" or ");"
	 * 
	 * This value will auto completed if you leave empty
	 */
	public $url_end = '';
	
	
	
	/*
	 * Design settings
	 */
	
	// Icons to show "First | Previous | Next | Last"
	//& laquo; = � | & lt; = <
    //& raquo; = � | & gt; = >
    // Leave empty '' to not show or ' ' to show empty
	public $first = '[&lt;&lt;]';
	public $previous = '[&lt;]';
	public $next = '[&gt;]';
	public $last = '[&gt;&gt;]';
	
	
	/*
	 * RETURNS FROM PAGINATOR and internal use
	 */
	// Return current page (auto loaded)
	public $cur_page;
	
	// original page loaded
	// it contains the real value in GET (ex: -1, 5...) to compare later
	public $original_page;
	
	// Return total pages
	public $total_pages;
	
	// LIMIT_START / Specify the first record of the page (ex, in page 3 and 20 records is record num 40)
	// Limit max is $records
	public $first_record;
	
	// Specify limit to put directly in mysql query ( LIMIT 0,20 )
	public $limit;
	
	
/*
 * Functions
 */
	/**
	 * @name paginate
	 * @tutorial This function is called directly to load all params
	 * @example $pag->paginate();
	 */
	public function paginate() {
		$this->get(); // Filtering and obtaining variables
		$this->calculate(); // Calc current page
		$this->prepareUrl(); // Preparing URL to show
	}
	
	/**
	 * @name show
	 * @tutorial Show links of pagination
	 * @example $pag->show();
	 */
	public function show() {
		// Prepare string with links
		// Reading here variables is faster than "$this->var"
		$cur_page = $this->cur_page; 
		$url_start = $this->url_start;
		$url_end = $this->url_end;
		
		$start = $cur_page - $this->max_links;
		$end = $cur_page + $this->max_links;
		
		if ($start < 1) $start = 1;
		if ($end > $this->total_pages) $end = $this->total_pages;
		
		// Showing all clickable pages (create div if class is defined)
		if ($this->style != '') $r = '<div class="'.$this->style.'">';
		else $r = '';
		
		
		// First / previous
		if ($this->cur_page > 1) {
			if ($this->first != '') $r .= '<a class="first" href="' . $url_start . '1' . $url_end . '">'.$this->first.'</a> ';
			if ($this->previous != '') $r .= '<a class="previous" href="' . $url_start . ($cur_page - 1) . $url_end . '">'.$this->previous.'</a> ';
		}
		
		// You can optimize this separating BEFORE and AFTER current page in two for (to avoid load "if" in each loop)
		// but it would be difficult on changes
		for ($n=$start; $n<=$end; $n++) {
			if ($n != $cur_page) $r .= '<a class="link" href="'. $url_start . $n . $url_end . '">'.$n.'</a> ';
			else $r .= '<a class="current">'.$n.'</a> ';
		}
		
		// next / last
		if ($this->cur_page < $this->total_pages) {
			if ($this->next != '') $r .= '<a class="next" href="' . $url_start . ($cur_page + 1) . $url_end . '">'.$this->next.'</a> ';
			if ($this->last != '') $r .= '<a class="last" href="' . $url_start . $this->total_pages . $url_end .'">'.$this->last.'</a> ';
		}
		
		// End div (if exist)
		if ($this->style != '') $r .= '</div>';
		
		return $r;
	}
	
	
	/**
	 * @name get
	 * @tutorial This function is autoloaded, it get the current page and filter number to avoid hackers
	 */	 
	private function get() {
		if (!is_numeric($this->cur_page)) {
			// First get the actual page, by default 1
			$cur_page = isset($_GET[$this->get_name]) ? $_GET[$this->get_name] : 1;
			$this->original_page = $cur_page;
			
			// Filter values
			if (!is_numeric($cur_page) or $cur_page < 1) $cur_page = 1;
			
			// Set new filtered values (is faster this method)
			$this->cur_page = $cur_page;
		} else {
			$this->original_page = $cur_page;
		}
	}
	
	/**
	 * @name calculate
	 * @tutorial Do all calcs about current and last page
	 */
	private function calculate() {
		// This vars are very used, so is faster do this
		$max_records = $this->max_records;
		$records = $this->records;
		
		// Force maxium records loaded (only if is specified by user)
		if ($max_records  > 0 and $max_records  > $total_records) 
			$this->total_records = $max_records;
		
		// Calculate total pages that have
		$total_pages = ceil($this->total_records / $records);
		
		// Is correct current page?
		if ($this->cur_page > $total_pages) $this->cur_page = $total_pages;
		$this->total_pages = $total_pages;
		
		// Specify LIMIT to do a query
		$start = ($this->cur_page - 1) * $records;
		
		// Forcing maixum records to show (only if is specified by user)
		if ($max_records > 0 and $records > $max_records) {
			$records = $max_records;
			$this->records = $records;
		}
			
		
		// Saving changes
		$this->first_record = $start;
		$this->limit = ' LIMIT '.$start.','.$records.' ';
	}
	
	/**
	 * @name prepareUrl
	 * @tutorial It prepare the url to show in each link, specified by user
	 * If recicle URL is false, it will auto load $url_start and $url_end
	 */
	private function prepareUrl() {
		// This script use three methods to recicle GET depending user selection
		if ($this->recicle_url) {
			// gonna to recicle the URL
			$gets = $this->specific_get;
			$get_name = $this->get_name;
			
			// If user specified an array
			if (is_array($gets)) {
				if (empty($gets)) {
					// And is empty, we have to Recicle ALL GET
					// To know that page needs to be replaced we will use the "original_page" (the real get)
					// Cortamos "pag=2" para obtener lo que va antes y despues, as� poder modificar directamente ese pag=2 por la pagina actual
					$query_string = explode($this->get_name.'='.$this->original_page, $_SERVER['QUERY_STRING']);
					
					// How start the new URL? To know it, we need to see the last character from current string
					if (!in_array(substr($query_string[0], -1), array('?', '&'))) {
						// Current string haven't any at end and it isn't "&" or "?" ?
						// If initial string have one character at least it means that not is the first index 
						if (isset($query_string[0][0])) $this->url_start = '?'.$query_string[0].'&';
						else $this->url_start = '?'.$query_string[0];
					} else {
						// Current string already have ? or &,
						$this->url_start = '?'.$query_string[0];
					}
					
					$this->url_end = isset($query_string[1]) ? $query_string[1] : '';
				} else {
					// Only specifics GET, reading all and finally leave in the same order
					// With this we can clean all GET that we don't need (like hacker attempts)
					$tmp = '';
					$tmp_start = ''; // If we found the current page, we move here all $tmp
					foreach ($gets as $get) {
						if ($get != $get_name) {
							// Trying to get the GET
							if (isset($_GET[$get])) $tmp .= $get.'='.$_GET[$get].'&';
						} else {
							// Pour the $tmp content to $tmp_start
							if ($tmp_start == '') $tmp_start .= '?';
							$tmp_start .= $tmp;
							$tmp = '';
						}
					}
					
					// Finally, write the changes in the object
					if ($tmp_start != '') {
						// If have start and end
						$this->url_start = $tmp_start;
						$this->url_end = $tmp;
					}
					else $this->url_start = '?'.$tmp;
				}
			} else{
				// Non recicle
				$this->url_start = '?';
				$this->url_end = ''; 
			}
			
			// Add the pagination
			$this->url_start .= $this->get_name.'=';
		}
	}
}
?>