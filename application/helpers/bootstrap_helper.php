<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// "$this" works under light testing, but experience shows that it won't
// necessarily work in every context, so let's use a $CI variable
$CI =& get_instance();

 // we use the CI form helper's _attributes_to_string()
$CI->load->helper('form');

if(!function_exists('bs_icon'))
{
	function bs_icon($sIcon = FALSE, $aUserAttr = array())
	{
		$aAttr = array(
			'class' => 'glyphicon glyphicon-' . $sIcon,
			'aria-hidden' => 'true',
		);

		return '<span' . _bs_attributes_to_string($aAttr, $aUserAttr) . '></span>';
	}
}

if(!function_exists('bs_button'))
{
	function bs_button($sUrl = FALSE, $sLabel = '', $mButtonClasses = 'btn-link', $aUserAttr = array())
	{
		$bAnchor = ($sUrl ? TRUE : FALSE);

		if(is_string($mButtonClasses))
		{			
			$mButtonClasses = array_filter(explode(' ', $mButtonClasses));
		}

		if(count($mButtonClasses))
		{
			foreach($mButtonClasses as $k => $v)
			{
				// Add 'btn-' to this class if it isn't there already
				if(substr($v, 0, 4) !== 'btn-') {
					$v = 'btn-' . $v;
				}

				$mButtonClasses[$k] = $v;
			}
		}

		$aAttr = array(
			'class' => 'btn ' . implode(' ', $mButtonClasses),
		);

		$sTag = 'button';

		if($bAnchor)
		{
			// if this is a link, use an anchor tag and insert the URL as its href
			$sTag = 'a';
			$aAttr = array_merge($aAttr, array(
				'href' => $sUrl,
			));
		}

		return '<' . $sTag . _bs_attributes_to_string($aAttr, $aUserAttr) . '>' . $sLabel . '</' . $sTag . '>';
	}
}

if(!function_exists('bs_container_open'))
{
	function bs_container_open($bFluid = FALSE, $aUserAttr = array())
	{
		$aAttr = array(
			'class' => 'container' . ($bFluid ? '-fluid' : ''),
		);
		return '<div' . _bs_attributes_to_string($aAttr, $aUserAttr) . '>';
	}
}

if(!function_exists('bs_container_close'))
{
	function bs_container_close()
	{
		return '</div>';
	}
}

if(!function_exists('bs_row_open'))
{
	function bs_row_open($aUserAttr = array())
	{
		$aAttr = array(
			'class' => 'row',
		);
		return '<div' . _bs_attributes_to_string($aAttr, $aUserAttr) . '>';
	}
}

if(!function_exists('bs_row_close'))
{
	function bs_row_close()
	{
		return '</div>';
	}
}

if(!function_exists('bs_col_open'))
{
	function bs_col_open($mColClasses = '', $aUserAttr = array())
	{
		// split into pieces (space-separated), prepend "col-" to each, and
		// reattach them to this column's "class"
		if(is_string($mColClasses))
		{			
			$mColClasses = array_filter(explode(' ', $mColClasses));
		}
		if(count($mColClasses))
		{
			foreach($mColClasses as $k => $v)
			{
				// Add 'col-' to this class if it isn't there already
				if(substr($v, 0, 4) !== 'col-') {
					$v = 'col-' . $v;
				}

				$mColClasses[$k] = $v;
			}
		}

		$aAttr = array(
			'class' => implode(' ', $mColClasses),
		);
		return '<div' . _bs_attributes_to_string($aAttr, $aUserAttr) . '>';
	}
}

if(!function_exists('bs_col_close'))
{
	function bs_col_close()
	{
		return '</div>';
	}
}

if(!function_exists('bs_clearfix'))
{
	function bs_clearfix($mColClasses = '', $aUserAttr = array())
	{
		if(is_string($mColClasses))
		{			
			$mColClasses = array_filter(explode(' ', $mColClasses));
		}

		if(count($mColClasses))
		{
			foreach($mColClasses as $k => $v)
			{
				// Prepend 'visible-' to this class if it isn't there already
				if(substr($v, 0, 8) !== 'visible-') {
					$v = 'visible-' . $v;
				}

				// Append '-block' to this class if it isn't there already
				if(substr($v, -6) !== '-block') {
					$v = $v . '-block';
				}

				$mColClasses[$k] = $v;
			}
		}

		$aAttr = array(
			'class' => 'clearfix ' . implode(' ', $mColClasses),
		);
		return '<div' . _bs_attributes_to_string($aAttr, $aUserAttr) . '></div>';
	}
}

if(!function_exists('_bs_attributes_to_string'))
{
	// Merges in a secondary array of user variables,
	// then uses the CI form helper.
	function _bs_attributes_to_string($aAttr, $aUserAttr)
	{
		$aMergedAttr = $aAttr; // will get sent if $aUserAttr is empty

		if(count($aUserAttr))
		{
			// if both arrays sent classes, concatenate them instead of
			// overwriting one with the other
			if(isset($aUserAttr['class']) && isset($aAttr['class']))
			{
				// Merge both classes into the array with precedence
				$aUserAttr['class'] = $aAttr['class'].' '.$aUserAttr['class'];
			}
			$aMergedAttr = array_merge($aAttr, $aUserAttr); // merge in any passed attributes
			
		}

		return _attributes_to_string($aMergedAttr);
	}
}


/* End of file bootstrap_helper.php */
/* Location: ./application/helpers/bootstrap_helper.php */
