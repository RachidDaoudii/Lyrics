<?php

class artistesController extends artistesModel{

    public function Artistes(){
        return $this->getArtistes();
    }

    public function Add(Artistes $artists){
        return $this->addArtistes($artists);
    }

    public function Edit(Artistes $artists,$id){
        return $this->editArtistes($artists,$id);
    }

    public function Delete($id){
        return $this->deleteArtistes($id);
    }

}