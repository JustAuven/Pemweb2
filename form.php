<?php
session_start();

$timeout = 60;

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $timeout)) {
    session_unset();  
    session_destroy(); 
    header("Location: login.php?message=session_expired"); 
    exit();
}

$_SESSION['LAST_ACTIVITY'] = time();

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-600 to-purple-800 p-6">
    <div class="bg-white w-[420px] p-8 rounded-xl shadow-lg text-gray-800">
        <h1 class="font-semibold text-3xl text-center mb-6">Biodata</h1>
        <form action="cv.php" method="post" class="space-y-4" enctype="multipart/form-data">
            <div>
                <label for="nama" class="block font-semibold">Nama</label>
                <input class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" id="nama" name="nama" required autocomplete="off">
            </div>
            <div>
                <label for="ttl" class="block font-semibold">Tempat & Tanggal Lahir</label>
                <input class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" id="ttl" name="ttl" required autocomplete="off">
            </div>
            <div>
                <label for="SMA" class="block font-semibold">Pendidikan SMA</label>
                <input class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" id="SMA" name="SMA" required autocomplete="off">
            </div>
            <div>
                <label for="pendidikan" class="block font-semibold">Pendidikan Sekarang</label>
                <input class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" id="pendidikan" name="pendidikan" required autocomplete="off">
            </div>
            <div>
                <label for="deskripsi" class="block font-semibold">Deskripsi Diri</label>
                <input class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" id="deskripsi" name="deskripsi" required autocomplete="off">
            </div>
            <div>
                <label for="kontak" class="block font-semibold">Kontak</label>
                <input class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" id="kontak" name="kontak" required autocomplete="off">
            </div>
            <div>
                <label for="sosmed" class="block font-semibold">Instagram</label>
                <input class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" id="sosmed" name="sosmed" required autocomplete="off">
            </div>
	     <div>
       		 <label for="input_foto" class="block font-semibold">Upload Foto</label>
       		 <input type="file" name="input_foto" id="input_foto" class="w-full file:bg-white file:text-Primary file:font-semibold file:p-2 file:rounded-xl file:mr-2 hover:file:bg-gray-200">
  	     </div>
            <input class="w-full h-[45px] bg-blue-600 text-white rounded-md font-bold cursor-pointer hover:bg-blue-700 transition" type="submit" name="submit" value="Submit">
        </form>
        
        <form method="post" class="mt-4">
            <button type="submit" name="logout" class="w-full h-[45px] bg-red-600 text-white rounded-md font-bold cursor-pointer hover:bg-red-700 transition">
                Logout
            </button>
        </form>
    </div>
</body>
</html>
