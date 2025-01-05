
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BeatBuddy</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
  <style>
    /* body {
      margin: 0;
      font-family: 'Roboto', sans-serif;
      background: linear-gradient(to bottom, #0f2027, #203a43, #2c5364);
      color: white;
      display: flex; 
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      min-height: 100vh;
      
    } */
    body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to bottom, #0f2027, #203a43, #2c5364);
            color: #fff;
            /* color: white; */
            /* display: flex; */
        } 
    .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
        }
        .header .logo {
            display: flex;
            align-items: center;
        }
        .header img {
            height: 50px;
        }
        .header .logo-text {
            margin-left: 10px;
            font-size: 24px;
            font-weight: bold;
        }
        .header nav a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
        }

    .player-container {
      text-align: center;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      padding: 30px;
      width: 100%%;
      max-width: 2900px;
      margin-top: 20px;
    }
    .player-container img {
      width: 100%;
      max-width: 350px;
      border-radius: 10px;
    }
    .player-container .song-info {
      margin: 15px 0;
    }
    .player-container .song-info h2 {
      margin: 5px 0;
      font-size: 28px;
    }
    .player-container .song-info p {
      margin: 0;
      font-size: 20px;
      color: #ccc;
    }
    .player-container .controls {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 10px;
      gap: 20px;
    }
    .player-container .controls i {
      font-size: 28px;
      cursor: pointer;
    }
    .player-container .progress-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 10px;
      width: 100%;
      padding: 0 20px;
    }
    .player-container .progress-bar {
      flex-grow: 1;
      height: 5px;
      background: #888;
      border-radius: 5px;
      margin: 0 10px;
      position: relative;
      cursor: pointer;
    }
    .player-container .progress-bar .progress-filled {
      height: 100%;
      background: #00b4d8;
      border-radius: 5px;
      width: 0%;
      transition: width 0.1s;
    }
    .player-container .time {
      font-size: 16px;
      color: #ccc;
    }
    .keluar {
      margin-top: 20px;
      text-align: center;
    }
    .keluar a {
      color: white;
      text-decoration: none;
      font-size: 18px;
      background: #00b4d8;
      padding: 10px 20px;
      border-radius: 20px;
      transition: background 0.3s;
    }
    .keluar a:hover {
      background: #0077a3;
    }

    #shuffle #repeat #next #prev {
      cursor: pointer; /* Menunjukkan bahwa ikon dapat diklik */
      transition: color 0.3s ease; /* Transisi warna halus */
    } 
  </style>
</head>
<body>
<div class="container">
   <div class="header">
    <div class="logo">
     <img alt="Logo" height="50" src="https://drive.cimahikota.go.id/s/S55zfPXtcPmiB6X/download" width="150"/>
     <div class="logo-text">
      BeatBuddy
     </div>
    </div>
    <nav>
     <a href="/">
      Home
     </a>
     
     <a href="/music">
      Music
     </a>
    </nav>
   </div>

  <!-- Audio element -->
  <audio id="audioPlayer" preload="auto"></audio>

  <div class="player-container">
    <img alt="Song cover" id="albumCover" height="350" width="350"/>
    <div class="song-info">
      <h2 id="songTitle">Circles</h2>
      <p id="songArtist">Post Malone</p>
    </div>
    <div class="progress-container">
      <span class="time" id="currentTime">01:03</span>
      <div class="progress-bar" id="progressBar">
        <div class="progress-filled"></div>
      </div>
      <span class="time" id="duration">04:03</span>
    </div>
    <div class="controls">
      <i class="fas fa-sync" id="repeat"></i>
      <i class="fas fa-step-backward" id="prev"></i>
      <i class="fas fa-play" id="playPause"></i>
      <i class="fas fa-step-forward" id="next"></i>
      <i class="fas fa-arrow-right" id="forward"></i>
      <i class="fas fa-arrow-left" id="reverse"></i>
      <i class="fas fa-random" id="shuffle"></i>
      <!-- <i class="fas fa-plus" id="add"></i> -->
    </div>
  </div>
  <div class="keluar">
    <!-- <a href="#">keluar</a> -->
  </div>

  <script>
    // Playlist array
    var playlist = {!! json_encode($formattedPlaylist) !!}
    //var playlist = {!! json_encode($formattedPlaylist) !!}
    var originalPlaylist = [...playlist]

    // playlist.sort((a, b) => {
    //   if (a.title < b.title) return 1;
    //   if (a.title > b.title) return -1;
    //   return 0;
    // });

    // var playlist = [
    //   { url: 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3', title: 'Circles', artist: 'Post Malone', cover: 'https://storage.googleapis.com/a1aa/image/7MKrezHNp2WTZKyQAhzuj1iEJFMF2myLYPgNe1opOHM3aiAUA.jpg' },
    //   { url: 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3', title: 'Blinding Lights', artist: 'The Weeknd', cover: 'https://via.placeholder.com/350x350' },
    //   { url: 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-3.mp3', title: 'Levitating', artist: 'Dua Lipa', cover: 'https://via.placeholder.com/350x350' },
    // ];

    // function lifo() {
    //   console.log(playlist)

    //   playlist.sort((a, b) => {
    //     if (a.title < b.title) return 1;
    //     if (a.title > b.title) return -1;
    //     return 0;
    //   });

    //   console.log(playlist)
    // }

    let currentTrackIndex = {!! $trackIndex !!};
    //con (currentTrackindex);
    
    let isShuffling = false;
    let isRepeating = false;
    let isFifoing = false;
    let isLifoing = false;

    const audioPlayer = document.getElementById('audioPlayer');
    const playPauseBtn = document.getElementById('playPause');
    const progressBar = document.getElementById('progressBar');
    const progressFilled = document.querySelector('.progress-filled');
    const currentTimeElem = document.getElementById('currentTime');
    const durationElem = document.getElementById('duration');
    const songTitle = document.getElementById('songTitle');
    const songArtist = document.getElementById('songArtist');
    const albumCover = document.getElementById('albumCover');
    const repeatBtn = document.getElementById('repeat');
    const prevBtn = document.getElementById('prev');
    const nextBtn = document.getElementById('next');
    const shuffleBtn = document.getElementById('shuffle');
    const reverseBtn = document.getElementById('reverse');
    const forwardBtn = document.getElementById('forward');

    function loadTrack(trackIndex) {
      const track = playlist[trackIndex];
      audioPlayer.src = track.url;
      songTitle.textContent = track.title;
      songArtist.textContent = track.artist;
      albumCover.src = track.cover;
      audioPlayer.load();
      audioPlayer.play();
      
      playPauseBtn.classList.replace('fa-play');
    }

    function updateProgress() {
      const currentTime = audioPlayer.currentTime;
      const duration = audioPlayer.duration;
      const progressPercent = (currentTime / duration) * 100;
      progressFilled.style.width = `${progressPercent}%`;

      currentTimeElem.textContent = formatTime(currentTime);
      durationElem.textContent = formatTime(duration);
    }

    function formatTime(seconds) {
      const mins = Math.floor(seconds / 60);
      const secs = Math.floor(seconds % 60);
      return `${mins < 10 ? '0' : ''}${mins}:${secs < 10 ? '0' : ''}${secs}`;
    }
//FIFO
    function nextTrack() {
      currentTrackIndex = (currentTrackIndex + 1) % playlist.length;
      loadTrack(currentTrackIndex);
    }
//LIFO
    function prevTrack() {
      currentTrackIndex = (currentTrackIndex - 1 + playlist.length) % playlist.length;
      loadTrack(currentTrackIndex);
    }

    //Automatic Fifo
    function toggleForward() {
      isFifoing = !isFifoing;
      forwardBtn.classList.toggle('active', isFifoing);
      // Mengubah warna tombol berdasarkan status shuffle
      if (isFifoing) {
        forwardBtn.style.color = '#00b4d8';//lightblue';  // Ganti warna tombol menjadi hijau
        reverseBtn.style.color = 'white';
        isLifoing = false;
        isShuffling = false;
        shuffleBtn.style.color = 'white';
      } else {
        forwardBtn.style.color = 'white';   
      }
    }
    //Automatic Lifo
    function toggleReverse() {
      isLifoing = !isLifoing;
      reverseBtn.classList.toggle('active', isLifoing);
      // Mengubah warna tombol berdasarkan status shuffle
      if (isLifoing) {
        reverseBtn.style.color = '#00b4d8';//lightblue';  // Ganti warna tombol menjadi hijau
        forwardBtn.style.color = 'white';
        isFifoing = false;
        isShuffling = false;
        shuffleBtn.style.color = 'white';
      } else {
        reverseBtn.style.color = 'white';  
      }
    }

//Random
    function toggleShuffle() {
      isShuffling = !isShuffling;
      shuffleBtn.classList.toggle('active', isShuffling);
      // Mengubah warna tombol berdasarkan status shuffle
      if (isShuffling) {
          shuffleBtn.style.color = '#00b4d8';//lightblue';  // Ganti warna tombol menjadi hijau
          isRepeating = false;
          repeatBtn.style.color = 'white';
          isFifoing = false;
          forwardBtn.style.color = 'white';
          isLifoing = false;
          reverseBtn.style.color = 'white';
      } else {
          shuffleBtn.style.color = 'white';    // Ganti warna tombol menjadi merah
          
      }
    }

    function toggleRepeat() {
      isRepeating = !isRepeating;
      repeatBtn.classList.toggle('active', isRepeating);
      if (isRepeating) {
          repeatBtn.style.color = '#00b4d8';//lightblue';  // Ganti warna tombol menjadi hijau
      } else {
          repeatBtn.style.color = 'white';    // Ganti warna tombol menjadi merah
      }
    }

    function playPause() {
      if (audioPlayer.paused) {
        audioPlayer.play();
        playPauseBtn.classList.replace('fa-play', 'fa-pause');
      } else {
        audioPlayer.pause();
        playPauseBtn.classList.replace('fa-pause', 'fa-play');
      }
    }

    // Event listeners
    playPauseBtn.addEventListener('click', playPause);
    nextBtn.addEventListener('click', nextTrack);
    prevBtn.addEventListener('click', prevTrack);
    reverseBtn.addEventListener('click', toggleReverse);
    forwardBtn.addEventListener('click', toggleForward);
    shuffleBtn.addEventListener('click', toggleShuffle);
    repeatBtn.addEventListener('click', toggleRepeat);
    audioPlayer.addEventListener('timeupdate', updateProgress);
   
    audioPlayer.addEventListener('ended', () => {
      if (isRepeating) {
        audioPlayer.currentTime = 0;
        audioPlayer.play();
      } else if (isShuffling) {
        currentTrackIndex = Math.floor(Math.random() * playlist.length);
        loadTrack(currentTrackIndex);
      } else if (isFifoing) {
        nextTrack();
      } else if (isLifoing) {
        prevTrack();
      } 
    });

    audioPlayer.addEventListener('play', function() {
      playPauseBtn.classList.replace('fa-play', 'fa-pause');
    });
    audioPlayer.addEventListener('pause', function() {
      playPauseBtn.classList.replace('fa-pause', 'fa-play');
    });

    progressBar.addEventListener('click', function(e) {
      const progressBarWidth = progressBar.offsetWidth;
      const clickX = e.offsetX;
      const duration = audioPlayer.duration;
      const seekTime = (clickX / progressBarWidth) * duration;
      audioPlayer.currentTime = seekTime;
    });
    
    loadTrack(currentTrackIndex); // Load first track FIFO
  </script>
</body>
</html>