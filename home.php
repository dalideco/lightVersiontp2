<?php
include_once 'isAuthenticated.php';
$pageTitle = 'home';
include_once 'fragments/header.php';
include_once 'classes/PersonneRepository.php';
$Repo=new PersonneRepository();
$personnes=$Repo->findAll();
?>

<div class="alert alert-success">
    Welcome 
</div>

<table class="table">
<tr>
    <th>id</th>
    <th>email</th>
    <th>password</th>
    <th>Admin </th>
    <td>Image</td>
    <th>Delete</th>
    <th>Modify</th>
</tr>
    <?php foreach($personnes as $personne){?>
    <tr>
        <td><?= $personne->id ?></td>
        <td><?= $personne->mail ?></td>
        <td><?= $personne->password ?></td> 
        <td><?= $personne->isAdmin?></td>   
        <td><img style="width: 100%;" src="pictures/<?= $personne->image?>"></img></td>
        <td><a href="delete.php?id=<?= $personne->id ?>"><i style='font-size:24px' class='fas'>&#xf12d;</i></a></td>
        <td><a href="profile.php?id=<?=$personne->id ?>"><i style='font-size:24px' class='fas'>&#xf044;</i></a></td>

    </tr>
    <?php
    }
    ?>
    <tr>
        <form enctype="multipart/form-data" action="add.php" method="post">
            <td>New Person</td>
            <td><input type="text" name="mail"></td>
            <td><input type="password" name="password"></td>
            <td><input type="text" name="isAdmin"></td>
            <td><input type="file" name="image"></td>
            <td><button type="submit">Submit</button></td>
            
        </form> 
    </tr>
</table>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</body>
</html>
