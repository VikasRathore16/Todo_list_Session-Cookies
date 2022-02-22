<?php
session_start();
?>

<html>
<head>
    <title>TODO List</title>
<style>
<?php include 'style.css'; ?>
</style>
</head>
<body>
    <div class="wrapper">
        <form action="function.php" method="POST">
            <h1>TODO LIST</h1>
            <h3>Add Item</h3>
            <br>
            <input id="newTask" type="text" name="input" value="<?php echo $_SESSION['val']; ?>">
            <button name="addButton">
                <?php if ($_SESSION['count'] == 0) { ?>
                    Add
                <?php } else { ?>
                    Update
                <?php  $_SESSION['count'] = 0; } ?>
            </button>
        </form>

        <h3>Todo</h3>
        <ul>
             <?php if (isset($_SESSION['todo'])) {
                foreach ($_SESSION['todo'] as $key => $value) {
                    echo '
                        <form action="function.php" method="POST">
                        <li>
                        <input type="checkbox" onchange="this.form.submit()" name="check">
                        <label>' . $value . '</label>
                        <input type="text">
                        
                        <button class="edit" name="editButton">Edit</button>
                        <button class="delete" name="deleteButton">Delete</button>
                       
                        </li>
                        <input type="text" hidden name="do" value="' . $key . '">
                        </form>';
                }
            } ?>
        </ul>

        <h3>Completed</h3>
        <ul id="complete">
            <?php
            if (isset($_SESSION['checkBox'])) {
                foreach ($_SESSION['checkBox'] as $key => $value) {
                    echo '
                        <form action="function.php" method="POST">
                        <li><input type="checkbox" checked
                        ><label>' . $value . '</label>
                        <input type="text">
                       
                        <button class="edit" name="editCompltBtn">Edit</button>
                        <button class="delete" name="deleteCompltBtn">Delete</button>
                   
                        </li>
                        <input type="text" hidden name="do" value="' . $key . '">
                        </form>';
                }
            }
            ?>
       </ul>
    </div>


</body>

</html>