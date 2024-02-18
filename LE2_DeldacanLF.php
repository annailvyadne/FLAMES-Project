<!--Programmer: Lianne Francheska S. Deldacan-->
<!--Section: BSIT-2-AM2-->

<!--PHP script-->
<?php
  session_start();

//PHP Script for Zodiac
class Zodiac {
  private $zodiacSign;
  private $symbol;
  private $startDate;
  private $endDate;
  public function __construct($date) {
    $formattedDate = date('F j', strtotime($date));
    // Assuming $date is in the format 'Month Day'
    $dateParts = explode(' ', $formattedDate);

    $month = $dateParts[0];
    $day = $dateParts[1];

    // Read the contents of the Zodiac.txt file
    $fileContents = file_get_contents('Zodiac.txt');

    // Assuming each line in the file contains zodiac information
    $lines = explode("\n", $fileContents);

    // Iterate through the zodiac signs from the file and find the matching one
    foreach ($lines as $line) {
        $zodiacInfo = explode(';', $line);
        $sign = $zodiacInfo[0];
        $symbol = $zodiacInfo[1];
        $start = strtotime($zodiacInfo[2]);
        $end = strtotime($zodiacInfo[3]);
        $currentDate = strtotime("$month $day");


        if ($currentDate >= $start && $currentDate <= $end) {
            $this->zodiacSign = $sign;
            $this->symbol = $symbol;
            $this->startDate = $start;
            $this->endDate = $end;

            break; // Break the loop once the sign is found
        }
    }

    // Set 'Unknown' if no match is found

  }

  public function getSymbol(){
      return $this->symbol;
  }
  public function getStartDate(){
      return $this->startDate;
  }

  public function getEndDate()
  {
      return $this->endDate;
  }
  public function getZodiacSign() {

      return $this->zodiacSign;
  }

  public function computeZodiacCompatibility($zodiac1,$zodiac2) {
      // Compatibility chart (simplified for Aries)
      $compatibilityChart = [
        //Aries
          'Aries' => [
              'Aries' => 'Great Match',
              'Leo' => 'Great Match',
              'Sagittarius' => 'Great Match',
              'Taurus' => 'Not Favorable',
              'Virgo' => 'Not Favorable',
              'Capricornus' => 'Not Favorable',
              'Gemini' => 'Great Match',
              'Libra' => 'Great Match',
              'Aquarius' => 'Great Match',
              'Cancer' => 'Not Favorable',
              'Scorpio' => 'Not Favorable',
              'Pisces' => 'Great Match',
          ],

          //Leo
          'Leo' => [
            'Aries' => 'Great Match',
            'Leo' => 'Great Match',
            'Sagittarius' => 'Great Match',
            'Taurus' => 'Not Favorable',
            'Virgo' => 'Not Favorable',
            'Capricorn' => 'Not Favorable',
            'Gemini' => 'Great Match',
            'Libra' => 'Great Match',
            'Aquarius' => 'Great Match',
            'Cancer' => 'Favorable Match',
            'Scorpio' => 'Favorable Match',
            'Pisces' => 'Favorable Match',
          ],

          //Sagittarius
          'Sagittarius' => [
            'Aries' => 'Great Match',
            'Leo' => 'Great Match',
            'Sagittarius' => 'Great Match',
            'Taurus' => 'Not Favorable',
            'Virgo' => 'Not Favorable',
            'Capricorn' => 'Not Favorable',
            'Gemini' => 'Great Match',
            'Libra' => 'Great Match',
            'Aquarius' => 'Great Match',
            'Cancer' => 'Favorable Match',
            'Scorpio' => 'Favorable Match',
            'Pisces' => 'Favorable Match',
          ],

        //Taurus
        'Taurus' => [
          'Aries' => 'Not Favorable',
          'Leo' => 'Favorable Match',
          'Sagittarius' => 'Not Favorable',
          'Taurus' => 'Great Match',
          'Virgo' => 'Great Match',
          'Capricorn' => 'Great Match',
          'Gemini' => 'Not Favorable',
          'Libra' => "Favorable Match",
          'Aquarius' => 'Not Favorable',
          'Cancert' => 'Great Match',
          'Scorpio' => 'Great Match',
          'Pisces' => 'Great Match',
        ],

        //Virgo
        'Virgo' => [
          'Aries' => 'Not Favorable',
          'Leo' => 'Favorable Match',
          'Sagittarius' => 'Not Favorable',
          'Taurus' => 'Great Match',
          'Virgo' => 'Great Match',
          'Capricorn' => 'Great Match',
          'Gemini' => 'Not Favorable',
          'Libra' => 'Not Favorable',
          'Aquarius' => 'Favorable Match',
          'Cancer' => 'Great Match',
          'Scorpio' => 'Great Match',
          'Pisces' => 'Favorable Match',
        ],

      //Capricorn
        'Capricorn' => [
          'Aries' => 'Not Favorable',
          'Leo' => 'Favorable Match',
          'Sagittarius' => 'Not Favorable',
          'Taurus' => 'Great Match',
          'Virgo' => 'Great Match',
          'Capricorn' => 'Great Match',
          'Gemini' => 'Not Favorable',
          'Libra' => 'Favorable Match',
          'Aquarius' => 'Not Favorable',
          'Cancer' => 'Great Match',
          'Scorpio' => 'Great Match',
          'Pisces' => 'Great Match',
        ],

      //Gemini
      'Gemini' => [
        'Aries' => 'Great Match',
        'Leo' => 'Great Match',
        'Sagittarius' => 'Favorable Match',
        'Taurus' => 'Not Favorable',
        'Virgo' => 'Favorable Match',
        'Capricorn' => 'Great Match',
        'Libra' => 'Great Match',
        'Aquarius' => 'Great Match',
        'Cancer' => 'Not Favorable',
        'Scorpio' => 'Not Favorable',
        'Pisces' => 'Not Favorable',
      ],

      //Libra
      'Libra' => [
        'Aries' => 'Favorable Match',
        'Leo' => 'Great Match',
        'Sagittarius' => 'Great Match',
        'Taurus' => 'Favorable Match',
        'Virgo' => 'Not Favorable',
        'Capricorn' => 'Not Favorable',
        'Gemini' => 'Great Match',
        'Libra' => 'Great Match',
        'Aquarius' => 'Great Match',
        'Cancer' => 'Not Favorable',
        'Scorpio' => 'Not Favorable',
        'Pisces' => 'Favorable Match',
      ],

      //Aquarius
      'Aquarius' => [
        'Aries' => 'Great Match',
        'Leo' => 'Great Match',
        'Sagittarius' => 'Great Match',
        'Taurus' => 'Not Favorable',
        'Virgo' => 'Not Favorable',
        'Capricorn' => 'Not Favorable',
        'Gemini' => 'Great Match',
        'Libra' => 'Great Match',
        'Aquarius' => 'Great Match',
        'Cancer' => 'Not Favorable',
        'Scorpio' => 'Favorable Match',
        'Pisces' => 'Favorable Match',
      ],

      //Cancer
      'Cancer' => [
        'Aries' => 'Not Favorable',
        'Leo' => 'Favorable Match',
        'Sagittarius' => 'Favorable Match',
        'Taurus' => 'Great Match',
        'Virgo' => 'Great Match',
        'Capricorn' => 'Great Match',
        'Gemini' => 'Not Favorable',
        'Libra' => 'Not Favorable',
        'Aquarius' => 'Not Favorable',
        'Cancer' => 'Great Match',
        'Scorpio' => 'Great Match',
        'Pisces' => 'Great Match',
      ],

      //Scorpio
      'Scorpio' => [
        'Aries' => 'Favorable Match',
        'Leo' => 'Favorable Match',
        'Sagittarius' => 'Not Favorable',
        'Taurus' => 'Great Match',
        'Virgo' => 'Great Match',
        'Capricorn' => 'Great Match',
        'Gemini' => 'Not Favorable',
        'Libra' => 'Not Favorable',
        'Aquarius' => 'Not Favorable',
        'Cancer' => 'Great Match',
        'Scorpio' => 'Great Match',
        'Pisces' => 'Great Match',
      ],

      //Pisces
      'Pisces' => [
        'Aries' => 'Favorable Match',
        'Leo' => 'Favorable Match',
        'Sagittarius' => 'Favorable Match',
        'Taurus' => 'Great Match',
        'Virgo' => 'Favorable Match',
        'Capricorn' => 'Great Match',
        'Gemini' => 'Not Favorable',
        'Libra' => 'Not Favorable',
        'Aquarius' => 'Not Favorable',
        'Cancer' => 'Great Match',
        'Scorpio' => 'Great Match',
        'Pisces' => 'Great Match',
      ]
      ];

      // Get compatibility result
      return $compatibilityChart[$zodiac1][$zodiac2];
  }
}


//PHP Script for Person
class Person {
    private $firstName;
    private $lastName;
    private $birthday;
    private $zodiac;

    public function __construct($firstName, $lastName, $birthday) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthday = $birthday;

        // Create a Zodiac object with the birthdate
        $this->zodiac = new Zodiac($birthday);

    }

    public function getBirthday(){
      return $this->birthday;
    }
    public function getFullName() {
        return $this->lastName . ' ' . $this->firstName;
    }

    public function getZodiacSign() {

        return $this->zodiac->getZodiacSign();
    }
    public function getSymbol(){
        return $this->zodiac->getSymbol();
    }

    public function getStartDate(){
        return $this->zodiac->getStartDate();
    }

    public function getEndDate(){
        return $this->zodiac->getEndDate();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="FLAMES | Friends, Lovers, Anger, Married, Engaged, Soulmates">
  <meta name="author" content="Lianne Francheska S. Deldacan">
  <meta name="keyword" content="FLAMES, Friends, Lovers, Anger, Married, Engaged, Soulmates">
  <!--sweetalert-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
  <!-- Bootstrap 5 CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Laboratory #2</title>
</head>
<body>

<!--body-->
<!--container for introduction-->
<div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3 class="animate-charcter"> FLAMES </h3>
    </div>
  </div>
</div>

<!--container for instruction-->

<div class="container-instruction">
  <h1 >Instructions</h1>
  <p>Type your name and your crush name as well as your birthdays below and know what destiny will be for you! <br> Guide:
  <b><i>F – Friends, L – Lovers, A – Anger, M – Married, E – Engaged, S – Soulmates </i></b>
     </p>
</div>

<!--content-container-->
<div class="content-container">
<!--Container for forms to input you and your crush's information-->
<div class="forms-container">
  <h1 style="font-weight: bold; text-align: center; font-size: 30px; color: red; margin-bottom: 15px;">Your Information</h1>
  <form action="LE2_DeldacanLF.php" method="POST">
    <!--input your name-->
    <label for="name" class="center-label">Your First Name:</label>
    <input type="text" id="name" name="name" placeholder="Enter your full name" required>

    <!--input your last name-->
    <label for="lastName" class="center-label">Your Last Name:</label>
    <input type="text" id="lastName" name="lastName" placeholder="Enter your last name" required>

    <!--input your birthdate-->
    <label for="birthday" class="center-label">Your Birthday:</label>
    <input type="date" id="birthday" name="birthday" required>

</div>

<div class="crush-forms-container">
  <h1 style="font-weight: bold; text-align: center; font-size: 30px; color: red; margin-bottom: 15px;">Your Crush's Information</h1>
  <!--input your crush's name-->
  <label for="crushName" class="center-label">Crush's First Name:</label>
  <input type="text" id="crushName" name="crushName" placeholder="Enter your crush's name" required>

  <!--input your crush's last name-->
  <label for="crushLastName" class="center-label">Crush's Last Name:</label>
  <input type="text" id="crushLastName" name="crushLastName" placeholder="Enter your crush's last name">

  <!--input your crush's birthdate-->
  <label for="crushBirthday" class="center-label">Crush's Birthday:</label>
  <input type="date" id="crushBirthday" name="crushBirthday" required>
  
 
  <div class="button">
    <!--button for submitting the form-->
    <button type="submit" name="submit" style="font-weight: bold;" id="submit">Submit</button>
  </div>
  </form>
</div>

<!----------------------------------------------------------------->
<!-- Button to trigger the modal -->
<!--It is a Bootstrap 5 modal-->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="background-color: #FFB4B4; position: fixed; top: 10px; right: 10px; z-index: 1050; color:black; font-weight: bold;">Student's Info</button>

<!-- Modal: Student's Info -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="position: fixed; top: 0; right: 0;">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="margin-bottom: 20px;">
        <h5 class="modal-title" id="exampleModalLongTitle">Student Information</h5>

      </div>

      <!--a container modal where my information is stored and displayed-->
      <div class="modal-body">
        <h6><b>Lianne Francheska S. Deldacan</b></h6>
        <p><b>Section:</b> BSIT-AM2<br>
        <b>Course:</b> ITS122L - Web Systems and Technologies II Laboratory</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #FFB4B4; color: black;">Close</button>
      </div>
    </div>
  </div>
</div>


<!------------------------------------------------------------------->
<div class="rectangle-container" style="display: flex; flex-direction: column; align-items: center; margin-top: 100px; margin-bottom: 50%;">
  <!-- Container for the summary of results -->
  <h2 style="margin-bottom: 20px;"><b>Summary of Results</b></h2>

  <!-- Flex container for arranging elements horizontally with space between -->
  <div style="display: flex; justify-content: space-between; width: 100%;">
    <!-- Left side of the flex container -->
    <div style="flex: 1; margin-right: 20px;">
<!---->
<?php

// Initialize $flamesResultText before the if condition
// Set default values
$flamesResult = '';
$flamesResultText = '';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    
    // Array for FLAMES
    // Since the word FLAMES is composed of 6 different letters with distinct characteristics, it should store in an array
    $flames = array(
        "F" => "Friends",
        "L" => "Lovers",
        "A" => "Anger",
        "M" => "Married",
        "E" => "Engaged",
        "S" => "Soulmates"
    );

// Process form data for the first person (You)
$firstPersonFname = trim($_POST['name']);          // Retrieve and trim the first person's first name
$firstPersonLname = trim($_POST['lastName']);      // Retrieve and trim the first person's last name
$firstPersonDOB = trim($_POST['birthday']);        // Retrieve and trim the first person's date of birth

// Create a Person object for the first person
$firstPerson = new Person($firstPersonFname, $firstPersonLname, $firstPersonDOB);

// Get the zodiac sign of the first person
$firstPersonZodiac = $firstPerson->getZodiacSign();

// Process form data for the crush
$crushFname = trim($_POST['crushName']);          // Retrieve and trim the crush's first name
$crushLname = trim($_POST['crushLastName']);      // Retrieve and trim the crush's last name
$crushBirthday = trim($_POST['crushBirthday']);   // Retrieve and trim the crush's date of birth

// Create a Person object for the crush
$crush = new Person($crushFname, $crushLname, $crushBirthday);

// Convert full names to lowercase for comparison
$firstPersonFullName = strtolower($firstPerson->getFullName());
$crushFullName = strtolower($crush->getFullName());


// Loop through each character in the first person's full name
for ($i = 0; $i < strlen($firstPersonFullName); $i++) {
    // If the character exists in the crush's full name, replace with '?'
    if (($pos = strpos($crushFullName, $firstPersonFullName[$i])) !== false) {
        $firstPersonFullName[$i] = $crushFullName[$pos] = '?';
    }
}

// Remove '?' characters and count the number of similar letters in the names
$name = str_replace('?', '', $firstPersonFullName);
$crushName = str_replace('?', '', $crushFullName);
$similarLettersCount = strlen($name);

// Initialize FLAMES result array
$flamesResult = implode("", array_keys($flames));

$pos = 0;
// Loop until only one FLAMES letter remains
while (count($flames) > 1) {
    $pos = ($similarLettersCount + $pos) % count($flames);  // Calculate the position to remove based on similar letters

    if ($pos == 0) {
        $pos = count($flames) - 1;  
    } else {
        $pos--;
    }

    unset($flames[array_keys($flames)[$pos]]);  // Remove the FLAMES letter at the calculated position
    $flames = array_values($flames);  // Re-index the array after removal
}

// Get the remaining FLAMES letter and the corresponding FLAMES result
$resultKey = strtoupper(current(array_keys($flames)));
$flamesResult = $flames[$resultKey];

// Get information about the first person
$personSymbol = $firstPerson->getSymbol();
$personStartDate = date('F j, Y', $firstPerson->getStartDate());
$personEndDate = date('F j, Y', $firstPerson->getEndDate());

// Get information about the crush
$crushSymbol = $crush->getSymbol();
$crushStartDate = date('F j, Y', $crush->getStartDate());
$crushEndDate = date('F j, Y', $crush->getEndDate());

    // Display names with styles
    echo "<p style='font-size: 18px; font-weight: bold;'>Your Name: " . $firstPerson->getFullName() . " (Zodiac Sign:" . $firstPerson->getZodiacSign() . ")</p>";
    echo "<p style='font-size: 14px; margin-bottom: 10px;'>Birthdate: " . $firstPerson->getBirthday() . "</p>";

    // Assuming you have a getZodiacSign() method in your Person class
    $personZodiacSign = $firstPerson->getZodiacSign();
    $crushZodiacSign = $crush->getZodiacSign();

    // Array mapping zodiac signs to their corresponding HTML entities
    $zodiacSymbols = array(
        'Aquarius' => '&#9810;',
        'Pisces' => '&#9811;',
        'Aries' => '&#9800;',
        'Taurus' => '&#9801;',
        'Gemini' => '&#9802;',
        'Cancer' => '&#9803;',
        'Leo' => '&#9804;',
        'Virgo' => '&#9805;',
        'Libra' => '&#9806;',
        'Scorpio' => '&#9807;',
        'Sagittarius' => '&#9808;',
        'Capricorn' => '&#9809;'
    );
    ?>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
        View more
    </button>


    <?php
    echo "<p style='font-size: 18px; font-weight: bold;'>Your Crush's Name: " . $crush->getFullName() . " (Zodiac Sign:" . $crush->getZodiacSign() . ")</p>";
    echo "<p style='font-size: 14px; margin-bottom: 10px;'>Birthdate: " . $crush->getBirthday() . "</p>";
    ?>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crushModal">
        View more
    </button>

   

    <?php
    $zodiacResult = new Zodiac($crushBirthday);

    // Calculate and set the value of $flamesResultText here based on your logic
    $flamesResultText = $zodiacResult->computeZodiacCompatibility($firstPerson->getZodiacSign(), $crush->getZodiacSign()); // Replace with your logic

    // Display FLAMES compatibility result with styles
    echo "<p style='font-size: 24px; color: black; font-weight: bold;'>Compatibility Result: $flamesResult - <span style='color: red;'>$flamesResultText</span></p>";

    // Display SweetAlert based on FLAMES result
    // In this part, it is a pop-up dialog message that shows the surprising result of compatibility between two persons. It was based on
    // the results of FLAMES
    echo "
<script>
document.addEventListener('DOMContentLoaded', function () {
Swal.fire({
  title: 'FLAMES result',
  text: 'Result:" . $firstPerson->getFullName() . " and " . $crush->getFullName() . " are $flamesResult, $flamesResultText ', 
  width: 600,
  padding: '3em',
  color: '#716add',
  background: '#fff',
  backdrop: `
    rgba(0,0,123,0.4)
    url('Assets/giphy.gif')
    left top
    no-repeat
  `
});
});
</script>";
} else {
    // Default message when the form is not submitted
    echo "<p style='font-size: 18px; font-weight: bold;'>Results will show here</p>";
}
?>


<!----->

      <!-- Button to try the test again -->
      <button onclick="tryAgain()" style="display: block; margin: 0 auto;">Try Again</button>
    </div>

    <!-- Right side of the flex container -->
    <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">


<!------------------------------------>
<?php
//array of zodiac sign images stored in assets folder based on user's and crush's birthdates
$zodiacImages = array(
    'Aries' => 'Assets/aries.png',
    'Taurus' => 'Assets/taurus.png',
    'Gemini' => 'Assets/gemini.png',
    'Cancer' => 'Assets/cancer.png',
    'Leo' => 'Assets/leo.png',
    'Virgo' => 'Assets/virgo.png',
    'Libra' => 'Assets/libra.png',
    'Scorpio' => 'Assets/scorpio.png',
    'Sagittarius' => 'Assets/sagittarius.png',
    'Capricornus' => 'Assets/capricorn.png',
    'Aquarius' => 'Assets/aquarius.png',
    'Pisces' => 'Assets/pisces.png',
);


// Display the Zodiac sign image based on the Zodiac sign
if (isset($firstPersonZodiacSign) && array_key_exists($firstPersonZodiacSign, $zodiacImages)) {
  $firstPersonZodiacSign = $firstPerson->getZodiacSign();
    // Echo the image tag with the Zodiac sign image
    echo "<img src='{$zodiacImages[$firstPersonZodiacSign]}' alt='$firstPersonZodiacSign' style='width: 100px; height: 100px; margin-bottom: 5px;'>"; // Adjust width and height as needed

    // Display the Zodiac sign name with a smaller font size
    echo "<p style='font-size: 12px;'>{$firstPersonZodiacSign}</p>";
}

// Display the Zodiac sign image based on the crush's Zodiac sign
if (isset($crushZodiacSign) && array_key_exists($crushZodiacSign, $zodiacImages)) {
  $crushZodiacSign = $crush->getZodiacSign();
    // Echo the image tag with the crush's Zodiac sign image
    echo "<img src='{$zodiacImages[$crushZodiacSign]}' alt='$crushZodiacSign' style='width: 100px; height: 100px; margin-top: 10px; margin-bottom: 5px;'>"; // Adjust width and height as needed

    // Display the crush's Zodiac sign name with a smaller font size
    echo "<p style='font-size: 12px;'>{$crushZodiacSign}</p>";
}
?>

    </div>
  </div>

<!------------------------------------>
<!--When you clicked the buttons, the background image of page changes based on respective assigned image-->
    <div class="custom-buttons">
        <div class="bg-buttons">
            <button id="btn1" onclick="changeBackground('Assets/bg.jpg')"></button>
            <button id="btn2" onclick="changeBackground('Assets/bg-1.jpg')"></button>
            <button id="btn3" onclick="changeBackground('Assets/bg-2.jpg')"></button>
        </div>
    </div>

</div> <!--content container end-->

<!--Jpopper CDN for Bootstrap 5-->
  <!-- Include the SweetAlert library and Bootstrap scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!--bg buttons-->
  <script>
        function changeBackground(image) {
            document.body.style.backgroundImage = `linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('${image}')`;
        }
    </script>

<!---------------------------------->

<script>
  // JavaScript function to reset form elements and update content to default message
  function tryAgain() {
    // Clear form elements by resetting the form
    document.querySelector('form').reset();

    // Update the content to the default message
    document.querySelector('.rectangle-container').innerHTML = "<h2 style='margin-bottom: 20px;'><b>Summary of Results</b></h2><p style='font-size: 18px; font-weight: bold;'>Results will show here</p>";
  }
</script>

<!-- First Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <?php
          // Display symbol, start date, and end date inside the first modal
          echo "<p style='font-weight: bold;'>Symbol: </p>" . $personZodiacSign . " " . $zodiacSymbols[$personZodiacSign] . "<br>";
          echo "<p style='font-weight: bold;'>Start Date: </p>" . $personStartDate . "<br>";
          echo "<p style='font-weight: bold;'>End Date: </p>" . $personEndDate . "<br>";
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Second Modal -->
<div class="modal fade" id="crushModal" tabindex="-1" role="dialog" aria-labelledby="crushModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <?php
          // Display symbol, start date, and end date inside the second modal
          echo "<p style='font-weight: bold;'>Symbol: </p>" . $crushZodiacSign . " " . $zodiacSymbols[$crushZodiacSign] . "<br>";
          echo "<p style='font-weight: bold;'>Start Date: </p>" . $crushStartDate . "<br>";
          echo "<p style='font-weight: bold;'>End Date: </p>" . $crushEndDate . "<br>";
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>