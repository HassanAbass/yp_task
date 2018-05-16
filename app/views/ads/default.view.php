<div class="container">
    <div class="row">
        <?php foreach ($ads as $ad) :?>
            <div class="col-sm-6 col-md-4">
                <div class="adbox thumbnail">
                    <img src="../../app/views/assets/uploads/<?=$ad->image?>" alt="...">
                    <div class="caption">
                        <p class="lead desc"><?=$ad->ad_desc?></p>
                        <p>
                            <a href="view/<?=$ad->ad_id?>"
                               class="ads_link btn btn-primary"
                               role="button">
                                View Ad
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>
