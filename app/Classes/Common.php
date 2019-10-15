<?php

namespace App\Classes;

class Common {

	public static function findPlantAge($datetime, $full = false) {
		$now = new \DateTime("midnight");
		$ago = new \DateTime($datetime);
		$diff = $now->diff($ago);

		if($ago  <= $now) {
			$diff->w = floor($diff->d / 7);
			$diff->d -= $diff->w * 7;

			$string = array(
				'y' => 'tahun',
				'm' => 'bulan',
				'w' => 'minggu',
				'd' => 'hari',
			);
			foreach ($string as $k => &$v) {
				if ($diff->$k) {
					$v = $diff->$k . ' ' . $v;
				} else {
					unset($string[$k]);
				}
			}

			if (!$full) $string = array_slice($string, 0, 1);
			return $string ? implode(', ', $string) : 'Ditanam hari ini';
		}else{
			return "Belum ditanam";
		}
	}

	public static function generateCarouselImage($file) {
		$dirPath = 'images/species/';
		$srcPath = public_path($dirPath . $file);
        $dstPath = public_path($dirPath . 'thumbs/' . $file);
        $mime = self::getMime($srcPath);
        $image = $mime['create']($srcPath);
        
        $thumb_width = 482;
        $thumb_height = 332;

        $width = imagesx($image);
        $height = imagesy($image);

        $original_aspect = $width / $height;
        $thumb_aspect = $thumb_width / $thumb_height;

        if ( $original_aspect >= $thumb_aspect ) {
            // If image is wider than thumbnail (in aspect ratio sense)
            $new_height = $thumb_height;
            $new_width = $width / ($height / $thumb_height);
        } else {
            // If the thumbnail is wider than the image
            $new_width = $thumb_width;
            $new_height = $height / ($width / $thumb_width);
        }

        $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

        // Resize and crop
        imagecopyresampled($thumb,
                           $image,
                           0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                           0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                           0, 0,
                           $new_width, $new_height,
                           $width, $height);
        $mime['save']($thumb, $dstPath, $mime['quality']);
	}


	private static function getMime($file) {
		$data = [];
		$mime = getimagesize($file)['mime'];

		switch ($mime) {
            case 'image/jpeg':
                    $data['create'] = 'imagecreatefromjpeg';
                    $data['save'] = 'imagejpeg';
                    $data['quality'] = 80;
                    break;

            case 'image/png':
                    $data['create'] = 'imagecreatefrompng';
                    $data['save'] = 'imagepng';
                    $data['quality'] = 8;
                    break;

            case 'image/gif':
                    $data['create'] = 'imagecreatefromgif';
                    $data['save'] = 'imagegif';
                    $data['quality'] = 90;
                    break;

            default: 
                    throw new Exception('Unknown image type.');
    	}

    	return $data;

	}
	
}