<div class="container">
	<div class="row">
        <div class="col-sm-12">
            <div class="thumbnail">
                <img src="<?=STYLESHEET?>uploads/<?=$ad->image?>" alt="...">
                <div class="caption">
                    <p class="lead">Ad Description</p>
                    <p class=""><?=$ad->ad_desc?></p>
                </div>
            </div>
        </div>
	</div>
	<!-- Comments Section-->
	<div class="comments">
		<h4>Comments</h4>
		<div class="comment">
			<span class="comment_author">user_1</span>
			<span class="comment_date">12/8/2020</span>
			<p class="comment_description">
				I would like to meet you to discuss the latest news about the arrival of the new theme. They say it is going to be one the best themes on the market
			</p>
		</div>
		<hr>
		<div class="comment">
			<span class="comment_author">user_1</span>
			<span class="comment_date">12/8/2020</span>
			<p class="comment_description">
				I would like to meet you to discuss the latest news about the arrival of the new theme. They say it is going to be one the best themes on the market
			</p>
		</div>
        <form method="post">
            <input class="comment_input form-control success" type="text" name="comment_desc" placeholder="Type message...">
            <a href="https://www.facebook.com/dialog/oauth?client_id=2121146818157995&redirect_uri=https://127.0.0.1/mvc/public/ads/view/1&scope=email" title="Signup with facebook">
                <input type="submit" class="comment_sub btn btn-info" value="Add with Facebook">
            </a>
        </form>
	</div>


	<!-- Comments Section-->
</div>
