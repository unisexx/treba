<?php
// --------------------------------------------------------------------
/**
 * Drop-down Menu
 *
 * @access	public
 * @param	string
 * @param	array
 * @param	string
 * @param	string
 * @return	string
 */

function form_dropdown($name = '', $options = array(), $selected = array(), $extra = '',$default_value = FALSE)
{
	if ( ! is_array($selected))
	{
		$selected = array($selected);
	}

	// If no selected state was submitted we will attempt to set it automatically
	if (count($selected) === 0)
	{
		// If the form name appears in the $_POST array we have a winner!
		if (isset($_POST[$name]))
		{
			$selected = array($_POST[$name]);
		}
	}

	if ($extra != '') $extra = ' '.$extra;
	$multiple = (count($selected) > 1 && strpos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';
	$form = '<select name="'.$name.'"'.$extra.$multiple.">\n";
	$form .= ($default_value) ? '<option value="">'.$default_value.'</option>\n' : '';

	foreach ($options as $key => $val)
	{
		$key = (string) $key;

		if (is_array($val))
		{
			$form .= '<optgroup label="'.$key.'">'."\n";
			foreach ($val as $optgroup_key => $optgroup_val)
			{
				$sel = (in_array($optgroup_key, $selected)) ? ' selected="selected"' : '';
				$form .= '<option value="'.$optgroup_key.'"'.$sel.'>'.(string) $optgroup_val."</option>\n";
			}
			$form .= '</optgroup>'."\n";
		}
		else
		{
			$sel = (in_array($key, $selected)) ? ' selected="selected"' : '';
			$form .= '<option value="'.$key.'"'.$sel.'>'.(string) $val."</option>\n";
		}
	}
	$form .= '</select>';
	return $form;
}

function form_image($name,$value = NULL,$width = 100,$height = 100)
{
	$CI =& get_instance();
	$CI->session->set_flashdata('tinymce','on');
	$image = $value ? '<img src="'.$value.'" width="'.$width.'" height="'.$height.'" />' : NULL;
	$form = '<div id="'.$name.'_img" style="display:block;background:#eee;width:'.$width.'px;height:'.$height.'px;">'.$image.'</div><br />';
	$form .= '<a href="javascript:openKCFinderImage(\''.$name.'\','.$width.','.$height.')" class="btn">Browse</a>';
	$form .= '&nbsp;<a href="javascript:removeImage(\''.$name.'\')" class="btn">Remove</a><br />';
	$form .= '<input type="hidden" name="'.$name.'" value="'.$value.'" />';
	return $form;	
}

function form_file($name,$value = NULL)
{
	$CI =& get_instance();
	$CI->session->set_flashdata('tinymce','on');
	$form = '<div id="'.$name.'_file">'.$value.'</div><br />';
	$form .= '<a href="javascript:openKCFinderFile(\''.$name.'\')" class="btn">Browse</a>';
	$form .= '&nbsp;<a href="javascript:removeFile(\''.$name.'\')" class="btn">Remove</a><br />';
	$form .= '<input type="hidden" name="'.$name.'" value="'.$value.'" />';
	return $form;	
}


if ( ! function_exists('form_datepicker'))
{
	function form_datepicker($data = '', $value = '')
	{
		$CI =& get_instance();
		$CI->session->set_flashdata('datepicker','on');
		$defaults = array('type' => 'text', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
		return "<input "._parse_form_attributes($data, $defaults).' class="datepicker" '." />";
	}
}

function form_checkbox($data = '', $value = '', $checked = FALSE, $extra = '')
{
	$defaults = array('type' => 'checkbox', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
	
	if (is_array($data) AND array_key_exists('checked', $data))
	{
		$checked = $data['checked'];
		if ($checked == FALSE)
		{
			unset($data['checked']);
		}
		else
		{
			$data['checked'] = 'checked';
		}
	}
	
	if ($checked == $value)
	{
		$defaults['checked'] = 'checked';
	}
	else
	{
		unset($defaults['checked']);
	}
	
	return "<input "._parse_form_attributes($data, $defaults).$extra." />";
}

function form_referer($name = 'referer')
{
	return form_hidden($name,$_SERVER['HTTP_REFERER']);
}

function form_back($name = 'back')
{
	return form_button($name,'ย้อนกลับ','onclick="window.location = \''.$_SERVER['HTTP_REFERER'].'\'"');
}
?>