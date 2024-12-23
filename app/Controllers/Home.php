<?php

namespace App\Controllers;

use App\Models\AclModel; // Usar AclModel

class Home extends BaseController
{
    public function index(): string
    {
        $mensaje = session('mensaje');
        return view('login', ["mensaje" => $mensaje]);
    }

    public function inicio()
    {
        $session = session();

        // Verificar si el usuario tiene rol de user
        if ($session->get('role_id') != 2) {
            // Redirigir al usuario a "Acceso Denegado" si no es user
            return redirect()->to(base_url('/no_permission'));
        }
        // Mostrar la vista de usuario si el rol es válido
        return view('inicio');
    }

    public function noPermission()
    {
        return view('no_permission'); // Crear una vista para mostrar "Acceso Denegado"
    }

    public function admin()
    {
        $session = session();

        // Verificar si el usuario tiene rol de admin
        if ($session->get('role_id') != 1) {
            // Redirigir al usuario a "Acceso Denegado" si no es admin
            return redirect()->to(base_url('/no_permission'));
        }

        // Mostrar la vista de administrador si el rol es válido
        return view('admin');
    }

    public function login()
    {
        // Recibir datos del formulario
        $usuario = $this->request->getPost('usuario');
        $password = $this->request->getPost('password');

        // Instanciar el modelo
        $AclModel = new \App\Models\AclModel();
        $datosUsuario = $AclModel->obtenerUsuario(['username' => $usuario]);

        // Validar credenciales
        if (count($datosUsuario) > 0 && password_verify($password, $datosUsuario[0]['password'])) {
            // Guardar datos en la sesión
            $session = session();
            $session->set([
                "id" => $datosUsuario[0]['id'], // ID del usuario
                "usuario" => $datosUsuario[0]['username'],
                "role_id" => $datosUsuario[0]['role_id'] // Rol del usuario
            ]);

            // Redirigir según el rol
            if ($datosUsuario[0]['role_id'] == 1) { // Admin
                return redirect()->to(base_url('/admin')); // Ruta de admin
            } elseif ($datosUsuario[0]['role_id'] == 2) { // User
                return redirect()->to(base_url('/inicio')); // Ruta de usuario
            } else {
                // Rol desconocido: redirigir a acceso denegado
                return redirect()->to(base_url('/no_permission'));
            }
        } else {
            // Credenciales incorrectas
            return redirect()->to(base_url('/'))->with('mensaje', 'Usuario o contraseña incorrectos.');
        }
    }

    public function consultarEstudiante()
    {
        $session = session();

        // Verificar si el usuario tiene rol de admin
        if ($session->get('role_id') != 2) {
            return redirect()->to(base_url('/no_permission'));
        }

        // Obtener el código del estudiante desde el formulario
        $codigoEstudiante = $this->request->getPost('codigo');
        
        // Validar que el código no esté vacío
        if (empty($codigoEstudiante)) {
            return redirect()->back()->with('error', 'Por favor ingresa un código de estudiante');
        }

        // Llamada a la API de Strapi
        $url = 'http://34.67.217.173:1337/api/finuxfinesis?filters[Codigo][$eq]=' . $codigoEstudiante;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Opcional si tienes problemas con SSL
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        // Manejar la respuesta de la API
        if (isset($data['data'][0])) {
            $estudiante = $data['data'][0];
            return view('inicio', [
                'nombres' => $estudiante['Nombres'],
                'apellidos' => $estudiante['Apellidos'],
                'correo' => $estudiante['CorreoInstitucional'],
                'celular' => $estudiante['Celular']
            ]);
        } else {
            return view('inicio', ['error' => 'Estudiante no encontrado.']);
        }
    }

    public function consultarDNI()
        {
            // Verificar si el usuario tiene rol de admin
            $session = session();
            if ($session->get('role_id') != 1) {
                // Redirigir a "Acceso Denegado" si no es admin
                return redirect()->to(base_url('/no_permission'));
            }

            // Obtener el DNI desde el formulario
            $dni = $this->request->getPost('dni');
            
            // Validar que el DNI no esté vacío
            if (empty($dni)) {
                return redirect()->back()->with('error', 'Por favor ingresa un número de DNI');
            }

            // Token de la API
            $token = 'apis-token-11902.pdect35br18u4qfOY32SlAiD745fr8i4';

            // Llamada a la API
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.apis.net.pe/v2/reniec/dni?numero=' . $dni,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 2,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Referer: https://apis.net.pe/consulta-dni-api',
                    'Authorization: Bearer ' . $token
                ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);

            // Decodificar la respuesta
            $persona = json_decode($response);

            // Verificar si la respuesta es válida
            if (isset($persona->nombres)) {
                return view('admin', ['persona' => $persona]);
            } else {
                return view('admin', ['error' => 'No se encontraron datos para el DNI proporcionado.']);
            }
        }

    public function salir()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}
