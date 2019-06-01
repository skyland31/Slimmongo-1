<?php
require_once '/../models/Model.php';
class StudentController
{
   function student(){
         $db = new Model();
         $cursorSTD = $db->getAllStudent();
         $cursorCourse = 

         $arrStudent = [];
         foreach( $cursorSTD as $key => $value){         
               $studentData = [
                  "id" => $value["_id"],
                  "STDid" => $value["stuid"],
                  "name" => $value["name"],
                  "gender" => $value["gender"]
                ];
               array_push($arrStudent,$studentData);
            }

        response(200, $arrStudent);

        
   }
   function course(){
      $db = new Model();
      $cursorCourse = $db->getAllCourse();

      $arrCourse = [];
      foreach( $cursorCourse as $key => $value){         
            $CourseData = [
              "id" => $value["_id"],
              "Course" => $value["subject_id"],
              "name" => $value["name"],
              "state" => $value["state"]
            ];
            array_push($arrCourse,$CourseData);
        }

    response(200, $arrCourse);

    
  }

   /*function findByName($name){
      $db = new Model();
      $cursorSTD = $db->findByName($name);
      response(200, $cursorSTD);
   }*/

   function searchSTD($request){
      // $name = $request->post('name');
      $idstd = $request->post('stuid');
      $db = new Model();
      $cursorSTD = $db->searchSTD($idstd);
      $arrStudent = [];
         foreach( $cursorSTD as $key => $value){         
               $studentData = [
                  "id" => $value["_id"],
                  "STDid" => $value["stuid"],
                  "name" => $value["name"],
                  "gender" => $value["gender"],
                  "register" => $value["register"]
                ];
               array_push($arrStudent,$studentData);
            }

        response(200, $arrStudent);
   }
   function searchCourse($request){
      $idCourse = $request->post('courseid');
      $db = new Model();
      $cursorCourse = $db->searchCourse($idCourse);
      $arrCourse = [];
        foreach( $cursorCourse as $key => $value){         
              $courseData = [
                "id" => $value["_id"],
                "Course" => $value["subject_id"],
                "name" => $value["name"],
                "state" => $value["state"]
                ];
              array_push($arrCourse,$courseData);
            }

        response(200, $arrCourse);
  }

   /*public function insert($request){
      $stuid = $request->post('stuid');
      $course = $request->post('courseid');
      
      $db = new Model();
      $result = $db->insert($stuid , $course);*/
      // $arrStudent = array();
      // if($result) {
      //     $res["error"] = FALSE;
      //     $res["message"] = "Success to insert a new friend";
      // } else {
      //     $res["error"] = TRUE;
      //     $res["message"] = "Failed to add a new friend";
      // }
      //response(200, $result);
  //}


}
