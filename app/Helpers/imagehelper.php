<?php
    function imagefunction($req,$bookmodel){
        $image = $req->file('image');
        $imageName = time().'.'.$image->extension();
        $req->image->move(public_path('images'), $imageName);
        $bookmodel->image = $imageName;
    }
?>