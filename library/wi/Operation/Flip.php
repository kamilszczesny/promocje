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

    * @package Internal/Operations
  **/
	
	/**
	 * Flip operation class
	 * 
	 * @package Internal/Operations
	 */
	class wi_WideImage_Operation_Flip
	{
		/**
		 * Returns a flipped image
		 *
		 * @param wi_WideImage_Image $image
		 * @return wi_WideImage_Image
		 */
		function execute($image)
		{
			$new = $image->copy();
			
			$width = $image->getWidth();
			$height = $image->getHeight();
			
			if ($new->isTransparent())
				imagefilledrectangle($new->getHandle(), 0, 0, $width, $height, $new->getTransparentColor());
			
			for ($y = 0; $y < $height; $y++)
				if (!imagecopy($new->getHandle(), $image->getHandle(), 0, $y, 0, $height - $y - 1, $width, 1))
					throw new wi_WideImage_GDFunctionResultException("imagecopy() returned false");
			
			return $new;
		}
	}
