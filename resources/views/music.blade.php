<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Music Playlist
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to bottom, #0f2027, #203a43, #2c5364);
            color: #fff;
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
        .search-bar {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .search-bar input {
            width: 80%;
            padding: 10px;
            border-radius: 20px;
            border: none;
            outline: none;
        }
        .playlist {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 20px;
        }
        .playlist h2 {
            margin: 0 0 20px 0;
        }
        .playlist table {
            width: 100%;
            border-collapse: collapse;
        }
        .playlist th, .playlist td {
            padding: 10px;
            text-align: left;
        }
        .playlist th {
            background: rgba(255, 255, 255, 0.2);
        }
        .playlist tr:nth-child(even) {
            background: rgba(255, 255, 255, 0.1);
        }
        .playlist img {
            height: 40px;
            width: 40px;
            border-radius: 5px;
        }
        .love-icon {
            cursor: pointer;
            fill: none;
            stroke: #1db954;
            stroke-width: 2;
            transition: fill 0.3s ease;
            width: 24px;
            height: 24px;
            vertical-align: middle;
            margin-right: 14px;
        }
        .love-icon.liked {
            fill: #1db954;
            stroke: none;
        }
        .playlist .fa-ellipsis-h {
            color: #fff;
            cursor: pointer;
        }
        @media (max-width: 768px) {
            .search-bar input {
                width: 100%;
            }
            .playlist th, .playlist td {
                padding: 5px;
            }
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
     <a id="show_url" href="/show">
      Next Up
     </a>
     <a href="/music">
      Music
     </a>
    </nav>
   </div>
   <!-- <div class="search-bar">
    <input placeholder="Search for songs, artists, albums..." type="text"/>
   </div> -->
   <div class="playlist">
    <h2>
     All Music
    </h2>
    <table id="daftar_lagu">
     <thead>
      <tr>
       <th>
        #
       </th>
       <th>
       </th>
       <th>
        Title
       </th>
       <th>
        Album
       </th>
       <th>
        Time
       </th>
      
      </tr>
     </thead>
     <tbody>
        <?php
            $array_lagu = $data['lagu'];
            shuffle($array_lagu);
            $i=0;
        ?>
     @foreach ($array_lagu as $key => $value)
      <tr data-id="{{ $value['id_lagu'] }}">
        <?php $i++;

        ?>
       <td>
        <?php echo ($i);
        ?>
       </td>
       <td>
        <!-- <img alt="Song Image" height="40" src="https://drive.cimahikota.go.id/s/5DHtSAdJ353XQgP/download" width="40"/> -->
        <img alt="Song Image" height="40" src="{{$value['img']}}" width="40"/>
       </td>
       <td>
        <a href="/player?playlist={{$value['id_lagu']}}&trackIndex=0" style="color: #fff; text-decoration: none;">{{$value['nama_lagu']}}</a>
       </td>
       <td>
        <a href="#" style="color: #fff; text-decoration: none;">{{$value['albums']}}</a>
       </td>
       <td>
        <svg class="love-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" onclick="toggleLike(this)"  data-id="{{ $value['id_lagu'] }}">
          <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
        </svg>
        {{$value['time']}}
       </td>
      </tr>
      @endforeach
    </tbody>
    </table>
    </div>
    <script>
    // var daftar_lagu = document.getElementById(daftar_lagu);
    var arr_lagu;
    var showUrl = document.getElementById("show_url");

   function toggleLike(element) {
        element.classList.toggle('liked');

        var currentHref = showUrl.href;

        const songId = element.getAttribute('data-id');

        // Append or modify the query parameter
        var url = new URL(currentHref); // Use the URL constructor for easier manipulation

        // Get the current songs parameter
        var currentSongs = url.searchParams.get('songs') || ''; // Get current songs or initialize as an empty string

        // Split the current songs into an array
        var songList = currentSongs ? currentSongs.split(',') : [];

        // Add or remove the song ID from the list based on its presence
        if (songList.includes(songId)) {
            // If the song ID is already in the list, remove it
            songList = songList.filter(id => id !== songId);
        } else {
            // Otherwise, add the song ID to the list
            songList.push(songId);
        }

        // Update the songs parameter with the updated list
        url.searchParams.set('songs', songList.join(','));

        // Update the href of the anchor element
        showUrl.href = url.toString();

        // Log the updated URL for debugging
        console.log("Updated URL:", showUrl.href);
    }
  </script>
    </body>
        <!-- <img alt="Song Image" height=""> -->
         </html>