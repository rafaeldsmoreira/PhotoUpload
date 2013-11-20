<?php


class createFolderClass {
   
    


public function  createFolder($directory,$user,$albumName){
        $result=false;
         if (!file_exists('../' . $directory . $user)) {
                //mkdir('../' . $directory . $user);
             
            
                
                $result=true;
            }

            if (!file_exists('../' . $directory . $user . '/' . $albumName)) {
                mkdir('../' . $directory . '/' . $user . '/' . $albumName);
                
                $result=true;
            }
            
                
return $result;
}
}

?>
