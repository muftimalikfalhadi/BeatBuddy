<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeatBuddy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Reset beberapa gaya default */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to bottom, #0f2027, #203a43, #2c5364);
            color: white;
            min-height: 100vh;
            width: 100%;
        }

        /* Kontainer utama */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            flex-wrap: wrap;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 150px;
            margin-right: 10px;
        }

        .logo h1 {
            font-size: 32px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .nav {
            display: flex;
            gap: 20px;
        }

        .nav a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
            transition: color 0.3s ease, text-decoration 0.3s ease;
        }

        .nav a:hover {
            color: #ff7b00;
            text-decoration: underline;
        }

        /* Search Bar */
        .search-bar {
            display: flex;
            justify-content: flex-end;
            margin: 20px 0;
        }

        .search-bar input {
            width: 100%;
            max-width: 600px;
            padding: 12px 20px;
            border-radius: 20px;
            border: none;
            font-size: 16px;
            background-color: #ccc;
            color: #333;
            transition: background-color 0.3s ease;
        }

        .search-bar input:focus {
            background-color: #ff7b00;
            outline: none;
        }

        /* Main Content */
        .main-content {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
            flex-wrap: wrap;
        }

        /* Welcome Section */
        .welcome-section {
            position: relative;
            flex: 1;
            margin-right: 20px;
            max-width: 100%;
        }

        .welcome-section .background-image {
            width: 100%;
            height: 300px;
            border-radius: 10px;
            background: url('https://drive.cimahikota.go.id/s/5DHtSAdJ353XQgP/download') no-repeat center center;
            background-size: cover;
            position: relative;
            transition: transform 0.3s ease;
        }

        .welcome-section .background-image:hover {
            transform: scale(1.05);
        }

        .welcome-text {
            position: absolute;
            top: 20px;
            left: 20px;
            color: white;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.6);
        }

        .welcome-text h2 {
            font-size: 36px;
            margin: 0;
        }

        .welcome-text h2 span {
            color: #00d1b2;
        }

        .welcome-text h3 {
            font-size: 24px;
            margin: 10px 0 0;
        }

        .welcome-text h3 span {
            color: #00d1b2;
        }

        /* Music List */
        .music-list {
            flex: 1;
            margin-left: 20px;
        }

        .music-list h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: white;
            background: #2c2c2c;
            padding: 10px;
            border-radius: 5px;
        }

        .music-list table {
            width: 100%;
            border-collapse: collapse;
        }

        .music-list th, .music-list td {
            padding: 10px;
            text-align: left;
        }

        .music-list th {
            background: #1c3b4d;
        }

        .music-list tr:nth-child(even) {
            background: #1a2e3b;
        }

        .music-list tr:nth-child(odd) {
            background: #1e3a4d;
        }

        .music-list .fa-heart {
            color: #00d1b2;
            margin-right: 10px;
        }

        .song-info {
            display: flex;
            align-items: center;
        }

        .song-info img {
            margin-right: 10px;
            width: 50px;
            height: 50px;
        }

        .song-info .song-title {
            font-weight: bold;
            color: #00d1b2;
        }

        .song-info .song-album {
            font-size: 14px;
            color: #ccc;
        }

        /* Top Albums */
        .top-albums {
            margin: 20px 0;
        }

        .top-albums h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: white;
        }

        /* Albums Section */
        .albums {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .album {
            text-align: center;
            background: #2c2c2c;
            padding: 15px;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: white;
        }

        .album:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.3);
        }

        .album img {
            width: 100%;
            height: 250px;
            border-radius: 10px;
            display: block;
            margin-bottom: 10px;
        }

        .album p {
            margin: 0;
            font-size: 16px;
            line-height: 1.4;
        }

        .album p:first-child {
            font-weight: bold;
        }

        .album p:last-child {
            color: #ccc;
        }

        .album:hover p {
            color: #00d1b2;
        }

        /* View All Section */
        .view-all {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        .view-all a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            display: flex;
            align-items: center;
        }

        .view-all a .fa-plus {
            margin-left: 10px;
        }

        /* Responsivitas */
        @media (max-width: 1024px) {
            .main-content {
                flex-direction: column;
            }

            .welcome-section {
                margin-bottom: 20px;
            }

            .album {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .logo h1 {
                font-size: 28px;
            }

            .nav {
                flex-direction: column;
                gap: 10px;
                margin-top: 20px;
            }

            .search-bar {
                justify-content: center;
            }

            .album {
                width: 100%;
            }

            .music-list table {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .logo h1 {
                font-size: 24px;
            }

            .search-bar input {
                max-width: 100%;
            }

            .music-list table {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="logo">
                <img src="https://drive.cimahikota.go.id/s/S55zfPXtcPmiB6X/download" alt="BeatBuddy Logo" width="50" height="50">
                <h2>BeatBuddy</h2>
            </div>
            <nav class="nav">
                <a href="/">Home</a>
                <!-- <a href="/nextup">Next Up</a> -->
                <a href="/music">Music</a>
            </nav>
        </header>
        <div class="search-bar">
            <input type="text" placeholder="Search for Music, Artists...">
        </div>
        <div class="main-content">
            <div class="welcome-section">
                <div class="background-image"></div>
                <div class="welcome-text">
                    <h2>Hi <span>user</span></h2>
                    <h3>Welcome to <span>BeatBuddy</span></h3>
                </div>
            </div>
            <div class="music-list">
                <h3>Music List</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Song</th>
                            <th>Album</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    //menampilkan list lagu sebanyak 4 item secara random
                    $arraySlice = $data['lagu'];
                    shuffle ($arraySlice);
                    $arraySlice = array_slice($arraySlice, 0, 4);
                    //echo $arraySlice;
                    ?>
                    @foreach ($arraySlice as $key => $value)
                        

                        <tr>
                            <td>
                                <div class="song-info">
                                    <!-- <img src="https://storage.googleapis.com/a1aa/image/RqJ9DxlIYKopNxfMyxwHlkJxmuH6Zs0ZdFGfCupW0TeOkcfPB.jpg" alt="Song Thumbnail"> -->
                                    <img src="{{$value['img']}}" alt="Song Thumbnail"> 
                                    <div>
                                        <div class="song-title">{{$value['nama_lagu']}}</div>
                                        @foreach ($data['artis'] as $key => $value_artis) 
                                            @if (($value_artis['id_artis'] === $value['id_artis'])) 
                                                <div class="song-album">{{$value_artis['nama_artis']}}</div>
                                                @break;
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </td>
                            <td>{{$value['albums']}}</td>
                            <td><i class="fas fa-heart"></i> {{$value['time']}}</td>
                        </tr>

                    @endforeach
                        
                        <!-- <tr>
                            <td>
                                <div class="song-info">
                                    <img src="https://storage.googleapis.com/a1aa/image/RqJ9DxlIYKopNxfMyxwHlkJxmuH6Zs0ZdFGfCupW0TeOkcfPB.jpg" alt="Song Thumbnail">
                                    <div>
                                        <div class="song-title">Sorforoe</div>
                                        <div class="song-album">The New Sound</div>
                                    </div>
                                </div>
                            </td>
                            <td>The New Sound</td>
                            <td><i class="fas fa-heart"></i> 3:26</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="song-info">
                                    <img src="https://storage.googleapis.com/a1aa/image/RqJ9DxlIYKopNxfMyxwHlkJxmuH6Zs0ZdFGfCupW0TeOkcfPB.jpg" alt="Song Thumbnail">
                                    <div>
                                        <div class="song-title">Sorforoe</div>
                                        <div class="song-album">The New Sound</div>
                                    </div>
                                </div>
                            </td>
                            <td>The New Sound</td>
                            <td><i class="fas fa-heart"></i> 3:26</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="song-info">
                                    <img src="https://storage.googleapis.com/a1aa/image/RqJ9DxlIYKopNxfMyxwHlkJxmuH6Zs0ZdFGfCupW0TeOkcfPB.jpg" alt="Song Thumbnail">
                                    <div>
                                        <div class="song-title">Sorforoe</div>
                                        <div class="song-album">The New Sound</div>
                                    </div>
                                </div>
                            </td>
                            <td>The New Sound</td>
                            <td><i class="fas fa-heart"></i> 3:26</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="top-albums">
            <h3>Top Artists</h3>
            <!-- menampilkan urutan artis teratas -->
            <div class="albums">
                @foreach ($data['artis'] as $key => $value)
                    <a href="/list/{{$value['id_artis']}}" class="album"> <!--memanggil semua lagu dari artis tsb -->
                    <!-- <img src="https://storage.googleapis.com/a1aa/image/Esv8crHmjE5sAJmdmWfpIU6l2tifhKC4fjtVRXNkVSUxGcfPB.jpg" alt="Adele 21 Album Cover"> -->
                    <img src={{$value['img']}} alt="Adele 21 Album Cover">
                    
                    <!--<p>Top {{$value['top']}}</p>-->
                    <p>{{$value['nama_artis']}}</p>
                @endforeach

                <!-- <a href="#" class="album">
                    <img src="https://storage.googleapis.com/a1aa/image/Esv8crHmjE5sAJmdmWfpIU6l2tifhKC4fjtVRXNkVSUxGcfPB.jpg" alt="Adele 21 Album Cover">
                    <p>Adele 21</p>
                    <p>{{$value['nama_artis']}}</p>
                </a>
                
                <a href="#" class="album">
                    <img src="https://storage.googleapis.com/a1aa/image/h8c48zrJ6ULfOazLxy2nozCBoQHUb4ZYpuzGbrOXzjCtB3fTA.jpg" alt="Scorpion Album Cover">
                    <p>Scorpion</p>
                    <p>Drake</p>
                </a>
                <a href="#" class="album">
                    <img src="https://storage.googleapis.com/a1aa/image/IB244meXLr01ZazkzdUBqRzgeKgJlRbT1jlS8r6A4hjXDufnA.jpg" alt="Harry's House Album Cover">
                    <p>Harry's House</p>
                    <p>Harry Styles</p>
                </a>
                <a href="#" class="album">
                    <img src="https://storage.googleapis.com/a1aa/image/B5Ig2FY7H34QPl1F7lkKlMq5wn7Wrw92CklpF0oEORu3g7fJA.jpg" alt="Born To Die Album Cover">
                    <p>Born To Die</p>
                    <p>Lana Del Rey</p>
                </a>
                <a href="#" class="album">
                    <img src="https://storage.googleapis.com/a1aa/image/2fWg3KR81z2xRyhy7veWlzBeFxeafJALSgeXheec6BNsfGcfPB.jpg" alt="All Quite On The Western Front Album Cover">
                    <p>All Quite On The..</p>
                    <p>The Libertines</p>
                </a>
                <a href="#" class="album">
                    <img src="https://storage.googleapis.com/a1aa/image/iKGg7YNqRBb9G5NZW8YyZYIgBeZuMC9NEw8IGxNJ4fGTDufnA.jpg" alt="Beauty Behind the Madness Album Cover">
                    <p>Beauty Behind the Madness</p>
                    <p>The Weeknd</p>
                </a> -->
            </div>
            <!--
            <div class="view-all">
                <a href="#">View All <i class="fas fa-plus"></i></a>
            </div>
    -->
        </div>
    </div>
</body>
</html>
