<div class="container">
    <div class="editAd">
        <form  method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8">
                    <h3>Ad description</h3>
                    <textarea name="ad_desc"><?=$editAd->ad_desc?></textarea>
                </div>
                <div class="col-md-4">
                    <img class="thumbnail img-responsive" src="<?=STYLESHEET?>uploads/<?=$editAd->image?>" alt="Ad Image">
                </div>
                <input type="file" name="ad_image">
                <input type="submit" value="Save" class="btn btn-primary btn-sm">
            </div>
        </form>
    </div>
</div>
