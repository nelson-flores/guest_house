<?php

namespace App\Livewire\Admin\Gallery;


use App\Models\Media;
use Livewire\Component;
use App\Models\Message;
use Livewire\Attributes\Computed; 
use Livewire\Attributes\Layout;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

#[Layout("components.layouts.admin",['title'=>"Posts"])]
class Add extends Component
{
    public $photos = [];

    public function render()
    {
        return view('livewire.admin.gallery.add');
    }


    public function submit()
    {
        foreach ($this->photos as $i => $photo) {
            $photo = Storage::disk('public')->putFile('gallery', new File($photo['path']));
            $name =  uniqid().'.jpg';
            $thumb = $this->c_image(storage_path('app/public/' . $photo), storage_path('app/public/' .$name), 75,400,400,true);
            Media::create([
                'file_path' => 'storage/' . $photo,
                'thumbnail_path' => 'storage/' .  $name,
                'title'=>'#',
                'description'=>'#',
            ]);
        }

        session()->flash('message', 'Fotos adicionadas com sucesso!');
        $this->reset('photos','album_id');
    }








    function c_image($source_url, $destination_url, $quality = 100, $w = 500, $h = 500, $crop = false, $overwrite = true)
    {
        if ($overwrite == false) {
            if (file_exists($destination_url) and is_file($destination_url)) {
                return true;
            }
        }
        $info = getimagesize($source_url);
        list($width, $height) = $info;
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width - ($width * abs($r - $w / $h)));
            } else {
                $height = ceil($height - ($height * abs($r - $w / $h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w / $h > $r) {
                $newwidth = $h * $r;
                $newheight = $h;
            } else {
                $newheight = $w / $r;
                $newwidth = $w;
            }
        }

        if ($info["mime"] == "image/jpeg") {
            $image = imagecreatefromjpeg($source_url);
        } elseif ($info["mime"] == "image/gif") {
            $image = imagecreatefromgif($source_url);
        } elseif ($info["mime"] == "image/png") {
            $image = imagecreatefrompng($source_url);
        } else {
            $image = imagecreatetruecolor($newwidth, $newheight);
        }

        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $image, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        imagejpeg($dst, $destination_url, $quality);
        return $destination_url;
    }
}
