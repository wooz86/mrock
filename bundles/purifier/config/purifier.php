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
    'preload'  => false,
    'settings' => array(
        'HTML.Doctype'             => 'XHTML 1.0 Strict',
        'HTML.Allowed'             => 'strong,i,em,u,a[href|title],ul,ol,li,p,br',
        'CSS.AllowedProperties'    => '',
        'AutoFormat.AutoParagraph' => true,
        'AutoFormat.RemoveEmpty'   => true
    ),
)