<canvas id="demo-canvas"></canvas>
<div>
    <div class="notices">
        <h1 style="text-align: center">Notices</h1>
        <hr style="border: 1px solid #232323;">
        <?php foreach ($notices as $notice):?>
          <h2><?= $notice->title;?><span style="font-size: 0.6em;font-weight: normal;"> : <?= $notice->date; ?> </span></h2> 
          <h4><?= $notice->body; ?></h4>
          <hr style="border: 1px solid #23232366;">
        <?php endforeach;?>
    </div>
</div>
</div>


<style>
.sponsname {
    text-align: center;
}
.catname {
    margin: 4%;
    text-align: center;
}
.notices {
    position: absolute;
    top: 25%;
    left: 15%;
    transform: translate(-12%,0);
    width: 90%;
    background: #ffffffdb;
    padding:0rem 5rem 0rem 5rem; 
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
</style>

