<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="range_calculator.css">
  </head>
  <body>

    <header class="top_text">
      <h1 class="main_title">Range to Solution Tester</h1>
        <p>Input two sets of numbers in order to calculate the range of the pair. Then use the output to solve using the selected opperator. Finally, input your answer to see if you're correct! You can keep track of your record at the bottom, or reset your score with the "Start Over" button.</p>
    </header>

    <section class="range">
      <form action="" method="post">
        <div class="input_one">
            <label>Range From:</label>
            <input type="number" name="x1">
            <label>To:</label>
            <input type="number" name="y1">
        </div>
        <div class="input_two">
            <label>Range From:</label>
            <input type="number" name="x2">
            <label>To:</label>
            <input type="number" name="y2">
        </div>
    </section>
        <input class="submitButtonRange" type="submit" name="SubmitRange" value="Submit Range"/>
      </form>

    <section class="opperator1">
      <form action="" method="post">
      <select class="select" name="funcType">
        <option value="none">Select Opperator</option>
        <option value="add">Addition</option>
        <option value="sub">Subtraction</option>
        <option value="mult">Multiplication</option>
        <option value="div">Division</option>
      </select>
    </section>
    <section class="opperator2">
      <input type="submit" value="Submit Opperator" name="submitOpperator" class="submitButtonFunc">
      </form>
    </section>

    <section class="answer">
      <form action="" method="post">
        <h3>Enter Your Answer</h3>
        <input class="num" type="number" name="answer" step=".01">
        <input class="submitButtonAns" type = "submit" value="Submit answer" name="submitAnswer">
      </form>
    </section>

    <form action="" method="post">
      <input class="submitButtonRes" type = "submit" value="Start Over" name="restart">
    </form>

    <?php
      // $_SESSION['totalCorrect'] = 0;
      // $_SESSION['totalTried'] = 0;
      // $_SESSION['funcType'] = "none";

      if(isset($_POST['SubmitRange'])){
        $x1 = $_POST['x1'];
        $y1 = $_POST['y1'];
        $x2 = $_POST['x2'];
        $y2 = $_POST['y2'];
        if("" == trim($_POST['x1'])){
          echo "<p class='alert'> *ATTENTION* empty range value </p>";
        } elseif("" == trim($_POST['y1'])){
          echo "<p class='alert'> *ATTENTION* empty range value </p>";
        } elseif("" == trim($_POST['x2'])){
          echo "<p class='alert'> *ATTENTION* empty range value </p>";
        } elseif("" == trim($_POST['y2'])){
          echo "<p class='alert'> *ATTENTION* empty range value </p>";
        } else {
          $_SESSION['val1'] = rand($x1,$y1);
          $_SESSION['val2'] = rand($x2,$y2);
          $_SESSION['add'] = $_SESSION['val1'] + $_SESSION['val2'];
          $_SESSION['sub'] = $_SESSION['val1'] - $_SESSION['val2'];
          $_SESSION['mult'] = $_SESSION['val1'] * $_SESSION['val2'];
          $_SESSION['div'] = $_SESSION['val1'] / $_SESSION['val2'];
        }
      }

    if (isset($_POST['submitOpperator'])) {
        if ($_SESSION['funcType'] = "") {
          echo "<p class='alert'> Please Select an Opperator </p>";
        } else {
          $_SESSION['funcType'] = $_POST['funcType'];
        }
      }

        if (isset($_POST['submitAnswer'])) {
          $ans = $_POST['answer'];
          if ($_SESSION['funcType'] == 'add'){
            if ($_SESSION['add'] == $ans){
              echo "<p class='correct'>Correct! </p>";
              $_SESSION['val1'] = NULL;
              $_SESSION['val2'] = NULL;
              $_SESSION['totalCorrect']++;
              $_SESSION['totalTried']++;
            } else {
              echo "<p class='alert'>Incorrect... </p>";
              $_SESSION['val1'] = NULL;
              $_SESSION['val2'] = NULL;
              $_SESSION['totalTried']++;
            }
          } elseif ($_SESSION['funcType'] == 'sub'){
            if($_SESSION['sub'] == $ans){
              echo "<p class='correct'>Correct! </p>";
              $_SESSION['val1'] = NULL;
              $_SESSION['val2'] = NULL;
              $_SESSION['totalCorrect']++;
              $_SESSION['totalTried']++;
            } else {
              echo "<p class='alert'>Incorrect... </p>";
              $_SESSION['val1'] = NULL;
              $_SESSION['val2'] = NULL;
              $_SESSION['totalTried']++;
            }
          } elseif ($_SESSION['funcType'] == 'mult'){
            if($_SESSION['mult'] == $ans){
              echo "<p class='correct'>Correct! </p>";
              $_SESSION['val1'] = NULL;
              $_SESSION['val2'] = NULL;
              $_SESSION['totalCorrect']++;
              $_SESSION['totalTried']++;
            } else {
              echo "<p class='alert'>Incorrect... </p>";
              $_SESSION['val1'] = NULL;
              $_SESSION['val2'] = NULL;
              $_SESSION['totalTried']++;
            }
          } elseif ($_SESSION['funcType'] == 'div'){
            if($_SESSION['div'] == $ans){
              echo "<p class='correct'>Correct! </p>";
              $_SESSION['val1'] = NULL;
              $_SESSION['val2'] = NULL;
              $_SESSION['totalCorrect']++;
              $_SESSION['totalTried']++;
            } else {
              echo "<p class='alert'>Incorrect... </p>";
              $_SESSION['val1'] = NULL;
              $_SESSION['val2'] = NULL;
              $_SESSION['totalTried']++;
            }
          } else {
          }
    }

    if(isset($_POST['restart'])){
      $_SESSION['totalCorrect'] = 0;
      $_SESSION['totalTried'] = 0;
      $_SESSION['funcType'] = "none";
      $_SESSION['val1'] = NULL;
      $_SESSION['val2'] = NULL;
    }

    if (empty($_SESSION['val1'])) {}
    elseif (empty($_SESSION['val2'])) {}
    else {
      echo "Your values are " . $_SESSION["val1"] . " and " . $_SESSION["val2"] . " ";
    }

    echo "Total correct: " . $_SESSION['totalCorrect'] . " ";
    echo "Total attempts: " . $_SESSION['totalTried'] . " ";

    if ($_SESSION['funcType'] == "add") {
        echo "<p> Selected Addition </p>";
        $_SESSION['opType'] = "add";
    } elseif ($_SESSION['funcType'] == "sub") {
        echo "<p> Selected Subtraction </p>";
        $_SESSION['opType'] = "sub";
    } elseif ($_SESSION['funcType'] == "mult") {
        echo "<p> Selected Multiplication </p>";
        $_SESSION['opType'] = "mult";
    } elseif ($_SESSION['funcType'] == "div") {
        echo "<p> Selected Division </p>";
        $_SESSION['opType'] = "div";
    } elseif ($_SESSION['funcType'] == "none") {
        echo "<p class='alert'> Please select an opperator </p>";
    }
    ?>

  </body>
</html>
