

<?php if(!empty($array_result)) {?>
<tr>
 <th>Name</th>
 <th>Email</th>
 <th>Mobile</th>
 <th>Message</th>
 <th>Action</th>
</tr>
<?php 
// print_r(1234);

foreach($array_result as $value){?>
<tr>
 <td><?php echo $value['firstname'];?></td>
 <td><?php echo $value['email'];?></td>
 <td><?php echo $value['mobile'];?></td>
 <td><?php echo $value['message'];?></td>
 <td><a href="edit.php/<?php echo $value['id'];?>">Edit</a> | <a class="delete-anchor-nn"
  data-id = "<?php echo $value['id'];?>" href="#">Delete</a></td>
</tr>
<?php } 
}
else{ ?>
    <p>NO RECORD FOUND</p>
<?php }?>
<script src="index_admin.js"></script>

