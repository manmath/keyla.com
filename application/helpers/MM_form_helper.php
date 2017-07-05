<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package     Keyla.Today
 * @copyright   (c) 2017, Man Math
 * @license     http://opensource.org/licenses/MIT
 * @link        http://www.keyla.today/
 * @since       Version 1.0.0
 */

if (!function_exists('form_input_group')) {
    function form_input_group($data, $required = false, $readOnly = false, $attributes = '')
    {
        $error = '';
        if ($required) {
            $error = form_error($data);
        }
        $output = empty($error) ? '<div class="form-group">' : '<div class="form-group has-error">';
        $attributes = empty($attributes) ? 'class="form-control input-sm" id="' . $data . '"' : $attributes;
        if ($readOnly) {
            $attributes .= ' readonly';
        }
        $output .= lang($data, $data, array('class' => 'col-sm-3 control-label'));
        $output .= '<div class="col-sm-9">';
        $output .= form_input($data, set_value($data), empty($attributes) ? '' : $attributes). $error;
        $output .= '</div></div>';
        return $output;
    }
}

if (!function_exists('form_password_group')) {
    function form_password_group($data, $required = false, $readOnly = false, $attributes = '')
    {
        $error = '';
        if ($required) {
            $error = form_error($data);
        }
        $output = empty($error) ? '<div class="form-group">' : '<div class="form-group has-error">';
        $attributes = empty($attributes) ? 'class="form-control input-sm" id="' . $data . '"' : $attributes;
        if ($readOnly) {
            $attributes .= ' readonly';
        }
        $output .= lang($data, $data, ['class' => 'col-sm-3 control-label']);
        $output .= '<div class="col-sm-9"><div class="input-group">';
        $output .= form_password($data, set_value($data), empty($attributes) ? '' : $attributes). $error;
        $output .= '<span class="input-group-addon"><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i></span>';
        $output .= '</div></div></div>';
        return $output;
    }
}
