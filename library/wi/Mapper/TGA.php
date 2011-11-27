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
	
	include_once wi_WideImage::path() . '/vendor/de77/TGA.php';
	
	/**
	 * Mapper support for TGA
	 * 
	 * @package Internal/Mappers
	 */
	class wi_WideImage_Mapper_TGA
	{
		function load($uri)
		{
			return wi_WideImage_vendor_de77_TGA::imagecreatefromtga($uri);
		}
		
		function loadFromString($data)
		{
			return wi_WideImage_vendor_de77_TGA::imagecreatefromstring($data);
		}
		
		function save($handle, $uri = null)
		{
			throw new wi_WideImage_Exception("Saving to TGA isn't supported.");
		}
	}
