<?php namespace Traits\Upload;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait ImageUpload {

    protected $files = [];
    protected $image_field = 'image';
    protected $related_image_table = 'images';


    public function storeOneImage()
    {
        $this->{$this->image_field} = $this->saveFile($this->{$this->image_field});
        $this->save();
    }

    public function storeManyImages($images, $object_name, $field_name) {
        if (count($images)) {
            $attachments = [];
            foreach ($images as $image) {
                $attachments[] = new $object_name([$field_name => $this->saveFile($image)]);
            }
            $this->{$this->related_image_table}()->saveMany($attachments);
        }
    }

    private function saveFile($raw_image, $sub_folder = "") {
        $file_name = str_random() . '.' . $raw_image->getClientOriginalExtension();
        $file_path = $this->table . "/" .$this->id . "/" . $sub_folder . $file_name;
        Storage::disk('local')->put($file_path, File::get($raw_image));
        return $file_name;
    }

}