
<div class="embed-video">
  <video id="video" (click)="toggleVideo()" #videoPlayer frameborder="0" allowfullscreen uk-responsive controls preload="none" class="lazy" poster="<?php echo base_url($poster->thumb); ?>">
    <source src="<?php echo $player->url; ?>" type="video/<?php echo $player->videotype; ?>">
  </video>
</div>

<script>
var video = document.getElementById('video');
  video.addEventListener('loadedmetadata', function() {
    if (video.buffered.length === 0) return;
    var bufferedSeconds = video.buffered.end(0) - video.buffered.start(0);
  });
  document.addEventListener("DOMContentLoaded", function() {
    var lazyVideos = [].slice.call(document.querySelectorAll("video.lazy"));

    if ("IntersectionObserver" in window) {
      var lazyVideoObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(video) {
          if (video.isIntersecting) {
            for (var source in video.target.children) {
              var videoSource = video.target.children[source];
              if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
                videoSource.src = videoSource.dataset.src;
              }
            }

            video.target.load();
            video.target.classList.remove("lazy");
            lazyVideoObserver.unobserve(video.target);
          }
        });
      });

      lazyVideos.forEach(function(lazyVideo) {
        lazyVideoObserver.observe(lazyVideo);
      });
    }
  });

</script>
