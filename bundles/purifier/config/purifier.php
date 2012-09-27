<?php

/*
 * This file is part of HTMLPurifier Bundle.
 * (c) 2012 Maxime Dizerens
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return array(

    'finalize' => true,
    'preload'  => true,
    'settings' => array(
        'HTML.Doctype'             		=> 'XHTML 1.1 Transitional',
        'HTML.Allowed'             		=> 'strong,i,em,u,a[href|title],ul,ol,li,p',
        'CSS.AllowedProperties'			=> '',
        'HTML.ForbiddenElements'		=> 'span',
        'HTML.ForbiddenAttributes'		=> 'style',
        'AutoFormat.AutoParagraph' 		=> true,
        'AutoFormat.RemoveEmpty'		=> true,
        'AutoFormat.Linkify' 			=> true,
    ),
)