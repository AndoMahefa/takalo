<?php
    defined('BASEPATH') or exit('No direct access');
    class Functions extends CI_Model {
        public function connexion($mail) {
            $requete =  "select * from user where email='".$mail."'";
            $result = $this->db->query($requete);
            $array = array();
            foreach($result->result_array() as $res){
                $array = array(
                    'id' => $res['id'],
                    'nom' => $res['nom'],
                    'mail' => $res['email'],
                    'mdp' => $res['password']
                );
            }
            return $array;
        }
        
        public function getMembre() {
            $requete =  "select * from user";
            $result = $this->db->query($requete);
            $array = array();
            foreach($result->result_array() as $res){
                $ar = array(
                    'id' => $res['id'],
                    'nom' => $res['nom'],
                    'mail' => $res['email'],
                    'mdp' => $res['password']
                );
                array_push($array,$ar);
            }
            return $array;
        }

        public function inscription($nom,$mail,$mdp){
            $requete = "insert into user values (default,'%s','%s','%s')";
            $requete = sprintf($requete,$nom,$mail,$mdp);
            $this->db->query($requete);
        }
        
        public function getId($mail){
            $requete = "select id from user where email='".$mail."'";
            $result = $this->db->query($requete);
            $id = $result->row_array();
            return $id;
        }

        public function updatePassword($id,$mdp){
            $requete = "update user set password='".$mdp."' where id='".$id."'";
            $this->db->query($requete);
        }
        public function objets(){
            $requete = "select * from objet";
            $result = $this->db->query($requete);
            $array = array();
            foreach($result->result_array() as $res){
                $ar = array(
                    "id" => $res['id'],
                    "nom" => $res['nom'],
                    "desc" => $res['description'],
                    "prix" => $res['prix'],
                    "idcate" => $res['idcategory'],
                    "iduser" => $res['iduser']
                );
                array_push($array,$ar);
            }
            return $array;
        }

        public function objetById($id){
            $requete = "select * from objet where id != ".$id;
            $result = $this->db->query($requete);
            $array = array();
            foreach($result->result_array() as $res){
                $ar = array(
                    "id" => $res['id'],
                    "nom" => $res['nom'],
                    "desc" => $res['description'],
                    "prix" => $res['prix'],
                    "idcate" => $res['idcategory'],
                    "iduser" => $res['iduser']
                );
                array_push($array,$ar);
            }
            return $array;
        }

        public function insertObjet($nom,$description,$prix,$idcate,$iduser){
            $requete = "insert into objet values(default,'%s','%s',%s,%s,%s)";
            $requete = sprintf($requete,$nom,$description,$prix,$idcate,$iduser);
            $this->db->query($requete);
        }
        public function Objet_getidbyNom($name){
            $requete = "select id from objet where nom='%s'";
            $requete = sprintf($requete,$name);
            $result = $this->db->query($requete);
            $id = $result->row_array();
            return $id;
        }
        public function uploadPhoto($files,$id){
            $dossier = 'assets/upload';
            foreach($files['name'] as $key => $value) {
              $fileName = $files['name'][$key];
              $fileTmpName = $files['tmp_name'][$key];
              $fileSize = $files['size'][$key];
              $fileError = $files['error'][$key];
              $fileType = $files['type'][$key];
          
              $fileExt = explode('.', $fileName);
              $fileActualExt = strtolower(end($fileExt));
          
              $allowed = array('jpg', 'jpeg', 'png', 'svg');
          
              if(in_array($fileActualExt, $allowed)) {
                if($fileError === 0) {
                  if($fileSize < 1000000) {
                    $fileDestination = $dossier.$fileName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $sql = "insert into photo values(default ,'%s', %s)";
                    $answer=sprintf($sql ,$fileName,$id) ;
                    $this->db->query($answer);
                  } else {
                    echo "Your file is too big!";
                  }
                } else {
                  echo "There was an error uploading your file!";
                }
              } else {
                echo "You cannot upload files of this type!";
              }
            }
          
        }

        public function category(){
            $requete = "select * from category";
            $result = $this->db->query($requete);
            $array = array();
            foreach($result->result_array() as $res){
                $ar = array(
                    "id" => $res['id'],
                    "nom" => $res['nom']
                );
                array_push($array,$ar);
            }
            return $array;
        }

        public function categoryById($id){
            $requete = "select * from category where id=".$id;
            $result = $this->db->query($requete);
            $array = array();
            foreach($result->result_array() as $res){
                $ar = array(
                    "id" => $res['id'],
                    "nom" => $res['nom']
                );
                array_push($array,$ar);
            }
            return $array;
        }

        public function idCate($nom){
            $requete = "select id from category where nom=".$nom;
            $result = $this->db->query($requete);
            $id = $result->row_array();
            return $id;
        }
    }
?>