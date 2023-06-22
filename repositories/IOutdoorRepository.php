<?php

include_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/Outdoor.php';

interface IOutdoorRepository {
    public function inserirOutdoor(Outdoor $outdoor);
    public function listarOutdoor();
    public function apagarOutdoor($id);
}
