<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 05.06.2017
 * Time: 20:06
 */

/**
 * Extend tl_news palettes
 */
foreach ($GLOBALS['TL_DCA']['tl_news']['palettes'] as $k=>$v)
{
    $GLOBALS['TL_DCA']['tl_news']['palettes'][$k] = str_replace('{image_legend', '{socialimages_legend},socialImage,socialDescription;{image_legend', $v);
}


/**
 * Add the field to tl_page
 */
$GLOBALS['TL_DCA']['tl_news']['fields']['socialImage'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_news']['socialImage'],
    'exclude'                 => true,
    'inputType'               => 'fileTree',
    'eval'                    => array('files'=>true, 'filesOnly'=>true, 'fieldType'=>'radio', 'extensions'=>$GLOBALS['TL_CONFIG']['validImageTypes'], 'tl_class'=>'clr'),
    'sql'                     => "binary(16) NULL"
);

/**
 * Add the field to tl_page
 */
$GLOBALS['TL_DCA']['tl_news']['fields']['socialDescription'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_news']['socialDescription'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'text',
    'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);