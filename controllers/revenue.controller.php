<?php
// 
require "./_classes/controller.php";
require "./models/revenue.model.php";

// controller for the admin
class revenueController extends controller{
    // getting all the projects from the model
    public function projects(){
    // calling the modal to get the projects
    $revenue = new revenue();
    $test = $revenue->getProjects();
    // returning the data with the view
    return $test;
    }
   // getting all the revenue from the model
   public function revenue(){
        if($_SESSION['userrole'] == 'superadmin'){
            // calling the modal to get the revenue
            $revenue = new revenue();
            // getting all the projects from db 
            $data['projects'] = $this->projects();
            $data['revenue'] = $revenue->getRevnue();
            // returning the data with the view
            return $this->view("revenue",$data);
        }else{
            // retrun no acces view
            return $this->view("noaccess");
        }

   }
   // deleting a revenue with 1 parameter
   public function deleteRevnue($id){
        // getting the id from the url
        $data = array (
            "id" => $id
        );
        // calling the modal to delete the revenue
        $revenue = new revenue();
        $data['revenue'] = $revenue->deleteRevnue($data['id']);
        // returning the data with the view
        redirect("/revenue");
   }

   // getting a single revenue from the model
    public function singleRevnue($id){
          // getting the id from the url
          $data = array (
                "id" => $id
          );
          // calling the modal to get the revenue
          $revenue = new revenue();
          $data['revenue'] = $revenue->getSingleRevnue($data['id']);
          $data['projects'] = $revenue->getProjects();
          // returning the data with the view
          return $this->view("singleRevnue", $data);
    }
    // model to update the revenue
    public function updateRevnue(){
        // calling the function from modelt and passing the data
        $revenue = new revenue();
        // passing the Post data to the model
        $revenue->updateRevnue($_POST['Revenueid'], $_POST['project'], $_POST['personalrevenue'], $_POST['datefopayment'], $_POST['allrevenue']);
        // redirecting to the revenue page
        redirect("/revenue");
    }
    // adding a revenue to db
    public function addRevnue(){
        // calling the function from modelt and passing the data
        $revenue = new revenue();
        // passing the Post data to the model
        $revenue->addRevnue($_POST['project'], $_POST['personalrevenue'], $_POST['datefopayment'], $_POST['allrevenue']);
        // redirecting to the revenue page
        redirect("/revenue");
    }

}