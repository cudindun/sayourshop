<?php namespace App\Http\Libraries;

use Storage;

class Upload {

	public static function saveImage($upload_path, $file)
	{
		$detectedType = exif_imagetype($file);
		$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
		$allow = in_array($detectedType, $allowedTypes);
		if($allow)
		{
			$file_name = str_random(3) . '-' . date('dmYhis') . '.' . $file->getClientOriginalExtension();
			$file_contents = \File::get($file);
			Storage::put($upload_path . 'original-' . $file_name, $file_contents);
			//resizing image
			foreach (\Config::get('resize-image.size') as $key => $value) {
				$image = new ImageResize(storage_path() . $upload_path . 'original-' . $file_name);
				$image->crop($value['width'], $value['height']);
				$image->save(storage_path() . $upload_path  . $value['width'] . 'x' . $value['height'] . '-' . $file_name);
			}
			return $file_name;
		} else {
			return "File tidak didukung!";
		}
		
	}

	public static function deleteImage($upload_path, $file)
	{
		foreach (\Config::get('resize-image.size') as $key => $value) {
			$filename = $value['width'] . 'x' . $value['height'] . "-" . $file;
			Storage::delete($upload_path."/".$filename);
		}
		Storage::delete($upload_path."/original-".$file);
		
	}


} 