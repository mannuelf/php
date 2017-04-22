<?php include "functions.php" ?>
<?php include "includes/header.php" ?>
    

	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


	<article class="main-content col-xs-8">
	<?php  

	/*  Step 1 - Create a database in [PHPmyadmin] <- DID NOT DO THIS instead i made a local one in the command line
	    created database called "practice7" and created table called exercise7
		Step 2 - Create a table like the one from the lecture

	    SQL QUERY =>
	    CREATE TABLE users ( id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(20) NOT NULL, secondname VARCHAR(20) NOT NULL, age INT, password VARCHAR(40), reg_date TIMESTAMP);

	    mysql> describe users;
        +------------+------------------+------+-----+-------------------+-----------------------------+
        | Field      | Type             | Null | Key | Default           | Extra                       |
        +------------+------------------+------+-----+-------------------+-----------------------------+
        | id         | int(10) unsigned | NO   | PRI | NULL              | auto_increment              |
        | firstname  | varchar(20)      | NO   |     | NULL              |                             |
        | secondname | varchar(20)      | NO   |     | NULL              |                             |
        | age        | int(11)          | YES  |     | NULL              |                             |
        | password   | varchar(40)      | YES  |     | NULL              |                             |
        | reg_date   | timestamp        | NO   |     | CURRENT_TIMESTAMP | on update CURRENT_TIMESTAMP |
        +------------+------------------+------+-----+-------------------+-----------------------------+
        6 rows in set (0.00 sec)

	    Step 3 - Insert some Data

        mysql> INSERT INTO users(firstname, secondname, password, age) VALUES ('MANNUEL','FERREIRA','hsiluhdf','98');
        Query OK, 1 row affected (0.03 sec)

        mysql> SELECT * FROM users;
        +----+-----------+------------+------+----------+---------------------+
        | id | firstname | secondname | age  | password | reg_date            |
        +----+-----------+------------+------+----------+---------------------+
        |  1 | MANNUEL   | FERREIRA   |   98 | hsiluhdf | 2017-04-22 18:25:59 |
        +----+-----------+------------+------+----------+---------------------+
        1 row in set (0.00 sec)

		Step 4 - Connect to Database and read data
	*/

	    // 01 - make a connection
        $connection = mysqli_connect(
                'localhost',
                'root',
                'root',
                'practice7'
        );
        // 02 - check if connection failed return the error notice
        if(!$connection) {
            echo "<h2>CONNECTION FAILED!!!!!!!!!</h2> . mysqli_error($connection);";
        } else {
            echo "<small style='color: darkred;'>We are connected :-) </small>";
        }

        function showRecords() {
            global $connection;

            $query = "SELECT * FROM users";
            $result = mysqli_query($connection, $query);

            if(!$result) {
                die('Query FAILED' . mysqli_error($connection));
            }
            while($row = mysqli_fetch_assoc($result)) {
                print_r($row);
            }
        }

	?>

    <form action="7.php" method="post">
        <div class="mdl-textfield mdl-js-textfield">
            <label class="mdl-textfield__label" for="username">Firstname</label>
            <input class="mdl-textfield__input" type="text" name="firstname">
        </div>
        <div class="mdl-textfield mdl-js-textfield">
            <label class="mdl-textfield__label" for="secondname">Second Name</label>
            <input class="mdl-textfield__input" type="text" name="secondname">
        </div>
        <div class="mdl-textfield mdl-js-textfield">
            <label class="mdl-textfield__label" for="password">Password</label>
            <input class="mdl-textfield__input" type="password" name="password">
        </div>
        <div class="mdl-textfield mdl-js-textfield">
            <label class="mdl-textfield__label" for="age">Age</label>
            <input class="mdl-textfield__input" type="text" name="age">
        </div>
        <div class="mdl-textfield mdl-js-textfield">
            <input type="submit" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
        </div>
    </form>
        <br>
        <pre style="background-color: greenyellow;"><?php showRecords(); ?></pre>

    </article><!--MAIN CONTENT-->

<?php include "includes/footer.php" ?>
