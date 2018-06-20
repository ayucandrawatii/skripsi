<option value=''>- Select Kerusakan -</option>
<?php 
	foreach($kerusakan->result() as $ker)
	{
		echo '<option value="'.$ker->id.'">'.$ker->namaKerusakan.'</option>';
	}
?>