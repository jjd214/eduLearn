<?php 
class View extends Config {

    public function applicants() {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `application-form_tbl`");
        $stmt->execute();
        $datas = $stmt->fetchAll();
    
        $itemsPerPage = 10; 
        $totalItems = count($datas); 
        $totalPages = ceil($totalItems / $itemsPerPage);
    
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $currentPage = max(1, min($_GET['page'], $totalPages));
        } else {
            $currentPage = 1;
        }
    
        $offset = ($currentPage - 1) * $itemsPerPage;
        $data = array_slice($datas, $offset, $itemsPerPage); 
    
        echo "<div class='container text-center'>";
        echo "<table class='table table-bordered table-hover data-table caption-top'>";
        echo "<caption>List of applicants</caption>";
        echo "<thead>
                <tr>
                    <th>#</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Position</th>
                    <th>Action</th>
                </tr>
              </thead><tbody>";
    
        $count = 1;
        foreach ($data as $data) {
            echo "<tr>";
            echo "<td>$count</td>";
            echo "<td>N/A</td>";
            echo "<td>{$data['firstname']} {$data['lastname']}</td>";
            echo "<td>{$data['gender']}</td>";
            echo "<td>{$data['email']}</td>";
            echo "<td>{$data['age']}</td>";
            echo "<td>{$data['position']}</td>";
            echo "<td>
                    <form action='accept-application.php' method='post'>
                        <input type='hidden' name='id' value='{$data['id']}'>
                        <button type='submit' name='submit' class='btn btn-success btn-sm'>
                            Accept
                        </button>
                    </form>
                </td>";
            echo "</tr>";
            echo "</tr>";
            $count++;
        }

        echo "</tbody></table>";

        // Add the pagination
        echo "<nav aria-label='Page navigation example'>";
        echo "<ul class='pagination justify-content-end'>";
        
        // Previous page link
        if ($currentPage > 1) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage - 1) . "'>Previous</a></li>";
        } else {
            echo "<li class='page-item disabled'><a class='page-link'>Previous</a></li>";
        }

        // Numbered page links
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $currentPage) {
                echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
            }
        }

        // Next page link
        if ($currentPage < $totalPages) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage + 1) . "'>Next</a></li>";
        } else {
            echo "<li class='page-item disabled'><a class='page-link'>Next</a></li>";
        }

        echo "</ul>";
        echo "</nav>";
        echo "</div>";
    }

}

?>