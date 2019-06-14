<canvas id="demo-canvas"></canvas>
<div>
    <div class="tab">
        <a class="tablinks" href="<?= base_url(); ?>sponsors/2019 ">2019</a>
        <a class="tablinks" href="<?= base_url();?>sponsors/2018 ">2018</a>
        <a class="tablinks" href="<?= base_url();?>sponsors/2017 ">2017</a>
        <a class="tablinks" href="<?= base_url();?>sponsors/2016 ">2016</a>
        <a class="tablinks" href="<?= base_url();?>sponsors/2015">2015</a>
    </div>
    
	<div class="sponsors">
		<center><h1><?= $year ?></h1></center>
		<?php foreach ($category as $cat) : ?>
		<?php if(!empty($spons[$cat->category_id])): ?>
		<div class="category">
			<div class="catname">
                <h2><u><?= $cat->name; ?></u></h2>
            </div>
			<!--<div class="owl-carousel"> -->
				<?php foreach ($spons[$cat->category_id] as $categorywise) : ?>
					<div class="spons"> <!--border:2px solid black;-->
						<a href="<?php echo $categorywise->link ?>">
							<img src="<?= base_url() ?>assets/sponslogo/<?= $categorywise->logo ?>" 
							alt="<?php echo $categorywise->sponsor_name ?>">
						</a>
					</div>
				<?php endforeach; ?>
			<!--</div> --> 
		</div>
		<?php endif; ?>
		<?php endforeach; ?>
	</div>

</div>
</div>


<style>
.catname {
    text-align: center;
    padding: 5px 0 5px 0;
}
.sponsors {
    position: absolute;
    margin-top: 15px;
	padding:2%;
    top: 35%;
    left: 15%;
    transform: translate(-12%,0);
    width: 90%;
    background: rgba(255,255,255,0.7);
    border-radius: 10px;
}
.category {
    margin: 2em 0em 2em 0em;
    border-top: 1px solid black;
    padding: 2em 0 2em 0em;
    text-align: center;
}
.tab {
    /* overflow: hidden; */
    border: 1px solid #ccc;
    /* background-color: #f1f1f1; */
    position: absolute;
    top: 20%;
    left: 50%;
    transform: translate(-50%, 0);
    color: white;
    margin-bottom:100px;

}

/* Style the as that are used to open the tab content */
.tab a {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    color: white;

}

/* Change background color of as on hover */
.tab a:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab a.active {
    background-color: #ccc;
}

.spons{
    width:30%; margin: 2em 0em; display:inline-block;
    opacity: 1;
}
.spons img{
    width:10em;
    opacity: 1;
}
@media screen and (max-width:620px){

    .spons  {
        display:block;
        width:100%;
    }
    .spons img{
        width:6em;
    }
    .tab{
        width:95%;
        margin:0;
        padding: 0;
    }
}
</style>

