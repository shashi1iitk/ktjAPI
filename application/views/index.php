<section class="hero is-dark">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">Primary title</h1>
            <h2 class="subtitle">Primary subtitle</h2>
        </div>
        
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script>
var endpoint = '<?= base_url(); ?>events',
    something = {
        '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',
		'name':'Event5',
		'genre':'Genre7',
		'description':'Kya hi kar loge',
		'rules':'Kitna baar bole nahi batayenge'
	};
let value =  $.ajax({
    url: endpoint,
    type: 'get',
    async: false,
    // dataType: 'json',
    // data: something,
    success: function(data) {
        return data;
    },
    error: function(data) {
        console.log(data);
    }
});
console.log(value.responseJSON);
</script>                
