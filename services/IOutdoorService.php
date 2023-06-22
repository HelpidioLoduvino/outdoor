<?php
include_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/Outdoor.php';

interface IOutdoorService {
    public function insertOutdoor(Outdoor $outdoor);
    public function listOutdoor();
    public function deletarOutdoor($id);
}
