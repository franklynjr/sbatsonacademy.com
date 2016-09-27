
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<video id="my-video" class="video-js vjs-sublime-skin" controls preload="auto"
   data-setup="{}">

    <source src="/files/test.mp4" type="video/mp4"/>
</video>
    


<script>

var video = document.querySelector('video');

var assetURL = '/files/test.mp4';
// Need to be specific for Blink regarding codecs
// ./mp4info frag_bunny.mp4 | grep Codec
var mimeCodec = 'video/mp4; codecs="avc1.42E01E, mp4a.40.2"';
//var mimeCodec = 'video/webm; codecs="vorbis,vp8"';

if ('MediaSource' in window && MediaSource.isTypeSupported(mimeCodec)) {
  var mediaSource = new MediaSource;
  //console.log(mediaSource.readyState); // closed
  //video.src = URL.createObjectURL(mediaSource);
  //mediaSource.addEventListener('sourceopen', sourceOpen);
} else {
  console.error('Unsupported MIME type or codec: ', mimeCodec);
}

function sourceOpen (_) {
  //console.log(this.readyState); // open
  var mediaSource = this;
  var sourceBuffer = mediaSource.addSourceBuffer(mimeCodec);
  fetchAB(assetURL, function (buf) {
    sourceBuffer.addEventListener('updateend', function (_) {
      mediaSource.endOfStream();
      video.play();
      //console.log(mediaSource.readyState); // ended
    }, false);
    sourceBuffer.appendBuffer(buf);
  });
};

function fetchAB (url, cb) {
  console.log(url);
  var xhr = new XMLHttpRequest;
  xhr.open('get', url);
  xhr.responseType = 'arraybuffer';
  xhr.addEventListener("readystatechange", function () {
       if (xhr.readyState == xhr.DONE) {
            cb(xhr.response);
       }
   });
  
  xhr.send();
};

</script>

<script src="http://vjs.zencdn.net/5.10.2/video.js"></script>   