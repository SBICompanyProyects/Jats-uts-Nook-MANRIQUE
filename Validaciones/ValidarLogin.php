<?php

class verificarUser
{
    private $nombre;
    private $Username;
    public function UsersExist($user, $pass)
    {
        include_once '../lib/ConexionBD.php';
        $md5 = md5($pass);

        $query = "SELECT * FROM usuarios WHERE Correo = '$user' and ClaveSeguridad = '$md5'";
        $ResUsers = mysqli_query($conexion, $query);
        if ($Row = mysqli_num_rows($ResUsers) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function setUser($user)
    {
        include_once '../lib/ConexionBD.php';
        $querySet = "SELECT * FROM usuarios WHERE Correo = '$user'";
        $ResSet = mysqli_query($conexion, $querySet);

        while ($rowSet = mysqli_fetch_assoc($ResSet)) {
            $this->nombre = $rowSet['Nombre'];
            $this->Username = $rowSet['Correo'];
        }
    }
    public function getNombre()
    {
        return $this->nombre;
    }

}
