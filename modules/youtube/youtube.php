<?php

if (!defined('_PS_VERSION_'))
	exit;

class youtube extends Module
{
	private $_html = '';
	protected $configs = array('YOUTUBE_POSITION',
							   'YOUTUBE_WIDTH',
							   'YOUTUBE_HEIGHT',
							   'YOUTUBE_SHOW_RELATED',
							   'YOUTUBE_FORCE_HD');
    function __construct()
    {
        $this->name = 'youtube';
        $this->tab = 'Invertus';
        $this->version = '2.0';
        $this->module_key = 'e09f3d22be5d95590e89954a90dbcf9c';
        parent::__construct();
		
		$this->page = basename(__FILE__, '.php');
		$this->displayName = $this->l('Product videos');
        $this->description = $this->l('Youtube videos in product page');
	}
	
	function install()
	{
		if (!parent::install() OR
			!$this->registerHook('productFooter') OR
			!$this->registerHook('productTab') OR 
			!$this->registerHook('productTabContent'))
			return false;
		
		$sql = "
			CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."youtube` (
			  `id` int(5) NOT NULL AUTO_INCREMENT,
			  `id_product` int(5) NOT NULL,
			  `url` text COLLATE utf8_unicode_ci NOT NULL,
			  `position` int(3) NOT NULL DEFAULT '0',
			  `active` smallint(1) NOT NULL DEFAULT '1',
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
		
		if (!Db::getInstance()->Execute($sql)) return false;
		
		Configuration::updateValue('YOUTUBE_POSITION', 0);
		Configuration::updateValue('YOUTUBE_WIDTH', 560);
		Configuration::updateValue('YOUTUBE_HEIGHT', 315);
		Configuration::updateValue('YOUTUBE_SHOW_RELATED', 1);
		Configuration::updateValue('YOUTUBE_FORCE_HD', 0);
		
		return true;
	}
	
	function uninstall()
 	{	
		if (!parent::uninstall())
 	 		return false;
		
		Db::getInstance()->Execute('DROP TABLE IF EXISTS '._DB_PREFIX_.'youtube');
		
 	 	return true;
	}
	
	function getContent()
	{
		global $smarty, $cookie; 
		
		$full_address_no_t = 'http://' . $_SERVER['HTTP_HOST'] . __PS_BASE_URI__.substr($_SERVER['PHP_SELF'], strlen(__PS_BASE_URI__)).'?tab=AdminModules&configure='.Tools::getValue('configure').'&token='.Tools::getValue('token');	
		
		$smarty->assign('blue_title', $this->displayName);
		$smarty->assign('full_address_no_t', $full_address_no_t);
		
		$menu = (isset($_GET['menu'])) ? $_GET['menu'] : 1;
		$this->_html.='
				<style>
					#invertus_menu .active
					{
						font-weight: bold;
					}
				</style>
				
				<div id="invertus_menu">
					<span class="'.(($menu==1) ? 'active' : '').'">
						<img src="'._MODULE_DIR_.'youtube/youtube.gif" alt="'.$this->l('Manage videos').'" />
						<a href="'.$full_address_no_t.'&menu=1"/>'.$this->l('Manage videos').'</a>
					</span>
					|	
					<span class="'.(($menu==2) ? 'active' : '').'">
						<img src="'._MODULE_DIR_.'youtube/img/settings.png" alt="'.$this->l('Settings').'" />
						<a href="'.$full_address_no_t.'&menu=2"/>'.$this->l('Settings').'</a>
					</span>	
					|	
					<span class="'.(($menu==3) ? 'active' : '').'">
						<img src="'._MODULE_DIR_.'youtube/img/help.png" alt="'.$this->l('Help').'" />
						<a href="'.$full_address_no_t.'&menu=3"/>'.$this->l('Help').'</a>
					</span>			
				</div>
				<br/>';
		$smarty->assign('_path', $this->_path);
		switch ($menu)
		{
			case 1:
			default:
				$parents = $this->getParents(0);
				$smarty->assign(array('tree' => $this->categoriesTree(-1, $parents),
									  'products' => $this->getProductList(-1, 1),
									  'module_token' => sha1(_COOKIE_KEY_.$this->name)));
				$this->_html .= $this->display(__FILE__, 'tpl/manage.tpl');
				break;
			case 2: //settings
				$_POST['YOUTUBE_SHOW_RELATED'] = (isset($_POST['YOUTUBE_SHOW_RELATED'])) ? 1 : 0;
				$_POST['YOUTUBE_FORCE_HD'] = (isset($_POST['YOUTUBE_FORCE_HD'])) ? 1 : 0;
				
				if (isset($_POST['settings_update']))
				{
					foreach($_POST as $key => $value)
						if (in_array($key, $this->configs))
							Configuration::updateValue($key, (int)$value);
					$this->_html .= $this->displayConfirmation($this->l('Settings were successfully updated'));
				}
				
				$conf = $this->getSettings();
				$smarty->assign(array('configs' => $conf));
				$this->_html .= $this->display(__FILE__, '/tpl/settings.tpl');	
				break;
			case 3: //help
				case "help":
					global $smarty;
					$version = $url = '';
					$links = array();
					$tree = new DOMDocument();
					$url = 'http://www.invertus.lt/demo/invertus_modules.xml';
					if (@fopen($url, "r")) 
					{		
						$tree->load($url);
						$modules = $tree->getElementsByTagName('modules')->item(0)->getElementsByTagName('module');
						foreach($modules as $module)
						{
							if ($module->getAttribute('title') == $this->name)
							{
								$version = $module->getElementsByTagName('version')->item(0)->nodeValue;
								$url = $module->getElementsByTagName('url')->item(0)->nodeValue;
								
								$links_node = $module->getElementsByTagName('links');
								if ($links_node->length != 0)
								{
									$module_links = $links_node->item(0)->getElementsByTagName('link');
									foreach($module_links as $link)
										array_push($links, '<a href="'.$link->nodeValue.'" target="_blank">'.$link->getAttribute('title').'</a>');
								}
							}
						}
						
						$data = $tree->getElementsByTagName('modules')->item(0)->getElementsByTagName('help')->item(0)->getElementsByTagName('data');
						foreach($data as $row)
							array_push($links, $row->nodeValue);
					}
					$smarty->assign(array('links' => $links,
										  'version' => $version,
										  'url' => $url,
										  'current_version' => $this->version));
					$this->_html .= $this->display(__FILE__, 'tpl/help.tpl');
					break;			
		}
		return $this->_html;
	}
	
	private function getSettings()
	{
		$conf = array();
		
		foreach ($this->configs as $config)
			$conf[$config] = Configuration::get($config);
		return $conf;
	}
	
	private function getParents($selected = 0)
	{
		$parents = array();
		while(true)
		{
			$id_parent = Db::getInstance()->getValue('SELECT `id_parent` FROM '._DB_PREFIX_.'category WHERE id_category = "'.$selected.'"');
			if($id_parent)
			{
				$selected = $id_parent;
				$parents[] = $id_parent;
			}
			else break;
		}
		return $parents;
	}
	
	private function categoriesTree($select="", $parents = array(), $parent = -1, $depth = 0)
	{
		global $cookie;
		$res = Db::getInstance()->ExecuteS('SELECT * FROM '._DB_PREFIX_.'category WHERE id_parent = "'.$parent.'"');
		$num = count($res);
		$ret = "";
		if ($parent == -1) //all products
		{
			$product_count = Db::getInstance()->getValue('SELECT COUNT(`id_product`) FROM '._DB_PREFIX_.'product');
			$ret .= '<li class="open"><div rel="-1" class="category_select" style="cursor: pointer;font-weight: bold;">'.$this->l('All products').' ('.$product_count.')</div></li>';
			$ret .= $this->categoriesTree($select, $parents, 0, $depth);
		}
		if($num > 0)
		{
			$ret .= ($depth != 0) ? '<ul>' : '';
			for($i = 0; $i < $num; $i++)
			{
				$title = Db::getInstance()->getValue('SELECT `name` FROM '._DB_PREFIX_.'category_lang WHERE id_category="'. $res[$i]['id_category'] .'" AND id_lang = "'.intval($cookie->id_lang).'"');

				$product_count = Db::getInstance()->getValue('SELECT COUNT(`id_product`) 
															  FROM '._DB_PREFIX_.'category_product 
															  WHERE id_category = "'. intval($res[$i]['id_category']) .'"');																	
				if(in_array($res[$i]['id_category'], $parents))
					$ret .= '<li class="open">';
				else
					$ret .= '<li class="closed">';
				if($select == $res[$i]['id_category'])
					$ret .= '<div style="cursor: pointer; font-weight: bold;" class="category_select" rel="'.$res[$i]['id_category'].'">'. $title .' ('. $product_count .')</div>';
				else
					$ret .= '<div style="cursor: pointer;" class="category_select" rel="'.$res[$i]['id_category'].'">'. $title .' ('. $product_count .')</div>';
				$depth++;
				$ret .= $this->categoriesTree($select, $parents, $res[$i]['id_category'], $depth);
				$depth--;
				$ret .= '</li>';
			}
			$ret .= ($depth != 0) ? '</ul>' : '';
		}
		return $ret;
	}
	
	public function getProductList($id_category, $current_page, $search_val = '')
	{
		global $cookie;
		$limit_max = 10;
		$place = 0;
		$response = '';
		if(isset($_POST['id_product']) && !empty($_POST['id_product']))
		{
		
			$sql = 'SELECT DISTINCT cp.id_product
					FROM '._DB_PREFIX_.'category_product cp
					'.(($search_val) ? "LEFT JOIN "._DB_PREFIX_."product_lang pl ON (pl.id_product=cp.id_product AND pl.id_lang=".$cookie->id_lang.") " : ' ');
					
			if ($id_category > -1)
			{
				$sql .= 'WHERE cp.id_category = "'.$id_category.'" '.(($search_val) ? 'AND' : '');
			}
			elseif($search_val)
			{
				$sql .= 'WHERE';
			}
			if($search_val)
			{
				$sql .= " pl.`name` LIKE '%$search_val%'";
			}
					
			$products = Db::getInstance()->ExecuteS($sql);
			foreach($products AS $product) 
			{
				$place++;
				if($product['id_product'] == $_POST['id_product'])
					break;
			}
			if ($place <= $limit_max)
				$page = 1;
			elseif(($place % $limit_max) == 0) 
				$page = floor($place / $limit_max);
			else
				$page = floor($place / $limit_max) + 1;
		} 
		else 
		{
			if($current_page)
				$page = intval($current_page);
			else
				$page = 1;
		}

		$limit_start = ($limit_max * $page) - $limit_max;
		
		
		
		$sql = 'SELECT DISTINCT cp.id_product 
				FROM '._DB_PREFIX_.'category_product cp
				'.(($search_val) ? "LEFT JOIN "._DB_PREFIX_."product_lang pl ON (pl.id_product=cp.id_product AND pl.id_lang=".$cookie->id_lang.")" : '');
				
		if ($id_category > -1)
		{
			$sql .= 'WHERE cp.id_category = "'.$id_category.'" '.(($search_val) ? 'AND' : '');
		}
		elseif($search_val)
		{
			$sql .= 'WHERE';
		}
		if($search_val)
		{
			$sql .= " pl.`name` LIKE '%$search_val%'";
		}
		
		$sql .= ' LIMIT '.$limit_start.', '.$limit_max;
		
		$res = Db::getInstance()->ExecuteS($sql);
		
		$num = count($res);

		if($num > 0)
		{
			for($i = 0; $i < $num; $i++)
			{
				$product = new Product($res[$i]['id_product'], true, $cookie->id_lang);
				$lang_text = Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'product_lang WHERE id_product="'. $res[$i]['id_product'] .'" AND id_lang = "'.intval($cookie->id_lang).'"');
				$response .= '<tr class="product_selection" rel="'.$res[$i]['id_product'].'">
								<td class="center">'.$res[$i]['id_product'].'</td>
								<td><img src="'.$this->getImage($product, 'small') . '"/></td>
								<td>'.$lang_text['name'].'</td>
							  </tr>';
			}
			$response .= '<tr><td colspan="4" align="center">'.$this->pagination($id_category, $limit_max, $page, $search_val).'</td></tr>';
		} 
		else 
		{
			$response .= '<tr><td></td><td>'.$this->l('Empty').'</td></tr>';
		}

		return $response;
	}
	
	public function getImage($product, $size='home')
	{
		global $cookie;
		$context = Context::getContext();
		$cover = Image::getCover($product->id);
		return $context->link->getImageLink($product->link_rewrite, $cover['id_image'], 'small_default');

	}
	
	public function pagination($id_category, $max_in_page, $curent_page, $search_val)
	{
		global $cookie;
		$sql = 'SELECT COUNT(DISTINCT cp.`id_product`)
				FROM '._DB_PREFIX_.'category_product cp
				'.(($search_val) ? "LEFT JOIN "._DB_PREFIX_."product_lang pl ON (pl.id_product=cp.id_product AND pl.id_lang=".$cookie->id_lang.")" : '');
		
		if ($id_category > -1)
		{
			$sql .= 'WHERE cp.id_category = "'.$id_category.'" '.(($search_val) ? 'AND' : '');
		}
		elseif($search_val)
		{
			$sql .= 'WHERE';
		}
		if($search_val)
		{
			$sql .= " pl.`name` LIKE '%$search_val%'";
		}
		
		$in_cat = Db::getInstance()->getValue($sql);
		
		$html  = '<div class="y_pagination">';
		
		if ($in_cat <= $max_in_page)
			$num_of_pages = 1;
		elseif(($in_cat % $max_in_page) == 0) 
			$num_of_pages = $in_cat / $max_in_page;
		else
			$num_of_pages = $in_cat / $max_in_page + 1;
		
		if($curent_page > 1)
		{
			$back = $curent_page - 1;
			$html .= '<a style="cursor: pointer;" class="category_page_select" rel="'.$id_category.'" rel1="'.$back.'"><<</a>';
		}
		
		$next = $curent_page + 1;	

		$html .= ' | ';
		$num_of_pages_f = intval($num_of_pages);
		
		if($curent_page - 4 > 1)
			$html .= '<a style="cursor: pointer;" class="category_page_select" rel="'.$id_category.'" rel1="1">1</a> | ';
			
		if($curent_page - 5 > 1)
			$html .= '... | ';
			
		$firs_element = $curent_page - 4;
		
		if($firs_element < 1)
			$firs_element = 1;
			
		for($i = $firs_element; $i < $curent_page; $i++)
		{
			$html .= '<a style="cursor: pointer;" class="category_page_select" rel="'.$id_category.'" rel1="'.$i.'">'.$i.'</a> | ';
		}	
		
		$html .= $curent_page . ' | ';
		
		for($i = $curent_page + 1; $i < $curent_page + 5; $i++)
		{	
			if($i > $num_of_pages_f)
				break;
			$html .= '<a style="cursor: pointer;" class="category_page_select" rel="'.$id_category.'" rel1="'.$i.'">'.$i.'</a> | ';
		}
		
		if($curent_page + 5 < $num_of_pages_f)
			$html .= '... | ';
		
		if($curent_page + 4 < $num_of_pages_f)
			$html .= '<a style="cursor: pointer;" class="category_page_select" rel="'.$id_category.'" rel1="'.$num_of_pages_f.'">'.$num_of_pages_f.'</a> | ';
		
		if($curent_page < $num_of_pages_f)
		{
			$next = $curent_page + 1;
			$html .= '<a style="cursor: pointer;" class="category_page_select" rel="'.$id_category.'" rel1="'.$next.'">>></a>';
		}		
		
		$html .= '</div>';
		
		return $html;
	}
	
	public function getProductVideos($id_product)
	{
		$videos = Db::getInstance()->ExecuteS("SELECT `id`, `url`, `active`
											   FROM `"._DB_PREFIX_."youtube`
											   WHERE `id_product`='$id_product'
											   ORDER BY `position` ASC");
		
		if (!$videos) return Tools::jsonEncode(array('empty' => true));
		
		$return = '';
		foreach ($videos as $video)
		{
			$id_youtube = $this->getYoutubeIdFromUrl($video['url']);
			$info = $this->getYouTubeVideoInfo($id_youtube);
			$video['title'] = $info['title'];
			$video['cover'] = (isset($info['thumbnail_url'])) ? $info['thumbnail_url'] : $info['iurlsd'];
			$return .= $this->renderTableRow($video);
		}
		return Tools::jsonEncode(array('empty' => false, 'data' => $return));
	}
	
	private function renderTableRow($video)
	{
		return '<tr id="'.$video['id'].'">
					<td class="position showDragHandle center"></td>
					<td class="center"><img style="width:100%" src="'.$video['cover'].'"></td>
					<td>'.$video['title'].'</td>
					<td><a href="'.$video['url'].'" target="_blank">'.$video['url'].'</a></td>
					<td class="center"><img class="video_status" rel="'.$video['active'].'" src="../img/admin/'.(($video['active']) ? 'enabled' : 'disabled').'.gif"></td>
					<td class="center"><img class="video_delete" src="../img/admin/delete.gif"></td>
				</tr>';
	}
	
	public function addVideo($id_product, $url)
	{
		$id_youtube = $this->getYoutubeIdFromUrl($url);
		
		if (!$id_youtube)
			return Tools::jsonEncode(array('hasError' => true, 'error' => $this->l('YouTube URL is not valid')));
		
		if (!$this->validateYoutubeVideo($id_youtube))
			return Tools::jsonEncode(array('hasError' => true, 'error' => $this->l('YouTube video does not exists')));
		
		$position = Db::getInstance()->getValue("SELECT MAX(`position`) FROM `"._DB_PREFIX_."youtube` WHERE `id_product`='$id_product'");
		$position++;
		$result = Db::getInstance()->Execute("INSERT INTO `"._DB_PREFIX_."youtube` (`id_product`, `url`, `position`)
											  VALUES ('$id_product', '$url', '$position')");
		if ($result)
		{
			$id_youtube = $this->getYoutubeIdFromUrl($url);
			$info = $this->getYouTubeVideoInfo($id_youtube);
			return Tools::jsonEncode(array('hasError' => false,
										   'success' => $this->l('Video is successfully assigned to selected product'),
										   'data' => $this->renderTableRow(array('id' => Db::getInstance()->INSERT_ID(),
																				 'cover' => ((isset($info['thumbnail_url'])) ? $info['thumbnail_url'] : $info['iurlsd']),
																				 'url' => $url,
																				 'title' => $info['title'],
																				 'active' => 1))));
		}
		else
		{
			return Tools::jsonEncode(array('hasError' => true, 'error' => $this->l('Error! Video could not be saved')));
		}
	}
	
	public function toggleVideoStatus($id_video, $status)
	{
		$status = ($status) ? 0 : 1;
		$result = Db::getInstance()->Execute("UPDATE `"._DB_PREFIX_."youtube` SET `active`='$status' WHERE `id`='$id_video'");
		if ($result)
			return Tools::jsonEncode(array('hasError' => false, 'success' => $this->l('Video status was successfully updated')));
		else
			return Tools::jsonEncode(array('hasError' => true, 'error' => $this->l('Error! Video status could not be updated')));
	}
	
	public function deleteVideo($id_video)
	{
		$result = Db::getInstance()->Execute("DELETE FROM `"._DB_PREFIX_."youtube` WHERE `id`='$id_video'");
		if ($result)
			return Tools::jsonEncode(array('hasError' => false, 'success' => $this->l('Video was successfully deleted')));
		else
			return Tools::jsonEncode(array('hasError' => true, 'error' => $this->l('Error! Video could not be deleted')));
	}
	
	public function positionVideos($positions)
	{
		foreach ($positions as $position => $id_video)
			if (!Db::getInstance()->Execute("UPDATE `"._DB_PREFIX_."youtube` SET `position`='$position' WHERE `id`='$id_video'"))
				return Tools::jsonEncode(array('hasError' => true, 'error' => $this->l('Error! Video position could not be changed')));
		return Tools::jsonEncode(array('hasError' => false, 'success' => $this->l('Video position was successfully changed')));
	}
	
	private function getYouTubeVideoInfo($id_youtube)
	{
		$content = file_get_contents('http://youtube.com/get_video_info?video_id=' . $id_youtube);
		parse_str($content, $info);
		return $info;		
	}
	
	/* checks if YouTube video exists */
	private function validateYoutubeVideo($id_youtube)
	{
		$headers = get_headers('http://gdata.youtube.com/feeds/api/videos/' . $id_youtube);
		if (!strpos($headers[0], '200'))
			return false; // video does not exists
		return true;
	}
	
	private function getYoutubeIdFromUrl($url)
	{
		if (preg_match('%(?:youtube\.com/(?:user/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $result))
			return $result[1];
		return false;
	}
	
	private function dipslayVideos($id_product)
	{
		global $smarty;
		$videos = Db::getInstance()->ExecuteS("SELECT `url`
											   FROM `"._DB_PREFIX_."youtube`
											   WHERE `id_product`='$id_product' AND `active`='1'
											   ORDER BY `position` ASC");
		if ($videos)
		{
			for ($i=0; $i < count($videos); $i++)
			{
				$videos[$i]['id_youtube'] = $this->getYoutubeIdFromUrl($videos[$i]['url']);
			}
			$smarty->assign(array('videos' => $videos,
								  'configs' => array('dimentions' => array('width' => Configuration::get('YOUTUBE_WIDTH'), 'height' => Configuration::get('YOUTUBE_HEIGHT')),
													 'related' => Configuration::get('YOUTUBE_SHOW_RELATED'),
													 'hd' => Configuration::get('YOUTUBE_FORCE_HD')),
								  'video_tpl_path' => _PS_MODULE_DIR_ . 'youtube/tpl/videos.tpl'));
			return $this->display(__FILE__, 'tpl/youtube.tpl');
		}
		return;
	}
	
	/* checks if product has any assigned videos */
	private function hasVideos($id_product)
	{
		return Db::getInstance()->getValue("SELECT COUNT(`id`) FROM `"._DB_PREFIX_."youtube` WHERE `id_product`='$id_product' AND `active`='1'");
	}
	
	function hookProductFooter($params)
	{
		if (!Configuration::get('YOUTUBE_POSITION'))
		{
			global $smarty;
			$smarty->assign('position', 0);
			$id_product = $params['product']->id;
			return $this->dipslayVideos($id_product);
		}
	}
	
 	function hookProductTab($params)
    {
		$id_product = (isset($_GET['id_product'])) ? $_GET['id_product'] : 0;
		if (Configuration::get('YOUTUBE_POSITION') && $this->hasVideos($id_product))
			return '<li><a href="#idTabVideos" class="idTabHrefShort">'.$this->l('Videos').'</a></li>';
	}
	
    function hookProductTabContent($params)
    {
		if (Configuration::get('YOUTUBE_POSITION'))
		{
			global $smarty;
			$smarty->assign('position', 1);
			$id_product = (isset($_GET['id_product'])) ? $_GET['id_product'] : 0;
			return $this->dipslayVideos($id_product);
		}
	}
}
?>
