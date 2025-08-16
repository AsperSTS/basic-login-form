
<?php
    session_start();
    class Alumno {
        //Propiedade/atributos/variables de objeto
        //Privadas
        private $nombre;
        private $especialidad;
        private $semestre;
        private $numeroDeControl;
        //Metodos/funciones
        //Publicos
        public function setNombre($nombre) {
            $this->nombre=$nombre;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function setEspecialidad($especialidad) {
            $this->especialidad=$especialidad;
        }
        public function getEspecialidad() {
            return $this->especialidad;
        }
        public function setSemestre($semestre) {
           $this->semestre=$semestre;
        }
        public function getSemestre() {
            return $this->semestre;
        }
        public function setNumeroControl($numeroControl) {
            $this->numeroControl=$numeroControl;
        }
        public function getNumeroControl() {
            return $this->numeroControl;
        }      
    }
    class Cuenta {
        private $usuario;
        private $contrasena;
        public function setContrasena($contrasena) {
            $this->contrasena = $contrasena;
        }
        public function getContrasena() {
            return $this->contrasena;
        }
        public function setUsuario($usuario) {
            $this->usuario = $usuario;
        }
        public function getUsuario() {
            return $this->usuario;
        }
    }
    //creamos objeto de tipo alumno
      
    
    //creamos objeto de tipo cuenta
    if(isset($_POST['botonIniciarSesion'])){
        if(!empty($_POST['Usuario']) && !empty($_POST['Contrasena'])){
            $cuenta = new Cuenta();
            $cuenta->setContrasena($_POST["Contrasena"]);
            $cuenta->setUsuario($_POST["Usuario"]);;
            $baseDeDatos = new baseDeDatos();
            $baseDeDatos->validarUsuario($cuenta);
        }
    }
    
    if(!empty($_POST['nombre']) && !empty($_POST['especialidad']) && !empty($_POST['semestre']) && !empty($_POST['numeroControl'])){
        $alumno =new Alumno();
        $alumno->setNombre($_POST['nombre']);
        $alumno->setEspecialidad($_POST['especialidad']);  
        $alumno->setSemestre($_POST['semestre']);
        $alumno->setNumeroControl($_POST['numeroControl']);
        $baseDeDatos = new baseDeDatos();
        $baseDeDatos ->guardarAlumno($alumno);
    }
        class baseDeDatos {
        private $ip = "127.0.0.1";
        private $baseDeDatos = "sesion";
        private $usuario = "root";
        private $contrasena = "";
        private $sentencia;
        
        public function guardarAlumno($alumno) {
          $conexionBaseDeDatos = new mysqli($this->ip,$this->usuario,$this->contrasena,$this->baseDeDatos);
          $consultaSql ="INSERT INTO reinscripciones(nombre,especialidad,semestre,numeroDeControl)VALUES (?,?,?,?)";
          $sentencia = $conexionBaseDeDatos ->prepare($consultaSql);
          $sentencia->bind_param("ssss",$val1,$val2,$val3,$val4);
          $val1 = $alumno->getNombre();
          $val2 = $alumno->getEspecialidad();
          $val3 = $alumno->getSemestre();
          $val4 = $alumno->getNumeroControl();
          $sentencia->execute();

          if($conexionBaseDeDatos-> affected_rows == 1){
            echo "<script>alert('Registro Completado');</script>";
            header("Location: menuDeOpciones.php");
        } else {
            echo "<script>alert('Porfavor ingrese valores validos.');</script>";
            header("Location: vistaReinscribir.php");
        }
        $sentencia->close();
          $conexionBaseDeDatos->close();   
        }
        public function validarUsuario($cuenta){
            $conexionBaseDeDatos = new mysqli($this->ip,$this->usuario,$this->contrasena,$this->baseDeDatos);
            $consultaSql = "SELECT usuario, contrasena from cuenta where usuario=? AND contrasena=? LIMIT 1";
            $sentencia = $conexionBaseDeDatos ->prepare($consultaSql);
            $sentencia->bind_param("ss",$val1,$val2);
            $val1 = $cuenta->getUsuario();
            echo $val1.'<br>';
            $val2 = $cuenta->getContrasena();
            echo $val2.'<br>';
            $sentencia->execute();
            $sentencia->store_result();

            if($sentencia->fetch()>0){
                $_SESSION['login_user'] = $cuenta->getUsuario();
                header("Location: menuDeOpciones.php");
            }
            else {
                header("Location: vistaLogin.php");
            }
            $sentencia->close();
        }
    }
?>
