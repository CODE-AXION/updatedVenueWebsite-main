<?php

namespace App\Services;

class ImageUploadService{

  public $image;
  public $path;
  public $obj;
  public $imageName;
  
    function __construct(object $obj = null,$image = null,$path = null) 
    {    
        $this->obj = $obj; 
        $this->image = $image;   
        $this->path = $path;
    }

    public function uploadImage()
    {

        if($this->image && $this->image !== null){
            

            $this->imageName = $this->path .'/'. $this->image->hashName();

            $this->image->move(public_path($this->path), $this->imageName );
            
            return $this;
            
        }           

        return $this;
    }
    
    public function storeImageDB($fieldName)
    {

        if($fieldName && $this->image){
                                   
            $this->obj->{$fieldName} = $this->imageName;

            //result: $this->obj->avatar = '/product_images/0Dq4n3h0frEhi8AQCJULdtz.png/'
            
            return $this->obj;
        }

        return $this;
        
    }

    public function deleteImage($fieldName)
    {
        $storePath = public_path($this->obj->{$fieldName}); 

        if($this->obj->{$fieldName} && file_exists($storePath)){

            //unlink method will delete the image from the folder
            unlink(public_path($this->obj->{$fieldName}));
        
            return $this;
        }

        return $this;
        
    }

    public function moveImage($fieldName, $currentFolder, $newFolder)
    {
   
        $file = ltrim($this->obj->{$fieldName} , $currentFolder . '/');

        \File::copy(public_path($this->obj->{$fieldName}), public_path( $newFolder . '/' . $file));
        
        \File::delete($this->obj->{$fieldName});

        return $this;
    }
}