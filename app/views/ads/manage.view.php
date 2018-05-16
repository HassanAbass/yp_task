<div class="col-md-3"></div>
<div class="col-md-6">
    <h1 class="text-center">Manage Ads</h1>
    <a href="<?=PUBLIC_PATH.'ads/add'?>" class="btn btn-sm btn-primary" >New Ad</a>
    <div class='table-responsive'>
        <table class='mngTable table table-bordered'>
            <tr>
                <td>Id</td>
                <td>Description</td>
                <td>MNG</td>
            </tr>
			<?php
			if(!empty($ads))
				foreach ($ads as $i) : ?>
                <tr>
					<td><?=$i->ad_id?> </td>
					<td><?=$i->ad_desc?> </td>
                    <td>
                        <a href="<?=APP_ROOT.'public/ads/edit/'.$i->ad_id?>" class='btn-sm btn btn-success'>Edit</a>
                        <a href="<?=APP_ROOT.'public/ads/delete/'.$i->ad_id?>" class='btn-sm btn btn-danger confirm'>Delete</a>
                    </td>
                </tr>
				<?php endforeach;
			else
				echo '<tr><td colspan="7">Database is empty</td> </tr>';
			?>
        </table>
    </div>
</div>