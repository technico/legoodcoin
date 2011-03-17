<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_title() ?>
<?php use_javascript('australia')?>
<link rel="shortcut icon" href="/favicon.ico" />
<?php use_stylesheet('australia') ?>
</head>
<body>
<div class="index">
	<div class="index_top_bar"><img src="/images/australia/base_top_left_plate.png" /></div>

	<div class="index_main">
		<div class="index_top">
			<div class="top_texts">

				<div class="payoff">
					
						<strong>Fast</strong>. <strong>Simple</strong>. <strong>Free</strong>! 
					
					</div>
				<div>Select your <strong>region</strong> below to get started</div>
			</div>	
			<h1 class="logo">Dinkos.com.au - The marketplace of Australia</h1>	
		</div>

<div class="index_left">
			<a href="<?php echo url_for('depotPart1/index')?>"><img src="/images/australia/index_post_ad.png" /></a>
		</div>

		<div class="index_regions">
			<a class="region" href="<?php echo url_for('listing/index')?>">Northern Territory</a>
			<!-- 
			<a class="region" href="http://www.dinkos.com.au/act/for-sale" onclick="return startpage_set_default_ca('1_s', '.dinkos.com.au');" id="region_9">Australian Capital Territory</a>
			<a class="region" href="http://www.dinkos.com.au/nsw/for-sale" onclick="return startpage_set_default_ca('2_s', '.dinkos.com.au');" id="region_5">New South Wales</a>
			<a class="region" href="http://www.dinkos.com.au/qld/for-sale" onclick="return startpage_set_default_ca('4_s', '.dinkos.com.au');" id="region_4">Queensland</a>
			<a class="region" href="http://www.dinkos.com.au/sa/for-sale" onclick="return startpage_set_default_ca('5_s', '.dinkos.com.au');" id="region_7">South Australia</a>
			<a class="region" href="http://www.dinkos.com.au/tas/for-sale" onclick="return startpage_set_default_ca('8_s', '.dinkos.com.au');" id="region_11">Tasmania</a>
			<a class="region" href="http://www.dinkos.com.au/vic/for-sale" onclick="return startpage_set_default_ca('7_s', '.dinkos.com.au');" id="region_6">Victoria</a>
			<a class="region" href="http://www.dinkos.com.au/wa/for-sale" onclick="return startpage_set_default_ca('6_s', '.dinkos.com.au');" id="region_1">Western Australia</a>
			<div class="region_space"></div>
			<a class="region_small" href="http://www.dinkos.com.au/Adelaide/for-sale" id="region_15">Adelaide</a>
			<a class="region_small" href="http://www.dinkos.com.au/Brisbane/for-sale" id="region_13">Brisbane</a>
			<a class="region_small" href="http://www.dinkos.com.au/Canberra/for-sale" id="region_9">Canberra</a>
			<a class="region_small" href="http://www.dinkos.com.au/Darwin/for-sale" id="region_3">Darwin</a>
			<a class="region_small" href="http://www.dinkos.com.au/Hobart/for-sale" id="region_12">Hobart</a>
			<a class="region_small" href="http://www.dinkos.com.au/Melbourne/for-sale" id="region_10">Melbourne</a>
			<a class="region_small" href="http://www.dinkos.com.au/Perth/for-sale" id="region_14">Perth</a>
			<a class="region_small" href="http://www.dinkos.com.au/Sydney/for-sale" id="region_8">Sydney</a>
			-->
		</div>
		

		

		<div class="index_middle">
			<div class="index_map">
				<img border="0" usemap="#index_map_map" src="/images/australia/empty.gif" alt="Dinkos" class="index_overlay" />
			</div>
		</div>

		
	</div>

	<map name="index_map_map" id="index_map_map">
			<area coords="187,53,198,46,204,37,201,25,206,20,212,25,220,24,220,15,227,15,230,12,231,8,232,4,235,1,239,1,254,12,275,12,279,14,283,14,288,12,293,15,293,22,292,28,282,31,280,34,281,39,281,43,274,49,274,53,289,62,292,65,306,74,302,203,192,203,187,53,187,52" href="<?php echo url_for('listing/index')?>" class="region" id="region_2" shape="poly" />
		<!-- 
		<area coords="205,19,212,25,220,23,220,16,212,15,212,14,219,10,219,8,216,6,206,6,201,10,202,14,209,15,212,14,212,15,206,19,206,19" href="http://www.dinkos.com.au/Darwin/for-sale" class="region" id="region_3" shape="poly" />
		<area coords="480,238,482,228,481,227,473,229,473,232,473,235,469,237,469,240,474,246,483,247,485,244,480,237" href="http://www.dinkos.com.au/Brisbane/for-sale" class="region" id="region_13" shape="poly" />
		<area coords="451,316,443,329,439,328,431,329,430,325,431,321,438,315,438,312,444,312,450,316" href="http://www.dinkos.com.au/Sydney/for-sale" class="region" id="region_8" shape="poly" />
		<area coords="420,328,412,334,411,338,412,347,415,348,414,351,417,355,421,353,420,345,422,344,421,341,422,336,427,336,427,334,424,333,423,329,420,328" href="http://www.dinkos.com.au/act/for-sale" onclick="return startpage_set_default_ca('1_s', '.dinkos.com.au');" class="region" id="region_9" shape="poly" />
		<area coords="395,436,390,430,385,429,381,433,380,440,386,445,396,436" href="http://www.dinkos.com.au/Hobart/for-sale" class="region" id="region_12" shape="poly" />
		<area coords="361,376,358,373,366,363,372,360,381,365,382,369,379,377,374,379,370,377,369,375,370,373,368,372,360,376" href="http://www.dinkos.com.au/Melbourne/for-sale" class="region" id="region_10" shape="poly" />
		<area coords="300,317,306,316,310,321,307,326,302,331,299,335,294,337,291,339,285,339,284,337,285,333,290,333,294,333,299,333,299,335,302,332,301,329,301,323,301,319,299,317,301,316" href="http://www.dinkos.com.au/Adelaide/for-sale" class="region" id="region_15" shape="poly" />
		<area coords="38,286,51,285,56,287,57,294,56,299,52,304,50,310,44,310,44,295,39,287,39,286" href="http://www.dinkos.com.au/Perth/for-sale" class="region" id="region_14" shape="poly" />
		<area coords="335,246,331,312,336,315,342,315,346,321,354,325,365,337,366,342,372,344,375,339,379,339,382,344,401,344,406,348,412,347,411,339,412,334,421,328,423,330,424,333,427,334,427,337,421,337,421,341,422,344,419,345,420,348,421,353,418,355,414,352,414,348,412,347,407,348,409,358,414,362,425,369,428,363,430,355,431,348,436,342,440,335,444,329,438,328,431,329,430,325,431,321,437,316,438,313,443,312,449,315,452,316,458,310,464,307,470,296,473,287,478,275,483,264,487,257,488,252,469,252,464,257,455,258,452,252,446,250,435,250,428,254,390,249,335,246" href="http://www.dinkos.com.au/nsw/for-sale" onclick="return startpage_set_default_ca('2_s', '.dinkos.com.au');" class="region" id="region_5" shape="poly" />
		<area coords="368,409,381,413,386,413,396,412,400,414,404,421,403,430,395,436,390,430,385,429,380,433,381,440,385,445,383,447,375,445,372,439,372,433,367,427,364,415,366,409,369,409" href="http://www.dinkos.com.au/tas/for-sale" onclick="return startpage_set_default_ca('8_s', '.dinkos.com.au');" class="region" id="region_11" shape="poly" />
		<area coords="331,312,329,369,333,374,342,373,350,378,358,380,361,377,358,373,366,363,371,360,382,365,383,369,379,376,375,380,383,386,388,386,393,379,400,374,409,372,420,372,425,370,424,369,414,363,409,357,406,348,401,344,382,345,379,340,375,339,372,344,366,342,365,337,354,325,347,321,344,316,342,315,336,315,331,312" href="http://www.dinkos.com.au/vic/for-sale" onclick="return startpage_set_default_ca('7_s', '.dinkos.com.au');" class="region" id="region_6" shape="poly" />
		<area coords="194,281,179,288,163,291,149,298,142,303,137,313,128,315,115,316,110,313,94,322,83,328,74,337,45,335,37,324,44,317,44,310,50,310,53,304,56,299,57,287,51,285,38,286,30,273,19,249,15,239,12,235,3,231,0,224,1,222,7,219,12,220,12,217,1,204,0,199,0,187,1,183,0,177,0,166,4,164,7,169,7,172,30,145,34,141,46,143,61,136,92,119,101,110,101,103,97,97,98,93,105,84,109,81,113,86,115,88,117,86,116,79,118,76,125,77,129,76,126,67,126,63,138,56,146,46,158,38,162,40,163,45,172,46,175,50,175,54,178,56,187,52,194,281" href="http://www.dinkos.com.au/wa/for-sale" onclick="return startpage_set_default_ca('6_s', '.dinkos.com.au');" class="region" id="region_1" shape="poly" />
		<area coords="195,282,202,279,207,279,219,277,225,278,239,286,250,286,253,294,265,307,267,321,271,324,277,323,279,314,289,302,294,300,296,302,294,307,288,322,289,327,295,327,298,317,305,316,311,321,306,327,301,333,313,338,316,346,315,357,318,363,328,368,338,205,302,203,192,203,194,281" href="http://www.dinkos.com.au/sa/for-sale" onclick="return startpage_set_default_ca('5_s', '.dinkos.com.au');" class="region" id="region_7" shape="poly" />
		<area coords="302,203,338,205,336,246,391,249,428,254,435,250,446,250,452,252,455,258,464,258,469,252,488,252,489,248,485,245,483,247,475,246,469,240,469,237,472,234,472,232,474,230,478,228,482,227,484,221,486,213,484,207,464,185,460,170,457,167,452,167,452,170,448,152,440,141,440,132,436,129,422,121,412,107,410,99,410,91,405,78,405,57,400,53,391,51,387,50,384,45,382,22,380,11,377,1,371,0,364,2,360,11,358,23,358,31,355,40,354,56,352,71,346,85,340,92,334,92,329,92,320,83,313,76,306,74,303,203" href="http://www.dinkos.com.au/qld/for-sale" onclick="return startpage_set_default_ca('4_s', '.dinkos.com.au');" class="region" id="region_4" shape="poly" />
		-->
	</map>
	
</div>
</body>
</html>
