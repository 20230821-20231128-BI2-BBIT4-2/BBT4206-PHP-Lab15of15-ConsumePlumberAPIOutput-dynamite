<?php
# *****************************************************************************
# Lab 14: Consume data from the Plumber API Output (using PHP) ----
#
# Course Code: BBT4206
# Course Name: Business Intelligence II
# Semester Duration: 21st August 2023 to 28th November 2023
#
# Lecturer: Allan Omondi
# Contact: aomondi [at] strathmore.edu
#
# Note: The lecture contains both theory and practice. This file forms part of
#       the practice. It has required lab work submissions that are graded for
#       coursework marks.
#
# License: GNU GPL-3.0-or-later
# See LICENSE file for licensing information.
# *****************************************************************************

// Full documentation of the client URL (cURL) library: https://www.php.net/manual/en/book.curl.php

// STEP 1: Set the API endpoint URL
$apiUrl = 'http://127.0.0.1:5022/diabetes';

// Initiate a new cURL session/resource
$curl = curl_init();

// STEP 2: Set the values of the parameters to pass to the model ----
  // The default values are provided for demonstration purposes
$arg_pregnant = isset($_POST['arg_pregnant']) ? $_POST['arg_pregnant'] : 1;
  $arg_glucose = isset($_POST['arg_glucose']) ? $_POST['arg_glucose'] : 85;
  $arg_pressure = isset($_POST['arg_pressure']) ? $_POST['arg_pressure'] : 66;
  $arg_triceps = isset($_POST['arg_triceps']) ? $_POST['arg_triceps'] : 29;
  $arg_insulin = isset($_POST['arg_insulin']) ? $_POST['arg_insulin'] : 0;
  $arg_mass = isset($_POST['arg_mass']) ? $_POST['arg_mass'] : 26.6;
  $arg_pedigree = isset($_POST['arg_pedigree']) ? $_POST['arg_pedigree'] : 0.351;
  $arg_age = isset($_POST['arg_age']) ? $_POST['arg_age'] : 31;
  
  $params = array(
    'arg_pregnant' => $arg_pregnant,
    'arg_glucose' => $arg_glucose,
    'arg_pressure' => $arg_pressure,
    'arg_triceps' => $arg_triceps,
    'arg_insulin' => $arg_insulin,
    'arg_mass' => $arg_mass,
    'arg_pedigree' => $arg_pedigree,
    'arg_age' => $arg_age
  );
  
  // STEP 3: Set the cURL options
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $apiUrl = $apiUrl . '?' . http_build_query($params);
  curl_setopt($curl, CURLOPT_URL, $apiUrl);
  
  // For testing:
    echo "The generated URL sent to the API is:<br>" . $apiUrl . "<br><br>";
  
  // Make a GET request
  $response = curl_exec($curl);
  
  // Check for cURL errors
  if (curl_errno($curl)) {
    $error = curl_error($curl);
    // Handle the error appropriately
    die("cURL Error: $error");
  }
  
  // Close cURL session/resource
  curl_close($curl);
  
  // Process the response
  $data = json_decode($response, true);
  
  // Check if the response was successful
  if (isset($data['0'])) {
    // API request was successful
    // Access the data returned by the API
    echo "The predicted diabetes status is:<br>";
    
    // Process the data
    foreach ($data as $repository) {
      echo $repository['0'], $repository['1'], $repository['2'], "<br>";
    }
  } else {
    // API request failed or returned an error
    // Handle the error appropriately
    echo "API Error: " . $data['message'];
  }
  ?>
    