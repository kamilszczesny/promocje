<?php
	/**
 * @author Gasper Kozak
 * @copyright 2007-2011

    This file is part of wi_WideImage.
		
    wi_WideImage is free software; you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation; either version 2.1 of the License, or
    (at your option) any later version.
		
    wi_WideImage is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Lesser General Public License for more details.
		
    You should have received a copy of the GNU Lesser General Public License
    along with wi_WideImage; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

    * @package Internal/Mappers
  **/
	
	include_once wi_WideImage::path() . '/vendor/de77/BMP.php';
	
	/**
	 * Mapper support for BMP
	 * 
	 * @package Internal/Mappers
	 */
	class wi_WideImage_Mapper_BMP
	{
		function load($uri)
		{
			return wi_WideImage_vendor_de77_BMP::imagecreatefrombmp($uri);
		}
		
		function loadFromString($data)
		{
			return wi_WideImage_vendor_de77_BMP::imagecreatefromstring($data);
		}
		
		function save($handle, $uri = null)
		{
			if ($uri == null)
				return wi_WideImage_vendor_de77_BMP::imagebmp($handle);
			else
				return wi_WideImage_vendor_de77_BMP::imagebmp($handle, $uri);
		}
	}
