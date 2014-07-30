<?php
if (!defined('_CAN_LOAD_FILES_'))
	exit;
class TMSpecials extends Module
{
	private $_html = '';
	private $_postErrors = array();
    function __construct()
    {
        $this->name = 'tmspecials';
        $this->tab = 'pricing_promotion';
        $this->version = 1.0;
		$this->author = 'TM';
		$this->need_instance = 0;
		parent::__construct();
		$this->displayName = $this->l('TM Specials block');
		$this->description = $this->l('Adds a block with current product specials.');
	}
	public function install()
	{
		return (parent::install() AND $this->registerHook('rightColumn'));
	}
	public function getContent()
	{
		$output = '<h2>'.$this->displayName.'</h2>';
		if (Tools::isSubmit('submitSpecials'))
		{
			Configuration::updateValue('PS_BLOCK_SPECIALS_DISPLAY', (int)(Tools::getValue('always_display')));
			$output .= '<div class="conf confirm"><img src="../img/admin/ok.gif" alt="'.$this->l('Confirmation').'" />'.$this->l('Settings updated').'</div>';
		}
		return $output.$this->displayForm();
	}
	public function displayForm()
	{
		return '
		<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
			<fieldset>
				<legend><img src="'.$this->_path.'logo.gif" alt="" title="" />'.$this->l('Settings').'</legend>
				<label>'.$this->l('Always display block').'</label>
				<div class="margin-form">
					<input type="radio" name="always_display" id="display_on" value="1" '.(Tools::getValue('always_display', Configuration::get('PS_BLOCK_SPECIALS_DISPLAY')) ? 'checked="checked" ' : '').'/>
					<label class="t" for="display_on"> <img src="../img/admin/enabled.gif" alt="'.$this->l('Enabled').'" title="'.$this->l('Enabled').'" /></label>
					<input type="radio" name="always_display" id="display_off" value="0" '.(!Tools::getValue('always_display', Configuration::get('PS_BLOCK_SPECIALS_DISPLAY')) ? 'checked="checked" ' : '').'/>
					<label class="t" for="display_off"> <img src="../img/admin/disabled.gif" alt="'.$this->l('Disabled').'" title="'.$this->l('Disabled').'" /></label>
					<p class="clear">'.$this->l('Show the block even if no product is available.').'</p>
				</div>
				<center><input type="submit" name="submitSpecials" value="'.$this->l('Save').'" class="button" /></center>
			</fieldset>
		</form>';
	}
	public function hookRightColumn($params)
	{
		if (Configuration::get('PS_CATALOG_MODE'))
			return ;
		global $smarty;
		$tmp = Product::getPricesDrop(intval($params['cookie']->id_lang));
		asort($tmp);
		if (!$special = Product::getPricesDrop((int)($params['cookie']->id_lang)) AND !Configuration::get('PS_BLOCK_SPECIALS_DISPLAY'))
			return;
		$smarty->assign(array(
			'special' => $special,
			'specials' => $tmp,
			'products' => Product::getPricesDrop(intval($params['cookie']->id_lang)),
			'priceWithoutReduction_tax_excl' => Tools::ps_round($special['price_without_reduction'], 2)
		));
		return $this->display(__FILE__, 'tmspecials.tpl');
	}
}