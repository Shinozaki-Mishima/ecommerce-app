<?php

function startValidation($images) 
{
    foreach ($images as $image) {
        if(!isSelected($image->input_name)) {
            if($image->required){
                echo "one image is required";
                return false;
            }
            continue;
        }
        $image->selected = 1;
        $image->new_name = getFileName($image->input_name, "products");
    }

    //Debugger::debug($images);
    return true;
}

function startUpload($images) 
{

    foreach ($images as $image) {

        // upload file if it is selected
        if ($image->selected && !upload($image->full_path, $image->input_name, $image->new_name)) {
            return false;
        }
        // remove prev files
        if ($image->selected && $image->prev_name != "") {
            removeFile($image->full_path, $image->prev_name);
        }

        if (!$image->selected) {
            $image->new_name = ($image->prev_name == "none") ? "" : $image->prev_name;
        }
    }
    return true;
}

function removeFile($full_path, $filename) 
{
    if (file_exists($full_path . $filename)) {
        unlink($full_path . $filename);
    }
    return true;
}

function isSelected($filename) 
{
    if ($_FILES[$filename]["error"] != 0) {
        return false;
    }

    return true;
}

function getFileName($filename, $upload_folder) 
{
    $new_name = "error";
    $target_dir = "images/$upload_folder/";
    $target_file = $target_dir . basename($_FILES[$filename]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES[$filename]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES[$filename]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // https://stackoverflow.com/questions/1846202/how-to-generate-a-random-unique-alphanumeric-string
    $bytes = random_bytes(15);
    $name = bin2hex($bytes);

    $new_name = $target_dir . $name . "." . $imageFileType;

    return $new_name;
}  // end of function

// prev_name is the input name
function upload($full_path, $old_name, $new_name) 
{
    $full_name = $full_path . $new_name;

    // if everything is ok, try to upload file
    if (move_uploaded_file($_FILES[$old_name]["tmp_name"], $full_name)) {
        echo "The file uplaod " . $full_name;
    } else {
        echo "Sorry, there was an error uploading your file.";
        return false;
    }
    return true;
} // end of function