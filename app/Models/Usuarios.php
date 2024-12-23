<?php namespace App\Models;
    use CodeIgniter\Model;

    class Usuarios extends Model{

        protected $table = 'Usuarios'; // Nombre exacto de la tabla en la base de datos
        protected $primaryKey = 'idUsuarios'; // Clave primaria de la tabla
        protected $allowedFields = ['usuario', 'password', 'nombres', 'apellidos', 'email', 'tipo_usuario']; // Campos permitidos para operaciones    

        public function obtenerUsuario($data){
            $Usuario = $this->db->table('Usuarios');
            $Usuario = $this->where($data);
            return $this->where($data)->findAll();
           // return $Usuariocdxdw->get()->gentResultArray();
        }
    }