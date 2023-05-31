<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    require_once("../Config/db.php");
    require_once("../Config/Conectar.php");

    class Estudiante extends Conectar{
        private $id;
        private $nombres;
        private $direccion;
        private $logros;
        private $skills;
        private $ingles;
        private $ser;
        private $rewiew;
        private $especialidad;
        /* protected $dbCnx; */

        public function __construct($id = 0, $nombres = "",$direccion = "",$logros = "", $skills = "", $ingles = "", $ser = "", $rewiew = "", $especialidad = "", $dbCnx= "")
        {
            $this->id = $id;
            $this->nombres = $nombres;
            $this->direccion = $direccion;
            $this->logros = $logros;
            $this->skills = $skills;
            $this->ingles = $ingles;
            $this->ser = $ser;
            $this->rewiew = $rewiew;
            $this->especialidad = $especialidad;
            parent::__construct($dbCnx);
            /* $this->dbCnx = new PDO(DB_TYPE. ":host=".DB_HOST.";dbname=".DB_NAME, DB_USER,DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]); */
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getId()
        {
            return $this->id;
        }

        public function setNombres($nombres)
        {
            $this->nombres = $nombres;
        }

        public function getNombres()
        {
            $this->nombres;
        }
        public function setDireccion($direccion)
        {
            $this->direccion = $direccion;
        }

        public function getDireccion()
        {
            $this->direccion;
        }
        public function setLogros($logros)
        {
            $this->logros = $logros;
        }

        public function getLogros()
        {
            $this->logros;
        }
        public function setSkills($skills)
        {
            $this->skills = $skills;
        }
        public function getSkills()
        {
            $this->skills;
        }

        public function setIngles($ingles)
        {
            $this->ingles = $ingles;
        }
        public function getIngles()
        {
            $this->ingles;
        }

        public function setSer($ser)
        {
            $this->ser = $ser;
        }

        public function getSer()
        {
            $this->ser;
        }

        public function setRewiew($rewiew)
        {
            $this->rewiew = $rewiew;
        }

        public function getRewiew()
        {
            $this->rewiew;
        }

        public function setEspecialidad($especialidad)
        {
            $this->especialidad = $especialidad;
        }
        public function getEspecialidad()
        {
            $this->especialidad;
        }




        public function insertData()
        {
            try {
                $stm = $this-> dbCnx -> prepare("INSERT INTO campers (NOMBRES,dirrecion,logros, skills, ingles, ser, rewiew, especialidad) values(?,?,?,?,?,?,?,?)");
                $stm -> execute([$this->nombres, $this->direccion, $this->logros, $this->skills, $this->ingles, $this->ser, $this->rewiew, $this->especialidad,]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        
        public function selectAll()
        {
            try {
                $stm = $this->dbCnx->prepare ("SELECT * FROM campers");
                $stm->execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }

        public function delete()
        {
            try {
                $stm = $this->dbCnx->prepare ("DELETE FROM campers WHERE id=?");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert('Ha sido Borrado Exitosamente');document.location='estudiantes.php'</script>";
            } catch (Expection $e) {
                return $e ->getMessage();
            }
        }

        public function selectOne()
        {
            try {
                $stm = $this->dbCnx->prepare ("SELECT * FROM campers WHERE id=?");
                $stm -> execute([$this->id]);
                return $stm ->fetchAll();
            } catch (Expection $e) {
                return $e ->getMessage();
            }
        }
        public function update()
        {
            try {
                $stm = $this->dbCnx->prepare ("UPDATE campers SET NOMBRES = ?, dirrecion = ?, logros = ?, skills = ?, ingles = ?, ser = ?, rewiew = ?, especialidad = ? WHERE id=?");
                $stm -> execute([$this->nombres, $this->direccion,$this->logros, $this->skills, $this->ingles, $this->ser, $this->rewiew, $this->especialidad, $this->id]); // No se usa el return Para añadir un dato
            } catch (Expection $e) {
                return $e ->getMessage();
            }
            
        }
    }

?>