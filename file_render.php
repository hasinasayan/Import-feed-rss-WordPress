<?php
//Depend on your rss feed to display in the file
foreach ($rss->channel->item as $key => $feed_item){
$itunes = $feed_item->children('http://www.itunes.com/dtds/podcast-1.0.dtd');
$title = $feed_item->title;
$date = date('d M Y',strtotime($feed_item->pubDate));
$summary=$itunes->summary;
$image = $itunes->image->attributes();
$image_rss = $image['href'];
$author = $itunes->author;
$audio = $feed_item->enclosure->attributes();
$audio_rss = $audio->url; ?>
<div class="container d-block d-md-flex podcast-entry bg-white mb-5">
    <div class="col image" style="background-image: url('<? echo $image['href'] ?>');"></div>
    <div class="col text">
        <h3 class="font-weight-light"><a href=""><?php echo $title ?></a></h3>
        <div class="text-white mb-3"><span class="text-black-opacity-05"><small><?php echo $author ?><span
                            class="sep">/</span><?php echo $date ?></small></span></div>
        <div class="player">
            <audio id="player2" preload="none" controls style="max-width: 100%">
                <source src="<?php echo $audio_rss; ?>" type="audio/mp3">
            </audio>
        </div>
    </div>
    <div class="col">
        <p><?php echo $summary ?></p>
    </div>
</div>
<?php
}
