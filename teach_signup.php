<?php

//teacher user sign up and sign in
/* For now user input is being stored in json file since i am unaware of what database we are using
if there's a better alternative for handling errors. edit*/

session_start();

//sanitize user input
function clean_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


    $message = ''; //for storing error messages
  //checking for user input for teacher sign up
        if (isset($POST['submit'])){
          if(isset($POST['name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password'])){
            if(empty($_POST['name']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['confirm_password'])) {

              $message = '<div class="alert alert-warning alert-dismissible fade show" role="alert">**All fields are required**<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

          }
          else{
            $name1 = clean_input($_POST['name']);
            $username = clean_input($_POST['username']);
            $password = clean_input($_POST['password'])

        }
/*
        //get and add forms data into an array
        $data = array(
          'name' => $name1,
          'username' => $username,
          'password' => $password,
        );

        //using json file as sample to store the user input array
        $user_file = 'users.json'

        $array_data = array(); //store the Data

        //check if json file exists
        $if(file_exists($user_file)){
          $jsondata = file_get_contents($user_file); //get json data from the user file
          $array_data = json_decode($jsondata, true); //decode json data

          foreach ($array_data as $user_data) { // loop through the existing data
            $retrieved_username = (string) ($user_data['username']);
            $username = (string) $username;
            if( strtolower($retrieved_username)==strtolower($username) ){ // check if user with the same username already exists

                //Error checking
                $message = '<div class="alert alert-warning alert-dismissible fade show" role="alert">This username already exists<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

                return;
              }
            }
        }

        $array_data[] = $data; //append the array with new form data

        //endcode the array into a string in JSON format
        $jsondata = json_encode($array_data, JSON_PRETTY_PRINT);

        // saves the json string in users.json
        if(file_put_contents('users.json', $jsondata)){ //if succesful return to the index page
          header('location: index.php');
        }
        else {
          echo 'Data not saved';
        }
      } else{

        $message = '<div class="alert alert-warning alert-dismissible fade show" role="alert">**Form fields are empty**<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

      }
    }  **/

    if(isset($_POST['signin'])){
      // check if all form data are submited, else output error message
      if(isset($_POST['username']) && isset($_POST['password'])) {
      // if form fields are empty, outputs message, else, gets their data
      if(empty($_POST['username']) || empty($_POST['password'])) {
        //error handling
        $message =  '<div class="alert alert-warning alert-dismissible fade show" role="alert">**All fields are required**<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

      }
      else {

          $username = $_POST["username"];
          $password = $_POST["password"];

      // gets and adds form data into an array

/*      $data = array(

        'username'=> $username,
        'password'=> $password,

      );

      // path and name of the file
      $user_file = 'users.json';

      $array_data = array();        // to store all form data

      // check if the file exists
      if(file_exists($user_file)) {
        // gets json-data from file
        $jsondata = file_get_contents($user_file);

        // converts json string into array
        $array_data = json_decode($jsondata);




        foreach($array_data as $user_data) { // loop through the array data
            if(($user_data->username === $username) && ($user_data->password === $password)){ // check if password and email match existing ones
*/
             $_SESSION['name'] = $user_data->name; // stores the name of the user in a session
              header('location: home.php'); //redirect to the home page


            } else {
              $message = '<div class="alert alert-warning alert-dismissible fade show" role="alert">**Incorrect Name/Password**<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            }
        }
      }


    }
  } else  $message = '<div class="alert alert-warning alert-dismissible fade show" role="alert">**Form fields are empty**<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
}
  ?>
