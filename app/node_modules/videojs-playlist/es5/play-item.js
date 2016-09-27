'use strict';

Object.defineProperty(exports, '__esModule', {
  value: true
});

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { 'default': obj }; }

var _globalWindow = require('global/window');

var _globalWindow2 = _interopRequireDefault(_globalWindow);

var _autoAdvanceJs = require('./auto-advance.js');

/**
 * Removes all remote text tracks from a player.
 *
 * @param  {Player} player
 */
var clearTracks = function clearTracks(player) {
  var tracks = player.remoteTextTracks();
  var i = tracks && tracks.length || 0;

  // This uses a `while` loop rather than `forEach` because the
  // `TextTrackList` object is a live DOM list (not an array).
  while (i--) {
    player.removeRemoteTextTrack(tracks[i]);
  }
};

/**
 * Plays an item on a player's playlist.
 *
 * @param  {Player} player
 * @param  {Number} delay
 *         The number of seconds to wait before each auto-advance.
 *
 * @param  {Object} item
 *         A source from the playlist.
 *
 * @return {Player}
 */
var playItem = function playItem(player, delay, item) {
  var Cue = _globalWindow2['default'].VTTCue || _globalWindow2['default'].TextTrackCue;
  var replay = !player.paused() || player.ended();

  player.poster(item.poster || '');
  player.src(item.sources);

  clearTracks(player);

  if (item.cuePoints && item.cuePoints.length) {
    (function () {
      var trackEl = player.addRemoteTextTrack({ kind: 'metadata' });

      item.cuePoints.forEach(function (cue) {
        var vttCue = new Cue(cue.startTime || cue.time || 0, cue.endTime || cue.time || 0, cue.type);

        trackEl.track.addCue(vttCue);
      });
    })();
  }

  (item.textTracks || []).forEach(player.addRemoteTextTrack.bind(player));

  if (replay) {
    player.play();
  }

  (0, _autoAdvanceJs.setup)(player, delay);

  return player;
};

exports['default'] = playItem;
exports.clearTracks = clearTracks;