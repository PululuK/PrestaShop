{*
* 2007-2012 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2012 PrestaShop SA
*  @version  Release: $Revision: 6844 $
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<script type="text/javascript">
	{if isset($smarty.get.ad) && isset($smarty.get.live_edit)}
		var ad = "{$smarty.get.ad}";
	{/if}
	var lastMove = '';
	var saveOK = '{l s='Module position saved'}';
	var confirmClose = '{l s='Are you sure? If you close this window, its position won\'t be saved'}';
	var close = '{l s='Close'}';
	var cancel = '{l s='Cancel'}';
	var confirm = '{l s='Confirm'}';
	var add = '{l s='Add this module'}';
	var unableToUnregisterHook = '{l s='Unable to unregister hook'}';
	var unableToSaveModulePosition = '{l s='Unable to save module position'}';
	var loadFail = '{l s='Failed to load module list'}';
</script>

<div style=" background-color:000; background-color: rgba(0,0,0, 0.7); border-bottom: 1px solid #000; width:100%;height:30px; padding:5px 10px;; position:fixed;top:0;left:0;z-index:9999;">
<form id="liveEdit-action-form" action="./{$ad}/ajax.php" method="POST" >
	<input type="hidden" name="ajax" value="true" />
	<input type="hidden" name="id_shop" value="{$id_shop}" />
	{foreach from=$hook_list key=hook_id item=hook_name}
		<input class="hook_list" type="hidden" name="hook_list[{$hook_id}]" 
			value="{$hook_name}" />
	{/foreach}
<div class="toto">
	<input type="submit" value="{l s='Save'}" name="saveHook" id="saveLiveEdit" class="exclusive" style=" background-color:#4FB106; background: -moz-linear-gradient(#4FB106, #157402) repeat scroll 0 0 transparent; border:1px solid #4FB106; color:#fff;float:right; text-shadow: 0 -1px 0 #157402; margin-right:20px;">
	<input type="submit" value="{l s='Close Live edit'}" id="closeLiveEdit" class="button" style="background: #333 none; color:#fff; border:1px solid #000; float:right; margin-right:10px;">

</div>
</form>
	<div style="float:right;margin-right:20px;" id="live_edit_feed_back"></div>
</div>
<a href="#" style="display:none;" id="fancy"></a>
<div id="live_edit_feedback" style="width:400px"> 
	<p id="live_edit_feedback_str">
	</p> 
	<!-- <a href="javascript:;" onclick="$.fancybox.close();">{l s='Close'}</a> --> 
</div>	
