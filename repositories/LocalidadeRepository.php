<?php

require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/dbConfig/Db.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/repositories/ILocalidadeRepository.php';

class LocalidadeRepository implements ILocalidadeRepository {

    public function getProvincia() {

        try {
            $query = 'SELECT * FROM provincia';
            $stmt = Db::getConn()->prepare($query);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $row['nome'] . "'>" . $row['nome'] . "</option>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getNacionalidade() {
        try{
            $query = 'SELECT * FROM nacionalidade';
            $stmt = Db::getConn()->prepare($query);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $row['nome'] . "'>" . $row['nome'] . "</option>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}
