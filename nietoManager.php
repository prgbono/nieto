<?php
header('Access-Control-Allow-Origin: *');
//header('Content-Type: text/html;charset=utf-8');
class nietoManager {
    //VBLES GLOBALES
    private $link;  //conexión con la BBDD
    //El constructor es la primera función que se llama cd se instancia un objeto
    function __construct() {
        //Crear la conexión con la BBDD
        //vbles que necesitamos: nombre BBDD, usuario, pass, host
        
        //MAMP
        $database = "nieto";
        $user = "root";
        $password = "root";
        $host = "localhost";
        
        //rios.esy.es
        /*$database = "u994084025_nieto";
        $user = "u994084025_qui38";
        $password = "nietoDB1";
        $host = "mysql.hostinger.es";*/
        
        //PRODUCCIÓN
        /*$database = "";
        $user = "";
        $password = "";
        $host = "mysql.hostinger.es";*/
        
        //Conexión
        mysqli_connect($host, $user, $password, $database);
        //Acceso a una vble global en PHP $this->Vble_global. 
        //En este caso meter el resultado de la conexión en la vble global link. Mysqli_connect contiene la conexión a la BBDD que la vamos a necesitar en el resto de funciones
        $this->link=mysqli_connect($host, $user, $password, $database);
         //es como si hiciera esto: $link=mysqli_connect($host, $user, $password, $database);
    }
    
    
    public function listarClientes(){
        $sql="SELECT * FROM pruebas_clientes ORDER BY nombre";
        $result = mysqli_query($this->link, $sql);
        $output = array();
        while($row = mysqli_fetch_assoc($result)){
            //La instrucción anterior devuelve cada registro como un array asociativo            
            //$output[]=$row;
            //COnla instrucción anterior no traemos las tildes
            $output[]=array_map('utf8_encode', $row);
        }
        echo '{"clientes":'.json_encode(utf8_encode($output)).'}';
        //En PHP se concatena con . no con +
        
        //Falta el close connection mysqli_close(mysqli_connect($host, $user, $password, $database)) or die("Error en la DCX");
    }
    
    
    public function crearEmpresa($nombre, $codigo, $gerente, $fecha_creacion, $logo, $LE, $notificaciones){
        //1º. Crear sentencia SQL
        $sql="INSERT INTO empresas (nombre, codigo, gerente, fecha_creacion, logo, LE, notificaciones) VALUES ('$nombre','$codigo','$gerente','$fecha_creacion','$logo','$LE', '$notificaciones')";
        //2º. Ejecutar la sentencia en la BBDD
        mysqli_query($this->link, $sql); //ojo que por defecto NetBeans busca la vble link dentro de la función setMessage. Hay que decirle que es la global precediéndole $this->
        echo $sql;
    }
    public function buscarE($nombre){
        //1º Crear la sentencia SQL
        $sql = "SELECT * FROM empresas WHERE nombre='$nombre'";
        //En caso de que la E exista devolverá un sólo registro por lo que no es necesario un bucle 
        $result = mysqli_query($this->link, $sql);
        if (mysqli_num_rows($result)>0){
            //Ya existe
            echo -1;
        }else{
            echo 1;
        }   
    }
    public function validarCodigo($codigo){
        //1º Crear la sentencia SQL
        $sql = "SELECT * FROM empresas WHERE codigo='$codigo'";
        //En caso de que exista E con dicho código devolverá un sólo registro por lo que no es necesario un bucle 
        $result = mysqli_query($this->link, $sql);
        if (mysqli_num_rows($result)==1){
            //Código válido, la E existe
            echo 1;
        }   
    }
    public function obtenerNombreE($codigo){
        //1º Crear la sentencia SQL
        $sql = "SELECT nombre FROM empresas WHERE codigo='$codigo'";
        //devolverá un sólo registro por lo que no es necesario un bucle 
        $result = mysqli_query($this->link, $sql);
        $fila= mysqli_fetch_assoc($result);
        echo $fila['nombre'];
          
    }
    public function obtenerId($codigo){
        //1º Crear la sentencia SQL
        $sql = "SELECT id FROM empresas WHERE codigo='$codigo'";
        //devolverá un sólo registro por lo que no es necesario un bucle 
        $result = mysqli_query($this->link, $sql);
        $fila= mysqli_fetch_assoc($result);
        echo $fila['id'];      
    }
    public function altaUsuario($nombreU, $apellidos, $correo, $id_E, $pass){
        $sql="INSERT INTO usuarios (nombre, apellidos, correo, id_E, pass) VALUES ('$nombreU','$apellidos','$correo','$id_E','$pass')";
        //mysqli_query($this->link, $sql);
        //La función mysqli_query devuelve el nº de filas afectadas
        $result = mysqli_query($this->link, $sql);
        echo $result;
    }
    public function obtenerE(){
        $sql="SELECT * FROM empresas ORDER BY nombre";
        $result = mysqli_query($this->link, $sql);
        //Crear JSON
        $output = array();
        while($fila = mysqli_fetch_assoc($result)){
            //La instrucción anterior devuelve cada registro como un array asociativo
            $output[] = $fila; 
        }
        //echo '{"empresas":'.json_encode($output).'}';
        echo json_encode($output);
    }
    public function listarPedidos($id_E){
        $sql="SELECT * FROM pedidos WHERE id_E='$id_E' ORDER BY id DESC";
        $result = mysqli_query($this->link, $sql);
        //Crear JSON
        $output = array();
        while($fila = mysqli_fetch_assoc($result)){
            //La instrucción anterior devuelve cada registro como un array asociativo
            $output[] = $fila; 
        }
        echo json_encode($output);
    }
    public function obtenerNombreCli($id_Cli){
       $sql="SELECT nombre, apellidos FROM clientes WHERE id=$id_Cli";  
       //devolverá un sólo registro por lo que no es necesario un bucle 
       $result = mysqli_query($this->link, $sql);
       $fila= mysqli_fetch_assoc($result);
       echo ($fila['nombre']." ".$fila['apellidos']);   
    }
    public function obtenerClientes($id_E){
        $sql="SELECT * FROM clientes WHERE id_E='$id_E' ORDER BY nombre";
        $result = mysqli_query($this->link, $sql);
        //Crear JSON
        $output = array();
        while($fila = mysqli_fetch_assoc($result)){
            //La instrucción anterior devuelve cada registro como un array asociativo
            $output[] = $fila; 
        }
        echo json_encode($output);
    }
    public function obtenerCat($id_E){
        $sql="SELECT * FROM categorias WHERE id_E='$id_E' ORDER BY nombre";
        $result = mysqli_query($this->link, $sql);
        //Crear JSON
        $output = array();
        while($fila = mysqli_fetch_assoc($result)){
            //La instrucción anterior devuelve cada registro como un array asociativo
            $output[] = $fila; 
        }
        echo json_encode($output);
    }
    public function obtenerEsp($id_Cat){
        $sql="SELECT * FROM especialidades WHERE id_Cat='$id_Cat' ORDER BY especialidad";
        $result = mysqli_query($this->link, $sql);
        //Crear JSON
        $output = array();
        while($fila = mysqli_fetch_assoc($result)){
            //La instrucción anterior devuelve cada registro como un array asociativo
            $output[] = $fila; 
        }
        echo json_encode($output);
    }
    
}





