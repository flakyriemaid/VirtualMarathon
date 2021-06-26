<?php
 require_once "controller/services/mysqlDB.php";
 require_once "view/view2.php";
 require_once "model/track.php";

    class tracksController{
        
        protected $db;

        public function __construct (){
            $this->db= new mySQLDB("localhost","root","","tugasbesar");
        }

        public function viewAll(){
            $result = $this->getAllTracks();
            $region = $this->getRegion();
            return View2::createView("tracks.php",["result"=>$result,"regionList"=>$region]);
    
        }

        public function getRegion(){
            $query = "SELECT DISTINCT(region)
                        FROM track t
                     ";
            
            $query_result = $this->db->executeSelectQuery($query);
            return $query_result;
        }

        public function getAllTracks(){
            $query = "SELECT *
                        FROM track t
                     ";
            
            $query_result = $this->db->executeSelectQuery($query);
            $result = [];
            foreach($query_result as $key => $value){
                $result[] = new track($value["idT"],$value["harga"],$value["gambar"],$value["jarak"]
                ,$value["tema"],$value["region"],$value["gambarMedali"],$value["gambarBadge"]);
            }
           
            return $result;
        }

        public function viewFilter(){
            $result = $this->getFilterTracks();
            $region = $this->getRegion();
            return View2::createView("tracks.php",["result"=>$result,"regionList"=>$region]);
    
        }

        public function getFilterTracks(){
            if(isset($_POST)){
                if(isset($_POST['namaTrack']) && $_POST['namaTrack'] != ''){
                    $FilterRegion = $_POST['namaTrack'];
                    $min = $_POST['min'];
                    $max = $_POST['max'];
                    $Region_Change = true;
                    $queryfilter = "SELECT *
                        FROM track t
                        WHERE region = '$FilterRegion' AND jarak > '$min' AND jarak < '$max'
                     ";

                    if(isset($_POST['searchTrack']) && $_POST['searchTrack'] != ''){
                        $search = $_POST['searchTrack'];
                        $queryfilter = "SELECT *
                            FROM track t
                            WHERE region = '$FilterRegion' AND jarak > '$min' AND jarak < '$max' AND tema LIKE '%$search%'
                        ";
                    }
                }else if(isset($_POST['searchTrack']) && $_POST['searchTrack'] != ''){
                    $search = $_POST['searchTrack'];
                    $queryfilter = "SELECT *
                        FROM track t
                        WHERE  tema LIKE '%$search%'
                    ";
                }else{
                    $min = $_POST['min'];
                    $max = $_POST['max'];
                    $queryfilter = "SELECT *
                            FROM track t
                            WHERE jarak > '$min' AND jarak < '$max'
                         ";
                }
            }
            
            $query_resultFilter = $this->db->executeSelectQuery($queryfilter);
            $resultfilter = [];
            foreach($query_resultFilter as $key => $value){
                $resultfilter[] = new track($value["idT"],$value["harga"],$value["gambar"],$value["jarak"]
                ,$value["tema"],$value["region"],$value["gambarMedali"],$value["gambarBadge"]);
            }
           
            return $resultfilter;
        }

       
        }
