<?php

class songController extends songModel{

    public function songs(){
        return $this->getSongs();
    }

    public function Add(Musique $song,$Artist,$Category){
        return $this->addSong($song,$Artist,$Category);
    }

    public function Edit(Musique $song,$artist,$category,$id){
        return $this->editSong($song,$artist,$category,$id);
    }

    public function Delete($id){
        return $this->deleteSong($id);
    }

}