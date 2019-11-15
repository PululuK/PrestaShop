SET SESSION sql_mode = '';
SET NAMES 'utf8';

ALTER TABLE `PREFIX_search_word` MODIFY `word` VARCHAR(30) NOT NULL;
ALTER TABLE `PREFIX_log` ADD `id_shop` INT(10) NULL DEFAULT NULL AFTER `object_id`, ADD `id_lang` INT(10) NULL DEFAULT NULL AFTER `id_shop`;

/* PHP:ps_1770_preset_tab_enabled(); */;
