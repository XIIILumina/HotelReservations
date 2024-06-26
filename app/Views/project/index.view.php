<?php
require_once "../app/Views/Components/head.php";
require_once "../app/Views/Components/navbar.php";

// Iekļaujam projektu modeli


?>

<body class="bg-gray-100">
    <div class="h-full">
    <form id="searchForm" class="mb-4" method="POST" action="">
            <input type="text" name="searchInput" placeholder="Atrodi savu reservaciju" class="px-4 py-2 border border-gray-300 mr-2 rounded-lg">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Search</button>
        </form>

        <div class="container mx-auto mt-8">
            <h1 class="text-3xl font-bold mb-4">My reservations</h1>
            <p>Title must be between 4 and 100 characters</p>
            <p>Description must be between 10 and 255 characters</p>

            <!-- Form for adding new reservation -->
            <form method="POST" action="/reservation/create" class="mb-4">
                <div class="flex items-center">
                    <input type="text" name="Title" value="<?= $_POST["Title"] ?? null ?>" placeholder="reservation Name" class="px-4 py-2 border border-gray-300 mr-2 rounded-lg">
                    <input type="text" name="Description" value="<?= $_POST["Description"] ?? null ?>" placeholder="reservation Description" class="px-4 py-2 border border-gray-300 mr-2 rounded-lg">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Add reservation</button>
                </div>
                <?php
                if (isset($errors) && $errors != []) {
                    foreach ($errors as $error) {
                        echo "<p class='text-red-500'>$error</p>";
                    }
                }
                ?>
            </form>

            <!-- Display existing reservations -->
            <div class="mt-4">
                <h2 class="text-xl font-bold mb-2">Existing reservations:</h2>
            </div>
            <?php
            // Iegūstam visus projektus un tos attēlojam

            
            if (!empty($reservationss)) {
                foreach ($reservationss as $reservations) {
                    echo '<a href="/reservation/show?id=' . $reservations['reservationID'] . '">';
                    echo '<div class="p-4">';
                    echo '<div class="bg-white p-8 rounded-lg shadow-lg relative hover:shadow-2xl transition duration-500">';
                    echo '<h1 class="text-2xl text-gray-800 font-semibold mb-3">' . $reservations['Title'] . '</h1>';
                    echo '<p class="text-gray-600 leading-6 tracking-normal">' . $reservations['Description'] . '</p>';
  
                        echo "<ul>";
                        foreach ($reservations['Users'] as $user) {
                            echo '<form method="POST" action="/reservation/removeuser?id'. $reservations['reservationID'] .'" class="mb-2">';
                            echo "<li>{$user['Username']}</li>";
                            echo '<input type="hidden" name="reservation_id" value="' . $reservations['reservationID'] . '">';
                            echo '<input type="hidden" name="username" value="' . $user['Username'] . '">'; // Pievieno slēpto lauku ar lietotāja ID

                            echo '<button type="submit" class="text-red-500 hover:text-red-900 font-bold bg-transparent border-none">Noņemt user</button>';
                            echo '</form>';



                        }
                        echo "</ul>";

                    
                    // Pogas tiek pārkārtotas tā, lai katras pogas bloks būtu viens pēc otra vertikāli labajā augšējā stūrī
                    echo '<div class="flex flex-col-reverse items-end">';
                    echo '<form method="POST" action="/reservation/delete" class="mb-2">';
                    echo '<input type="hidden" name="reservation_id" value="' . $reservations['reservationID'] . '">';
                    echo '<button type="submit" class="text-red-500 hover:text-red-900 font-bold bg-transparent border-none">Delete</button>';
                    echo '</form>';
                    
                    echo '<form method="POST" action="/reservation/adduser?id=' . $reservations['reservationID'] . '" class="mb-2">';
                    echo '<input type="hidden" name="reservation_id" value="' . $reservations['reservationID'] . '">';
                    echo '<button type="submit" class="text-orange-500 hover:text-orange-700 font-bold bg-transparent border-none">Add User</button>';
                    echo '</form>';
                    
                    echo '<form method="POST" action="/reservation/edit">';
                    echo '<input type="hidden" name="reservation_id" value="' . $reservations['reservationID'] . '">';
                    echo '<button type="submit" class="text-green-600 hover:text-green-800 font-bold bg-transparent border-none">Edit</button>';
                    echo '</form>';
                    echo '</div>'; // Beidzas flex div
                    echo '</div>'; // Beidzas p-8 div
                    echo '</div>'; // Beidzas p-4 div
                    echo '</a>';
                }
            
            } else {
                echo '<h2>No reservations found</h2>';
            }
            
            
            
            
            ?>
        </div>

    </div>

</body>

<?php require_once "../app/Views/Components/footer.php"; ?>
