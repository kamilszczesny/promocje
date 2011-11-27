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
	
	require_once wi_WideImage::path() . 'Exception.php';
	
	require_once wi_WideImage::path() . 'Image.php';
	require_once wi_WideImage::path() . 'TrueColorImage.php';
	require_once wi_WideImage::path() . 'PaletteImage.php';
	
	require_once wi_WideImage::path() . 'Coordinate.php';
	require_once wi_WideImage::path() . 'Canvas.php';
	require_once wi_WideImage::path() . 'MapperFactory.php';
	require_once wi_WideImage::path() . 'OperationFactory.php';
	
	require_once wi_WideImage::path() . 'Font/TTF.php';
	require_once wi_WideImage::path() . 'Font/GDF.php';
	require_once wi_WideImage::path() . 'Font/PS.php';
	
	/**
	 * @package Exceptions
	 */
	class wi_WideImage_InvalidImageHandleException extends wi_WideImage_Exception {}
	
	/**
	 * @package Exceptions
	 */
	class wi_WideImage_InvalidImageSourceException extends wi_WideImage_Exception {}
	
	/**
	 * @package Exceptions
	 * 
	 * Class for invalid GD function calls result (for example those that return bool)
	 */
	class wi_WideImage_GDFunctionResultException extends wi_WideImage_Exception {}
	
	/**
	 * The gateway class for loading images and core library functions
	 *
	 * @package wi_WideImage
	 */
	class wi_WideImage
	{
		const SIDE_TOP_LEFT = 1;
		const SIDE_TOP = 2;
		const SIDE_TOP_RIGHT = 4;
		const SIDE_RIGHT = 8;
		const SIDE_BOTTOM_RIGHT = 16;
		const SIDE_BOTTOM = 32;
		const SIDE_BOTTOM_LEFT = 64;
		const SIDE_LEFT = 128;
		const SIDE_ALL = 255;
		
		/**
		 * @var string Path to the library base directory
		 */
		protected static $path = null;
		
		/**
		 * Returns the library version
		 * @return string The library version
		 */
		static function version()
		{
			return '11.02.19';
		}
		
		/**
		 * Returns the path to the library
		 * @return string
		 */
		static function path()
		{
			if (self::$path === null)
				self::$path = dirname(__FILE__) . DIRECTORY_SEPARATOR;
			return self::$path;
		}
		
		/**
		 * Checks whether the gd library is loaded, and throws an exception otherwise
		 */
		static function checkGD()
		{
			if (!extension_loaded('gd'))
				throw new wi_WideImage_Exception("wi_WideImage requires the GD extension, but it's apparently not loaded.");
		}
		
		/**
		 * Registers a custom mapper for image loading and saving
		 * 
		 * Example:
		 * <code>
		 * 	wi_WideImage::registerCustomMapper('wi_WideImage_Mapper_TGA', 'image/tga', 'tga');
		 * </code>
		 * 
		 * @param string $mapper_class_name
		 * @param string $mime_type
		 * @param string $extension
		 */
		static function registerCustomMapper($mapper_class_name, $mime_type, $extension)
		{
			wi_WideImage_MapperFactory::registerMapper($mapper_class_name, $mime_type, strtoupper($extension));
		}
		
		/**
		 * Loads an image from a file, URL, HTML input file field, binary string, or a valid image handle.
		 * The image format is auto-detected. 
		 * 
		 * Currently supported formats: PNG, GIF, JPG, BMP, TGA, GD, GD2.
		 * 
		 * This function analyzes the input and decides whether to use wi_WideImage::loadFromHandle(),
		 * wi_WideImage::loadFromFile(), wi_WideImage::loadFromUpload() or wi_WideImage::loadFromString(),
		 * all of which you can also call directly to spare wi_WideImage some guessing.
		 * 
		 * Arrays are supported for upload fields; it returns an array of loaded images. 
		 * To load only a single image from an array field, use wi_WideImage::loadFromUpload('img', $i), 
		 * where $i is the index of the image you want to load.
		 * 
		 * <code>
		 * $img = wi_WideImage::load('http://url/image.png'); // image URL
		 * $img = wi_WideImage::load('/path/to/image.png'); // local file path
		 * $img = wi_WideImage::load('img'); // upload field name
		 * $img = wi_WideImage::load(imagecreatetruecolor(10, 10)); // a GD resource
		 * $img = wi_WideImage::load($image_data); // binary string containing image data
		 * </code>
		 * 
		 * @param mixed $source File name, url, HTML file input field name, binary string, or a GD image resource
		 * @return wi_WideImage_Image wi_WideImage_PaletteImage or wi_WideImage_TrueColorImage instance
		 */
		static function load($source)
		{
			$predictedSourceType = '';
			
			if ($source == '')
				$predictedSourceType = 'String';
			
			// Creating image via a valid resource
			if (!$predictedSourceType && self::isValidImageHandle($source))
				$predictedSourceType = 'Handle';
			
			// Check for binary string
			if (!$predictedSourceType)
			{
				// search first $binLength bytes (at a maximum) for ord<32 characters (binary image data)
				$binLength = 64;
				$sourceLength = strlen($source);
				$maxlen = ($sourceLength > $binLength) ? $binLength : $sourceLength;
				for ($i = 0; $i < $maxlen; $i++)
					if (ord($source[$i]) < 32)
					{
						$predictedSourceType = 'String';
						break;
					}
			}
			
			// Uploaded image (array uploads not supported)
			if (isset($_FILES[$source]) && isset($_FILES[$source]['tmp_name']))
				$predictedSourceType = 'Upload';
			
			// Otherwise, must be a file or an URL
			if (!$predictedSourceType)
				$predictedSourceType = 'File';
			
			return call_user_func(array('wi_WideImage', 'loadFrom' . $predictedSourceType), $source);
		}
		
		/**
		 * Create and load an image from a file or URL. The image format is auto-detected.
		 * 
		 * @param string $uri File or url
		 * @return wi_WideImage_Image wi_WideImage_PaletteImage or wi_WideImage_TrueColorImage instance
		 */
		static function loadFromFile($uri)
		{
			$data = file_get_contents($uri);
			$handle = @imagecreatefromstring($data);
			if (!self::isValidImageHandle($handle))
			{
				try
				{
					// try to find a mapper first
					$mapper = wi_WideImage_MapperFactory::selectMapper($uri);
					if ($mapper)
						$handle = $mapper->load($uri);
				}
				catch (wi_WideImage_UnsupportedFormatException $e)
				{
					// mapper not found
				}
				
				// try all custom mappers
				if (!self::isValidImageHandle($handle))
				{
					$custom_mappers = wi_WideImage_MapperFactory::getCustomMappers();
					foreach ($custom_mappers as $mime_type => $mapper_class)
					{
						$mapper = wi_WideImage_MapperFactory::selectMapper(null, $mime_type);
						$handle = $mapper->loadFromString($data);
						if (self::isValidImageHandle($handle))
							break;
					}
				}
			}
			
			if (!self::isValidImageHandle($handle))
				throw new wi_WideImage_InvalidImageSourceException("File '{$uri}' appears to be an invalid image source.");
			
			return self::loadFromHandle($handle);
		}
		
		/**
		 * Create and load an image from a string. Format is auto-detected.
		 * 
		 * @param string $string Binary data, i.e. from BLOB field in the database
		 * @return wi_WideImage_Image wi_WideImage_PaletteImage or wi_WideImage_TrueColorImage instance
		 */
		static function loadFromString($string)
		{
			if (strlen($string) < 128)
				throw new wi_WideImage_InvalidImageSourceException("String doesn't contain image data.");
			
			$handle = @imagecreatefromstring($string);
			if (!self::isValidImageHandle($handle))
			{
				$custom_mappers = wi_WideImage_MapperFactory::getCustomMappers();
				foreach ($custom_mappers as $mime_type => $mapper_class)
				{
					$mapper = wi_WideImage_MapperFactory::selectMapper(null, $mime_type);
					$handle = $mapper->loadFromString($string);
					if (self::isValidImageHandle($handle))
						break;
				}
			}
			
			if (!self::isValidImageHandle($handle))
				throw new wi_WideImage_InvalidImageSourceException("String doesn't contain valid image data.");
			
			return self::loadFromHandle($handle);
		}
		
		/**
		 * Create and load an image from an image handle.
		 * 
		 * <b>Note:</b> the resulting image object takes ownership of the passed 
		 * handle. When the newly-created image object is destroyed, the handle is 
		 * destroyed too, so it's not a valid image handle anymore. In order to 
		 * preserve the handle for use after object destruction, you have to call 
		 * wi_WideImage_Image::releaseHandle() on the created image instance prior to its
		 * destruction.
		 * 
		 * <code>
		 * $handle = imagecreatefrompng('file.png');
		 * $image = wi_WideImage::loadFromHandle($handle);
		 * </code>
		 * 
		 * @param resource $handle A valid GD image resource
		 * @return wi_WideImage_Image wi_WideImage_PaletteImage or wi_WideImage_TrueColorImage instance
		 */
		static function loadFromHandle($handle)
		{
			if (!self::isValidImageHandle($handle))
				throw new wi_WideImage_InvalidImageSourceException("Handle is not a valid GD image resource.");
			
			if (imageistruecolor($handle))
				return new wi_WideImage_TrueColorImage($handle);
			else
				return new wi_WideImage_PaletteImage($handle);
		}
		
		/**
		 * This method loads a file from the $_FILES array. The image format is auto-detected.
		 * 
		 * You only have to pass the field name as the parameter. For array fields, this function will
		 * return an array of image objects, unless you specify the $index parameter, which will
		 * load the desired image.
		 * 
		 * @param $field_name Name of the key in $_FILES array
		 * @param int $index The index of the file to load (if the input field is an array)
		 * @return wi_WideImage_Image The loaded image
		 */
		static function loadFromUpload($field_name, $index = null)
		{
			if (!array_key_exists($field_name, $_FILES))
				throw new wi_WideImage_InvalidImageSourceException("Upload field '{$field_name}' doesn't exist.");
			
			if (is_array($_FILES[$field_name]['tmp_name']))
			{
				if (isset($_FILES[$field_name]['tmp_name'][$index]))
					$filename = $_FILES[$field_name]['tmp_name'][$index];
				else
				{
					$result = array();
					foreach ($_FILES[$field_name]['tmp_name'] as $idx => $tmp_name)
						$result[$idx] = self::loadFromFile($tmp_name);
					return $result;
				}
			}
			else
				$filename = $_FILES[$field_name]['tmp_name'];
			
			if (!file_exists($filename))
				throw new wi_WideImage_InvalidImageSourceException("Uploaded file doesn't exist.");
			return self::loadFromFile($filename);
		}
		
		/**
		 * Factory method for creating a palette image
		 * 
		 * @param int $width
		 * @param int $height
		 * @return wi_WideImage_PaletteImage
		 */
		static function createPaletteImage($width, $height)
		{
			return wi_WideImage_PaletteImage::create($width, $height);
		}
		
		/**
		 * Factory method for creating a true-color image
		 * 
		 * @param int $width
		 * @param int $height
		 * @return wi_WideImage_TrueColorImage
		 */
		static function createTrueColorImage($width, $height)
		{
			return wi_WideImage_TrueColorImage::create($width, $height);
		}
		
		/**
		 * Check whether the given handle is a valid GD resource
		 * 
		 * @param mixed $handle The variable to check
		 * @return bool
		 */
		static function isValidImageHandle($handle)
		{
			return (is_resource($handle) && get_resource_type($handle) == 'gd');
		}
		
		/**
		 * Throws exception if the handle isn't a valid GD resource
		 * 
		 * @param mixed $handle The variable to check
		 */
		static function assertValidImageHandle($handle)
		{
			if (!self::isValidImageHandle($handle))
				throw new wi_WideImage_InvalidImageHandleException("{$handle} is not a valid image handle.");
		}
	}
	
	wi_WideImage::checkGD();
	
	wi_WideImage::registerCustomMapper('wi_WideImage_Mapper_BMP', 'image/bmp', 'bmp');
	wi_WideImage::registerCustomMapper('wi_WideImage_Mapper_TGA', 'image/tga', 'tga');
	