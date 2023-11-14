<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diabetes Prediction Form</title>
</head>

<body>
    <h2>Diabetes Prediction Form</h2>
    <form method="get" action="Lab15FormHandler.php">
        <label for="arg_pregnant">Pregnancies:</label>
        <input type="text" name="arg_pregnant" value="<?php echo $arg_pregnant; ?>"><br>

        <label for="arg_glucose">Glucose:</label>
        <input type="text" name="arg_glucose" value="<?php echo $arg_glucose; ?>"><br>

        <label for="arg_pressure">Blood Pressure:</label>
        <input type="text" name="arg_pressure" value="<?php echo $arg_pressure; ?>"><br>

        <label for="arg_triceps">Triceps Thickness:</label>
        <input type="text" name="arg_triceps" value="<?php echo $arg_triceps; ?>"><br>

        <label for="arg_insulin">Insulin Level:</label>
        <input type="text" name="arg_insulin" value="<?php echo $arg_insulin; ?>"><br>

        <label for="arg_mass">Body Mass Index:</label>
        <input type="text" name="arg_mass" value="<?php echo $arg_mass; ?>"><br>

        <label for="arg_pedigree">Diabetes Pedigree Function:</label>
        <input type="text" name="arg_pedigree" value="<?php echo $arg_pedigree; ?>"><br>

        <label for="arg_age">Age:</label>
        <input type="text" name="arg_age" value="<?php echo $arg_age; ?>"><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>