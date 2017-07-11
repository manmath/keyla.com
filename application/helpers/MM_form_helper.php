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
    function form_input_group($data, $value = '', $readOnly = false, $attributes = '')
    {
        $error = form_error($data);
        $output = empty($error) ? '<div class="form-group">' : '<div class="form-group has-error">';
        $attributes = empty($attributes) ? 'class="form-control input-sm" id="' . $data . '"' : $attributes;
        if ($readOnly) {
            $attributes .= ' readonly';
        }
        $output .= lang('label_' . $data, $data);
        $output .= form_input($data, set_value($data, $value), $attributes). $error;
        $output .= '</div>';
        return $output;
    }
}

if (!function_exists('form_password_group')) {
    function form_password_group($data, $value = '', $readOnly = false, $attributes = '')
    {
        $error = form_error($data);
        $output = empty($error) ? '<div class="form-group">' : '<div class="form-group has-error">';
        $attributes = empty($attributes) ? 'class="form-control input-sm" id="' . $data . '"' : $attributes;
        if ($readOnly) {
            $attributes .= ' readonly';
        }
        $output .= lang('label_' . $data, $data);
        $output .= form_password($data, $value, $attributes). $error;
        $output .= '</div>';
        return $output;
    }
}

if (!function_exists('form_dropdown_group')) {
    function form_dropdown_group($data, $options = [], $selected = [], $readOnly = false, $attributes = '')
    {
        $error = form_error($data);
        $output = empty($error) ? '<div class="form-group">' : '<div class="form-group has-error">';
        $attributes = empty($attributes) ? 'class="form-control input-sm" id="' . $data . '"' : $attributes;
        if ($readOnly) {
            $attributes .= ' readonly';
        }
        $output .= lang('label_' . $data, $data);
        $output .= form_dropdown($data, $options, set_value($data, $selected), $attributes). $error;
        $output .= '</div>';
        return $output;
    }
}

if (!function_exists('form_checkbox_group')) {
    function form_checkbox_group($data, $value, $checked = false, $readOnly = false, $attributes = '')
    {
        $error = form_error($data);
        $output = empty($error) ? '<div class="checkbox">' : '<div class="has-error"><div class="checkbox">';
        $attributes = empty($attributes) ? 'id="' . $data . '"' : $attributes;
        if ($readOnly) {
            $attributes .= ' readonly';
        }
        $output .= '<label for="' . $data . '">';
        $output .= form_checkbox($data, $value, set_value($data, $checked), $attributes). $error;
        $output .=  lang('label_' . $data) . '</label>';
        $output .= empty($error) ? '</div>' : '</div></div>';
        return $output;
    }
}

if ( ! function_exists('form_button_submit'))
{
    function form_button_submit($data = '', $content = '', $extra = '')
    {
        $defaults = array(
            'name' => is_array($data) ? '' : $data,
            'type' => 'submit'
        );

        if (is_array($data) && isset($data['content']))
        {
            $content = $data['content'];
            unset($data['content']); // content is not an attribute
        }

        return '<button '._parse_form_attributes($data, $defaults)._attributes_to_string($extra).'>'
            .$content
            ."</button>\n";
    }
}
