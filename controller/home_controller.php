<?php
class HomeController extends AlaneeController {
	public $classes = array('alanee_classes/access_management/acl_class.php','alanee_classes/common/alaneecommon_class.php','alanee_classes/common/navigation_class.php');
	public function index() {
		$this->pageTitle = "Japan Macro Advisors | Abenomics, Japan economic indicator, Japan economic analysis, Japan economic policy";
		$this->renderResultSet['meta']['description']="Japan Macro Advisors offers an independent and unbiased economic analysis on the Japanese economy. Through our forecast, regularly updated economic commentaries, over 2000 downloadable economic data and free use of interactive charts, we aim to contribute to an open and evidence-based debate on Japan's economic future. ";
		$this->renderResultSet['meta']['keywords']='Abenomics, Japan economy, Japan economic analysis, Japan economic indicator, Japan economic policy, Bank of Japan Monetary policy, Japan GDP';
		// get all category items
		$postCategory = new postCategory();
		$media = new Media();
		$this->renderResultSet['result']['rightside']['notice'] = $media->getLatestMediaAsNotice(5);
		$this->renderResultSet['result']['rightside']['media'] = $media->getLatestMedia(5);
		$AlaneeCommon = new Alaneecommon();
		if(count($this->renderResultSet['result']['rightside']['notice'])>0) {
			foreach ($this->renderResultSet['result']['rightside']['notice'] as &$rwn) {
				$rwn['media_value_text'] = $AlaneeCommon->editorfix($rwn['media_value_text']);
			}
		}
		if(count($this->renderResultSet['result']['rightside']['media'])>0) {
			foreach ($this->renderResultSet['result']['rightside']['media'] as &$rwm) {
				$rwm['media_value_text'] = $AlaneeCommon->editorfix($rwm['media_value_text']);
			}
		}
		$this->populateLeftMenuLinks();
		$post = new Post();
		$this->renderResultSet['result']['news'] = $post->getLatestNewsItems(5);
		$homepagegraph = new Homepagegraph();
		$homepage_graph_details = $homepagegraph->getHomepageGraph();
		$homepageGraph_title = $homepage_graph_details['title'];
		$homepageGraph_description = $homepage_graph_details['description'];
		$homepageGraph_publish_date = $homepage_graph_details['published_date'];
		$homepageGraph_report_url = $homepage_graph_details['report_link'];
		$homepageGraph_code = $homepage_graph_details['graph_code'];
		$homePageGraphContent = "<div class='dv_home_mn_graph_new_ico_txt'>$homepageGraph_title</div><div style='padding-bottom:15px;font-size:12px;'>$homepageGraph_description<i>($homepageGraph_publish_date)</i> <br><a href='".$this->url($homepageGraph_report_url)."'>Click here for the full version of comments and chart functions.</a></div>";
		$homePageGraphContent .= $AlaneeCommon->makeChart($homepageGraph_code,false);
		$this->renderResultSet['result']['homepagegraph'] = $homePageGraphContent;
		$this->renderView();
	}
	
	public function admin_index() {
		$this->renderView();
	}
	
}

?>