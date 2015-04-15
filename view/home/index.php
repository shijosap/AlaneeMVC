<?php 
$resn = $this->resultSet['result']['news'];
?>
    <div class="content_midsection">
      <div id="dv_home_mn_graph" style="height:520px;">
      	<?php echo $this->resultSet['result']['homepagegraph'];  ?>
      </div>
      <div class="reports"><br>
     <h3 class="recently">Recently published reports</h3>
      </div>
    <?php 
    $count = count($resn);
	if($count==0)
	{
		?>
      <div class="mid_singlesection">
        <h3>Sorry, <span>No news found</span></h3>
      </div>
        <?php
	}
	else
	{
		
		for($i=0;$i<$count;$i++)
		{
		$today =  date('y-m-d');
		$today =  strtotime($today);
		$today = strtotime("-7 day", $today);
		$resn_date =  strtotime($resn[$i]['post_released']);
		$news_link_url = $this->url(array('controller'=>'news','action'=>'view','params'=>$resn[$i]['post_url']));
			?>
		  <div class="mid_singlesection <?php if ($i == 0) echo "first-section";?> <?php if ($i == $count - 1) echo "last-section";?>"><?php if ($resn_date > $today) echo '<span class="latest">Latest</span>'; ?>
  <?php if(!empty($resn[$i]['post_released'])) {?><span class="released <?php if ($resn_date > $today) echo "first"; ?>"><?php echo stripslashes($resn[$i]['post_released']);?></span><?php }?>
			<div class="title"><a  class="title-link" href="<?php echo $news_link_url;?>"><h3 class="title"><?php echo stripslashes($resn[$i]['post_title']);?></h3></a></div>
                               
			    <?php if(!empty($resn[$i]['post_heading'])) {?> <h5><?php echo stripslashes($resn[$i]['post_heading']);?></h5><?php }?>
                                
			<?php if(!empty($resn[$i]['post_subheading'])) {?><h3><?php echo stripslashes($resn[$i]['post_subheading']);?></h3><?php }?>
                              
			<p><?php echo $resn[$i]['post_cms_small']; // cleanMyCkEditor($resn[$i]['post_cms_small']);?><a  class="readmore" href="<?php echo $news_link_url;?>"> Read more.. </a></p>
		  </div>
			<?php
		}
	}
	?>
    </div>
<?php 
 include('view/templates/rightside.php');
?>
<form name="download" id="download" method="post" action="<?php echo $this->url('chart/downloadxls')?>">
<input type="hidden" name="data" id="data" value="" />

</form>