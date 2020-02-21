<?php
global $wpdb;
$table=$cd->aParam['cd_table'];
if(isset($_POST['upd'])){

$id=$_POST['id'];
$var=$_POST['upd'];
$title=$var['title'];
$price=$var['price'];
$thumbnail=$var['thumbnail'];
$description=$var['description'];
$data=array();
$data=array(
'title'=>$title,
'price'=>$price,
'thumbnail'=>$thumbnail,
'description'=>$description
);
$wpdb->update($table,$data,array('id'=>$id),array('%s','%f','%s','%s'));
}
if(isset($_POST['cd'])){
//print_r($_POST['cd']);

$data=array();
foreach($_POST['cd'] as $key=>$val){
$data[$key]=$val;
}
//print_r($data);
$wpdb->show_errors();
$chk=$wpdb->insert($table,$data,array('%s','%f','%s','%s'));
if($chk)
echo "inserted successfully";
}
else{
$wpdb->print_error();
}
//print_r($chk);
$q="SELECT * FROM $table";
$res=$wpdb->get_results($q,"ARRAY_A");
//echo $q;
//print_r($res);

?>
<div class="option-group">
	<h3>
		All Addons
	</h3>
<table>
	<thead>
<tr>
<th>Title</th>
<th>Price</th>
<th>Image</th>
<th>Thumbnail</th>
<th colspan="2">Description</th>
</tr>
		</thead>
<?php foreach($res as $key=>$val){
?>
<form method="post" action="" >
<input type="hidden" name="id" value="<?php echo $val['id']?>">
<tr>
<td><input type="text" value="<?php echo $val['title']?>" name="upd[title]"/></td>
<td><input type="number" value="<?php echo $val['price']?>" name="upd[price]"/></td>
<td><input type="text" value="<?php echo $val['thumbnail']?>" name="upd[thumbnail]"/></td>
<td><textarea name="upd[description]"><?php echo $val['description']?></textarea></td>
<td><input type="submit" class="btn-submit" value="Update"/></td>
</tr>
</form>
<?
}?>
</table>

</div>
<div class="option-group">
	<h3>
		Add New Addons
	</h3>
<form action="" method="post">
<table>
<tr>
<th>Title</th>
<th>Price</th>
<th>Thumbnail</th>
<th colspan="2">Description</th>
</tr>
<tr>
<td><input type="text" placeholder="Enter Title For Addon" name="cd[title]"/></td>
<td><input type="number" placeholder="Enter Price For Addon" name="cd[price]"/></td>
<td><input type="text" placeholder="Enter Thumb Url" name="cd[thumbnail]"/></td>
<td><textarea name="cd[description]">Enter Description</textarea></td>
<td><input type="submit" class="btn-submit" value="add"/></td>
</tr>
</table>
</form>

</div>