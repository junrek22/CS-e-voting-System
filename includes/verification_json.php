<?php 
    include "db.php";
    $queryDisplay = $conn->prepare("SELECT * FROM voters WHERE Status = 'Pending' ORDER BY id DESC");
    $queryDisplay->execute();
?>
    <?php foreach($queryDisplay as $query): ?>
    <tr id="table-row-<?php echo $query['id'];?>">
        <td scope="row"><img src="<?php echo "../profile/".$query['Profile_pic']; ?>" alt=""></td>
        <th><?php echo $query['UserID']; ?></th>
        <td><?php echo $query['Firstname']; ?></td>
        <td><?php echo $query['Lastname']; ?></td>
        <td id="onChange-<?php echo $query['id'];?>"><button id="accept-<?php echo $query['id'];?>" class="btn btn-primary">Accept</button>
        <button id="decline-<?php echo $query['id'];?>" class="btn btn-danger">Decline</button></td>
    </tr>
    <?php endforeach; ?>

