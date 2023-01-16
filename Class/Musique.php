<?php
class Musique{
    private $title;
    private $song;
    private $Add_the;
    private $duration;

    public function __construct($title,$song,$Add_the,$duration)
    {
        $this->title = $title;
        $this->song = $song;
        $this->Add_the = $Add_the;
        $this->duration = $duration;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getSong()
    {
        return $this->song;
    }

    public function setSong($song)
    {
        $this->song = $song;
    }

    public function getDate()
    {
        return $this->Add_the;
    }

    public function setDate($Add_the)
    {
        $this->Add_the = $Add_the;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
    }
}