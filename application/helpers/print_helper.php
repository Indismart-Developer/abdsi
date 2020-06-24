<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * ---------------------------------------------------------------
 * PRINT OUT
 * ---------------------------------------------------------------
 */
if (!function_exists('print_out')) {

    function print_out($params, $die = FALSE) {
        ob_start();
        $header = "";
        $footer = "";

        $header .= '<!DOCTYPE html>' . "\r\n" . '<html lang="en">' . "\r\n" . '<head>' . "\r\n";
        $header .= '<meta charset="utf-8">' . "\r\n";
        $header .= '<meta http-equiv="X-UA-Compatible" content="IE=edge">' . "\r\n";
        $header .= '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\r\n";
        $header .= '<style type="text/css">' . "\r\n";
        $header .= 'code {font-family: Consolas,Monaco,Courier New,Courier,monospace; font-size: 12px; background-color: #f9f9f9; border: 1px solid #D0D0D0; color: #002166;display: block; margin: 14px 0 14px 0; padding: 12px 10px 12px 10px;}' . "\r\n";
        $header .= 'code p {color: #ff0000;}';
        $header .= '</style>' . "\r\n" . '</head>' . "\r\n" . '<body>' . "\r\n";
        $header .= '<code>' . "\r\n" . '<p>[ Debug Print Out Start ]</p>' . "\r\n";

        $footer .= "\r\n" . '<p>[ Debug Print Out End ]</p>' . "\r\n" . '</code>' . "\r\n";
        $footer .= '</body>' . "\r\n" . '</html>' . "\r\n";

        if (!empty($params) or $params != '') {
            if (is_array($params) or is_object($params)) {
                echo $header;
                echo '<pre>';
                print_r($params);
                echo '</pre>';
                echo $footer;
            }
            else {
                $content = htmlspecialchars(htmlspecialchars_decode($params, ENT_QUOTES), ENT_QUOTES, 'utf-8');
                $content = str_replace(array(
                    '  ',
                    "\n"
                        ), array(
                    '&nbsp;&nbsp;',
                    '<br>'
                        ), $content);
                $content = str_replace('&nbsp; ', '&nbsp;&nbsp;', $content);
                echo $header;
                echo '<pre>';
                print_r($content);
                echo '</pre>';
                echo $footer;
            }
        }
        else {
            echo $header;
            echo '<pre>';
            print_r('Output data is empty!');
            echo '</pre>';
            echo $footer;
        }

        if ($die) {
            die();
        }
    }

}