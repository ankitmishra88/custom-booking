<?php
global $wpdb;
$table=$cd->aParam['cd_slots'];

if(isset($_POST['slot_id'])){
if(isset($_POST['add'])){
$q="SELECT * FROM $table where id={$_POST['slot_id']}";
$res=$wpdb->get_results($q,"ARRAY_A")[0];
$slots=$res['slots'];
$slots=unserialize($slots);
array_push($slots,$_POST['add']);
print_r($slots);
$slots=serialize($slots);
$wpdb->update($table,array('slots'=>$slots),array('id'=>$_POST['slot_id']),array('%s'));
echo 'inside';
}

if(isset($_POST['update'])){
$slots=$_POST['update'];
$slots=serialize($slots);
$wpdb->update($table,array('slots'=>$slots),array('id'=>$_POST['slot_id']),array('%s'));
}

$q="SELECT * FROM $table where id={$_POST['slot_id']}";
$res=$wpdb->get_results($q,"ARRAY_A")[0];
$slots=$res['slots'];
$slots=unserialize($slots);
print_r($slots);
?>
<form method="post" action="">
<input type="hidden" name="slot_id" value="<?php echo $_POST['slot_id'];?>">
<table>
<?php
$count=0;
foreach($slots as $key=>$value){
$count++;
?>
<tr>
<td><input name="update[<?php echo $key;?>][label]" value="<?php echo $value['label']?>"></td>
<td><input name="update[<?php echo $key;?>][value]" value="<?php echo $value['value']?>"></td>
</tr>
<?php
}
if($count>0){
echo '<tr><td colspan="2"><input type="submit" value="update"></td></tr>';
}
?>
</table>
</form>
<form method="post" action="">
<input type="hidden" name="slot_id" value="<?php echo $_POST['slot_id'];?>">
<table>
<tr>
<td><input name="add[label]" required></td>
<td><input name="add[value]" required></td>
<td><input type="submit" value="Add"></td>
</tr>
</table>
</form>
<?php
unset($_POST);
}

if(isset($_POST['slot'])){

$wpdb->show_errors();
$data=array('title'=>$_POST['slot']['title'],'slots'=>serialize(array()));
$chk=$wpdb->insert($table,$data,array('%s'));
if($chk){
echo "inserted successfully";
}
else{
$wpdb->print_error();
unset($_POST['slot']);
}

}
$q="SELECT * FROM $table";
$res=$wpdb->get_results($q,"ARRAY_A");
?>
<div class="cd_blocks">
<h3>Slots</h3>
<table>
<?php foreach($res as $key=>$val){
	echo '<tr><td>'.$val['title'].'</td><td><form method="post" action=""><button type="submit" value="'.$val['id'].'" name="slot_id">Edit</button></form></td></tr>';
}?>

</table>
<h3>Add New Slot</h3>
<form method="POST" action="">
<table>
<tr><td><input name="slot[title]" type="text"></td><td><input type="submit" value="Add"/></td></tr>
</table>
</form>
</div>

