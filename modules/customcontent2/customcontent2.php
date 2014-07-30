<?php 

if(!defined('_PS_VERSION_'))
  exit;

class CustomContent2 extends Module{

  protected $maxImageSize = 307200;
  private $_html = '';
  protected $_defaultLanguage;
  protected $_languages;

  public function __construct()
  {
    $this->name = 'customcontent2';    // Defines module name
    $this->tab = 'other';         // Defines module tab name/module category in the admin panel
    $this->author = 'TemplateMonster';      // Defines module author
    $this->version = '1.0';       // Defines module version
    $this->secure_key = Tools::encrypt($this->name);

    $this->_defaultLanguage = intval(Configuration::get('PS_LANG_DEFAULT'));
    $this->_languages = Language::getLanguages();

    parent::__construct();

    $this->displayName = $this->l('customcontent2');
    $this->desctiption = $this->l('customcontent2 description');
  }

  public function install()
  {
  /* Adds Module */
  if (!parent::install() || 
    !$this->registerHook('displayHeader') ||
    !$this->registerHook('displayHome') ||
    !$this->registerHook('displayLeftColumn') ||
    !$this->registerHook('displayRightColumn') ||
    !$this->registerHook('displayFooter'))
    return false;
  return true;
  }

  public function uninstall()
  {
  if (!parent::uninstall())
     return false;
  return true;
  }

  function putContent($xml_data, $key, $value, $cdata = null)
  {
    /*
      $value = htmlspecialchars($value);
    */
    if ((int)ini_get('magic_quotes_gpc')==1 && ((int)ini_get('magic_quotes_sybase')==0)) 
      {
        $value=stripslashes($value);
      }
      if(!$value){
        return NULL;
      }elseif ($cdata != NULL){
        return ('    <'.$key.'><![CDATA['.$value.']]></'.$key.'>');
      } else {
        return ('    <'.$key.'>'.$value.'</'.$key.'>');
      }
  }

  static private function getXmlFilename()
  {
    return 'content.xml';
  }

  public function _writeToXml($xml)
  {
  if ($fd = @fopen(dirname(__FILE__).'/'.$this->getXmlFilename(), 'w'))
    {
      if (!@fwrite($fd, $xml))
        $this->_html .= $this->displayError($this->l('Unable to write to XML.'));
      if (!@fclose($fd))
        $this->_html .= $this->displayError($this->l('Can\'t close XML file.'));
    }
    else
      $this->_html .= $this->displayError($this->l('Unable to update XML file.<br />Please check file\'s permissions. Content.xml file should be open for writing.'));
  }


  public function getContent()
  {
    $this->_html = '<h2>'.$this->displayName.' '.$this->version.'</h2>';
    $xml = $this->_getXML();

    $this->_postProcess();    

    $this->_displayForm();
    return $this->_html;
  }

  private function _getXml()
  {
    if (file_exists(dirname(__FILE__).'/'.$this->getXmlFilename()))
    {
      if ($xml = @simplexml_load_file(dirname(__FILE__).'/'.$this->getXmlFilename()))
        return $xml;
    }
    return false;
  }

  public function _getFormItem($i, $last)
  {
    global $cookie;
    $this->_xml = $this->_getXml();
    $divLangName = 'html'.$i;

    $itemHook = '';
    $itemUrl = '';
    $itemHtmlLang = '';
    $itemImg = '';
    $imgWidth = '';
    $imgHeight = '';

    if($this->_xml->item[$i])
    {
      $itemHook = $this->_xml->item[$i]->hook;
      $itemUrl = $this->_xml->item[$i]->url;
      $itemImg = $this->_xml->item[$i]->img;
      $imgWidth = $this->_xml->item[$i]->imgWidth;
      $imgHeight = $this->_xml->item[$i]->imgHeight;
    }

    $output = '
      <div class="item" id="item'.$i.'">
        <fieldset class="customcontent_fieldset">
          <legend><img src="'.$this->_path.'logo.gif" alt="" title="" />'.$this->l('Item #').($i+1).'</legend>
          <input type="hidden" name="item['.$i.'][inst]" value="item_inst_'.$i.'"/>

          <div class="deleteItem">
            <label>'.$this->l('Delete item').'</label>
            <input type="checkbox" name="deleteItem[item'.$i.']" onclick="deleteItem(\'item'.$i.'\')"/>
          </div>

          <div class="left-col">
            <div class="hook field">
              <label>'.$this->l('Hook').'</label>
              <select id="item_'.$i.'_hook" name="item['.$i.'][hook]" default="left">
                <option value="left" '.($itemHook == 'left' ? 'selected' : '').'>left</option>
                <option value="right" '. ($itemHook == 'right' ? 'selected' : '') .'>right</option>
                <option value="home" '. ($itemHook == 'home' ? 'selected' : '') .'>home</option>  
                <option value="footer" '. ($itemHook == 'footer' ? 'selected' : '') .'>footer</option>  
              </select>
            </div>

            <div class="image field">
              <label>'.$this->l('Image').'</label>
              <input type="file" name="item'.$i.'_img" />
            </div>

            <div class="url field">
              <label>'.$this->l('Image URL').'</label>
              <input type="text" name="item['.$i.'][url]" size="48" value="'.$itemUrl.'" />
            </div>';
                      
            $output .= '
            <div class="html">';

              $output .= $this->displayFlags($this->_languages, $this->_defaultLanguage, $divLangName , 'html'.$i, true);

              foreach ($this->_languages as $language)
              { 
                if($this->_xml->item[$i])
                {
                  $itemHtmlLang = $this->_xml->item[$i]->html->{'lang_'.$language['id_lang']};
                }
                $output .= '
              <div id="html'.$i.'_'.$language['id_lang'].'" style="display:'.($language['id_lang'] == $this->_defaultLanguage ? 'block' : 'none').';">               
                <label>'.$this->l('HTML').'</label>
                <textarea name="item['.$i.'][html][lang_'.$language['id_lang'].']" cols="65" rows="12">'.$itemHtmlLang.'</textarea>
              </div>';  
              }

             $output .='
             </div>
          </div>

          <div class="right-col">
            <div class="image field">
              <img src="'.$this->_path.'images/'.$itemImg.'" alt="" title="" style="width:'.$imgWidth.'px; '. ($itemImg ? '' : 'display:none;') .'" class="preview" />
            </div>
            <div>
              <div class="imageWidth field">
                <label>'.$this->l('Image width: ').'</label><input name="item['.$i.'][imgWidth]" type="text" maxlength="4" size="4" value="'.$imgWidth.'"/></br>
              </div>
              <div class="imageHeight field">
                <label>'.$this->l('Image height: ').'</label><input name="item['.$i.'][imgHeight]" type="text" maxlength="4" size="4" value="'.$imgHeight.'"/>
              </div>
            </div>
          </div> ';

          $output .= '
            </fieldset>
        </div>';

    return $output;
  }

  public function _displayForm()
  {
    $xml = false;
    if (file_exists(dirname(__FILE__).'/'.$this->getXmlFilename()))
    {
      if (!$xml = @simplexml_load_file(dirname(__FILE__).'/'.$this->getXmlFilename())){
        $this->_html .= $this->displayError($this->l('Your content.xml file is empty.'));
      }

      $this->_html = '
       <script type="text/javascript">
          function removeDiv(id)
          {
            $("#"+id).fadeOut("slow");
            $("#"+id).remove();
          }
          function cloneIt(cloneId) {
            var currentDiv = $(".item:last");
            var id = ($(currentDiv).size()) ? $(currentDiv).attr("id").match(/[0-9]/gi) : -1;
            var nextId = parseInt(id) + 1;
            $.get("'._MODULE_DIR_.$this->name.'/ajax.php?id="+nextId, function(data) {
              $("#items").append(data);
            });
            $("#"+cloneId).remove();
          }
          function deleteItem(id)
          {
            $("#"+id+" fieldset" ).toggleClass("deleteItem");
          }

        </script> 

        <h2>'.$this->displayName.' (v.'.$this->version.')</h2>


        <form method="post" action="'.$_SERVER['REQUEST_URI'].'" enctype="multipart/form-data">

        <div class="submit-wrapper"><input type="submit" name="submitUpdate" value="'.$this->l('Save').'" class="button" /></div>

          <div id="items">';
            $i = 0;
            foreach ($xml->item as $item)
            {
              $last = ($i == (count($xml->item)-1) ? true : false);
              $this->_html .= $this->_getFormItem($i, $last);
              $i++;
            }
            $this->_html .= '
          </div>    
        <a id="clone'.$i.'" href="javascript:cloneIt(\'clone'.$i.'\')" style="color:#488E41"><img src="'._PS_ADMIN_IMG_.'add.gif" alt="'.$this->l('add').'" /> <b>'.$this->l('Add a new item').'</b></a>
        <div class="submit-wrapper"><input type="submit" name="submitUpdate" value="'.$this->l('Save').'" class="button" /></div>
      </form>';
    }
    $this->context->controller->addCSS($this->_path . '/customcontent.css');
  }

  private function _postProcess()
  {
  $this->_xml = $this->_getXml();
  
  if (isset($_POST['submitUpdate']))
    {
      $newXml = '<?xml version=\'1.0\' encoding=\'utf-8\' ?>'."\n";
      $newXml .= '<items>'."\n";

        $i = 0;
        if (isset($_POST['item']))
        {
        foreach ($_POST['item'] as $item)
        {              
          if(isset($_POST['deleteItem']['item'.$i]) && $this->_xml->item[$i]->img){
            unlink(dirname(__FILE__).'/images/'.$this->_xml->item[$i]->img);
          }

          if(!isset($_POST['deleteItem']['item'.$i]))
          {
          $newXml .= '  <item>';
            foreach ($item as $key => $value)
            {
              // XML keys except 'html'
              if($key !== 'html' && $key !== 'url' && $key !== 'imgHeight' && $key !== 'imgWidth')
              {
                if ($line = $this->putContent($newXml, $key, $value))
                $newXml .= "\n".$line;
              } 
              if($key == 'url')
              {
                if ($line = $this->putContent($newXml, $key, $value, 1))
                $newXml .= "\n".$line;
              } 
              if($key == 'html')
              {
                // XML key 'html'
                $newXml .= "\n".'    <html>';
                foreach ($value as $lang => $langVal)
                {
                  if(Validate::isCleanHtml($langVal)){
                    if ($line = $this->putContent($newXml, $lang, $langVal, 1)){
                      $newXml .= "\n".'    '.$line;
                    }
                  } else {
                    echo $this->l('Item'.$i.' HTML is not valid');
                  }
                }
                $newXml .= "\n".'    </html>'."\n";
              }
              if($key == 'imgHeight')
              {
                if (is_numeric($value) && $line = $this->putContent($newXml, $key, $value))
                $newXml .= "\n".$line;
              }              
              if($key == 'imgWidth')
              {
                if (is_numeric($value) && $line = $this->putContent($newXml, $key, $value))
                $newXml .= "\n".$line;
              } 
            }

              /* Uploads image */
              $imgWidth = "";
              $imgHeight = "";

              if(is_numeric($item['imgWidth'])){
                $imgWidth = intval($item['imgWidth']);
              }              

              if(is_numeric($item['imgHeight'])){
                $imgHeight = intval($item['imgHeight']);
              }

              $type = @strtolower(substr(strrchr($_FILES['item'.$i.'_img']['name'], '.'), 1));
              $imagesize = array();
              $imagesize = @getimagesize($_FILES['item'.$i.'_img']['tmp_name']);
              Configuration::set('PS_IMAGE_QUALITY','png_all');
              $salt = sha1(microtime());

              if (isset($_FILES['item'.$i.'_img']) &&
                  isset($_FILES['item'.$i.'_img']['tmp_name']) &&
                  !empty($_FILES['item'.$i.'_img']['tmp_name']) &&
                  !empty($imagesize) &&
                  in_array(strtolower(substr(strrchr($imagesize['mime'], '/'), 1)), array('jpg', 'gif', 'jpeg', 'png')) &&
                  in_array($type, array('jpg', 'gif', 'jpeg', 'png')))
                {
                  $temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');
                  
                  if ($error = ImageManager::validateUpload($_FILES['item'.$i.'_img']))
                    $errors[] = $error;
                  elseif (!$temp_name || !move_uploaded_file($_FILES['item'.$i.'_img']['tmp_name'], $temp_name))
                    return false;
                  elseif (!ImageManager::resize($temp_name, dirname(__FILE__).'/images/'.Tools::encrypt($_FILES['item'.$i.'_img']['name'].$salt).'.'.$type, $imgWidth, $imgHeight))
                    $errors[] = $this->displayError($this->l('An error occurred during the image upload.'));
                  if (isset($temp_name))
                    @unlink($temp_name);  

                  if ($line = $this->putContent($newXml, 'img', Tools::encrypt($_FILES['item'.$i.'_img']['name'].$salt).'.'.$type)){
                    @unlink(dirname(__FILE__).'/images/'.$this->_xml->item[$i]->img);
                    $newXml .= "\n".$line;    
                  }              
                } else {
                  if(isset($this->_xml->item[$i]->img)){
                     $line = $this->putContent($newXml, 'img', $this->_xml->item[$i]->img);
                  } else {
                    $line = $this->putContent($newXml, 'img', '');
                  }
                  $newXml .= "\n".$line;
                }
            $newXml .= "\n".' </item>'."\n";
            }
            $i++;
        }
      }
      $newXml .= '</items>'."\n";

      $this->_writeToXml($newXml);
    }
  }


  public function hookdisplayHeader($params)
  {
    $this->context->controller->addCss($this->_path.'customcontent.css', 'all');
  }

  public function hookDisplayHome()
  {
    global $cookie, $smarty;

    if (file_exists(dirname(__FILE__).'/'.$this->getXmlFilename()))
      if ($xml = simplexml_load_file(dirname(__FILE__).'/'.$this->getXmlFilename()))
      {
        $smarty->assign(array(
          'xml' => $xml,
          'img_path' => $this->_path.'images/',
          'html_lang' => 'lang_'.$cookie->id_lang
        ));

        return $this->display(__FILE__, 'customcontent_home.tpl');
      }
    return false;
  }  

  public function hookDisplayLeftColumn()
  {
    global $cookie, $smarty;

    if (file_exists(dirname(__FILE__).'/'.$this->getXmlFilename()))
      if ($xml = simplexml_load_file(dirname(__FILE__).'/'.$this->getXmlFilename()))
      {
        $smarty->assign(array(
          'xml' => $xml,
          'img_path' => $this->_path.'images/',
          'html_lang' => 'lang_'.$cookie->id_lang
        ));

        return $this->display(__FILE__, 'customcontent_left.tpl');
      }
    return false;
  }  

  public function hookDisplayRightColumn()
  {
    global $cookie, $smarty;

    if (file_exists(dirname(__FILE__).'/'.$this->getXmlFilename()))
      if ($xml = simplexml_load_file(dirname(__FILE__).'/'.$this->getXmlFilename()))
      {
        $smarty->assign(array(
          'xml' => $xml,
          'img_path' => $this->_path.'images/',
          'html_lang' => 'lang_'.$cookie->id_lang
        ));

        return $this->display(__FILE__, 'customcontent_right.tpl');
      }
    return false;
  }  

  public function hookDisplayFooter()
  {
    global $cookie, $smarty;

    if (file_exists(dirname(__FILE__).'/'.$this->getXmlFilename()))
      if ($xml = simplexml_load_file(dirname(__FILE__).'/'.$this->getXmlFilename()))
      {
        $smarty->assign(array(
          'xml' => $xml,
          'img_path' => $this->_path.'images/',
          'html_lang' => 'lang_'.$cookie->id_lang
        ));

        return $this->display(__FILE__, 'customcontent_footer.tpl');
      }
    return false;
  }  

}