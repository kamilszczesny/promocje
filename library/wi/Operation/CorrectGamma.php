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
	 * CorrectGamma operation class
	 * 
	 * @package Internal/Operations
	 */
	class wi_WideImage_Operation_CorrectGamma
	{
		/**
		 * Executes imagegammacorrect()
		 *
		 * @param wi_WideImage_Image $image
		 * @param numeric $input_gamma
		 * @param numeric $output_gamma
		 * @return wi_WideImage_TrueColorImage
		 */
		function execute($image, $input_gamma, $output_gamma)
		{
			$new = $image->copy();
			if (!imagegammacorrect($new->getHandle(), $input_gamma, $output_gamma))
				throw new wi_WideImage_GDFunctionResultException("imagegammacorrect() returned false");
			
			return $new;
		}
	}
