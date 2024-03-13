<?php
session_start();

include 'connectdatabase.php';
if (!isset($_SESSION['login'])) {
    header("Location: ./login.php");
}
// class MyDB extends SQLite3
// {
//     function __construct()
//     {
//         $this->open('../Academic/database/education.db');
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

</head>

<body class="bg-[#AFDAFF] flex flex-col w-full min-h-screen">
    <div id="navbar-container"></div>
    <div id="sidenav-container"></div>
    <div class="container mx-auto ml-80">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold mt-16">การบ้านทั้งหมด</h1>

        </div>
        <?php
        // var_dump($_SESSION);
        $user_id = $_SESSION['student_id'];
        $sql = "SELECT * FROM submission
                    INNER JOIN assignment ON assignment.assignment_id = submission.assignment_id
                    WHERE student_id = $user_id";
        $result = $db->query($sql);



        if ($result) {

            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        ?>
                <a href="userassignmentpage.php?assignment_id=<?= $row['assignment_id'] ?>">
                    <div class="bg-white shadow-md rounded-lg p-4 my-4">
                        <div class="border-b border-gray-200 pb-4 mb-4">
                            <h2 class="text-lg font-semibold">
                                <?php echo $row['assignment_title']; ?>
                            </h2>
                        </div>
                        <div class="text-sm text-gray-700">
                            <p class="mb-2">Description:
                                <?php echo $row['description']; ?>
                            </p>
                            <p class="mb-2">Start Date:
                                <?php echo $row['start_date']; ?>
                            </p>
                            <p class="mb-2">Due Date:
                                <?php echo $row['due_date']; ?>
                            </p>
                            <p class="mb-2">Total Score:
                                <?php echo $row['total_score']; ?>
                            </p>
                        </div>
                    </div>
                </a>
        <?php
            }
        } else {
            // If no assignments are found
            echo "No assignments found.";
        }

        // Close the database connection

        ?>

    </div>
    </main>










    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script type="module" src="./components.js"></script>

</body>

</html>