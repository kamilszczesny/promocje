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
    
    * @package wi_WideImage
  **/
	
	/**
	 * @package wi_WideImage
	 */
	class wi_WideImage_PaletteImage extends wi_WideImage_Image
	{
		/**
		 * Create a palette image
		 *
		 * @param int $width
		 * @param int $height
		 * @return wi_WideImage_PaletteImage
		 */
		static function create($width, $height)
		{
			if ($width * $height <= 0 || $width < 0)
				throw new wi_WideImage_InvalidImageDimensionException("Can't create an image with dimensions [$width, $height].");
			
			return new wi_WideImage_PaletteImage(imagecreate($width, $height));
		}
		
		function doCreate($width, $height)
		{
			return self::create($width, $height);
		}
		
		/**
		 * (non-PHPdoc)
		 * @see wi_WideImage_Image#isTrueColor()
		 */
		function isTrueColor()
		{
			return false;
		}
		
		/**
		 * (non-PHPdoc)
		 * @see wi_WideImage_Image#asPalette($nColors, $dither, $matchPalette)
		 */
		function asPalette($nColors = 255, $dither = null, $matchPalette = true)
		{
			return $this->copy();
		}
		
		/**
		 * Returns a copy of the image
		 * 
		 * @param $trueColor True if the new image should be truecolor
		 * @return wi_WideImage_Image
		 */
		protected function copyAsNew($trueColor = false)
		{
			$width = $this->getWidth();
			$height = $this->getHeight();
			
			if ($trueColor)
				$new = wi_WideImage_TrueColorImage::create($width, $height);
			else
				$new = wi_WideImage_PaletteImage::create($width, $height);
			
			// copy transparency of source to target
			if ($this->isTransparent())
			{
				$rgb = $this->getTransparentColorRGB();
				if (is_array($rgb))
				{
					$tci = $new->allocateColor($rgb['red'], $rgb['green'], $rgb['blue']);
					$new->fill(0, 0, $tci);
					$new->setTransparentColor($tci);
				}
			}
			
			imageCopy($new->getHandle(), $this->handle, 0, 0, 0, 0, $width, $height);
			return $new;
		}
		
		/**
		 * (non-PHPdoc)
		 * @see wi_WideImage_Image#asTrueColor()
		 */
		function asTrueColor()
		{
			$width = $this->getWidth();
			$height = $this->getHeight();
			$new = wi_WideImage::createTrueColorImage($width, $height);
			if ($this->isTransparent())
				$new->copyTransparencyFrom($this);
			if (!imageCopy($new->getHandle(), $this->handle, 0, 0, 0, 0, $width, $height))
				throw new wi_WideImage_GDFunctionResultException("imagecopy() returned false");
			return $new;
		}
		
		/**
		 * (non-PHPdoc)
		 * @see wi_WideImage_Image#getChannels()
		 */
		function getChannels()
		{
			$args = func_get_args();
			if (count($args) == 1 && is_array($args[0]))
				$args = $args[0];
			return wi_WideImage_OperationFactory::get('CopyChannelsPalette')->execute($this, $args);
		}
		
		/**
		 * (non-PHPdoc)
		 * @see wi_WideImage_Image#copyNoAlpha()
		 */
		function copyNoAlpha()
		{
			return wi_WideImage_Image::loadFromString($this->asString('png'));
		}
	}
