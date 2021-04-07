<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>

<?php
	 $brand = new brand(); // tên class trong file .ok thanks nha
	//load tren 1 trang isset no ko co lay dc gia tri, vi bien delid da bi xoa khi load lai
	 if ($_GET['delid']!= null) {
		$id = $_GET['delid'];
		//var_dump($id);
		 $delbrand = $brand->del_brand($id);
    }  
   
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
                <div class="block">       
				<?php

                  if(isset($delbrand)){
                    echo $delbrand;
                    
				} 
				 
                ?> 
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$show_brand = $brand->show_brand();
						if($show_brand){
							$i = 0;
							while($result = $show_brand->fetch_assoc()){
							$i++;
						
					?>

						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $result['brandName']?></td>
                         	<td><a href="brandedit.php?brandId=<?php echo $result['brandId']?>">Edit</a>||<a onclick=" return confirm('Are you sure you want to delete this')" href="?delid=<?php echo $result['brandId']?>">Delete</a></td> 
                        </tr>
						<?php
							}
						}
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>
