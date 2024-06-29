<div class="customer-details">
    <form method="POST" class="d-flex justify-content-end gap-2 py-4">
        <input type="text" placeholder="Search" class="form-control w-25" name="customerSearchInput" autocomplete="off" spellcheck="false">
        <button class="btn btn-primary customerSearchBtn" name="customerSearchBtn">Search</button>
    </form>
    <table id="customer-table-data" class="table table-striped table-hover align-middle table-bordered customer-table-data">
        <thead>
            <tr>
                <th style="width: 80px;" class="text-center">S.N.</th>
                <th style="width: 150px;">Customer ID</th>
                <th>Customer Name</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include "config/database.php";

                if(isset($_POST['customerSearchBtn'])){
                    $customerSearchInput = $_POST['customerSearchInput']; 
                    $searchQuery = mysqli_query($database, "SELECT * FROM `customers` WHERE firstname LIKE '%{$customerSearchInput}%' ");
                    if($searchQuery){
                        while($res = mysqli_fetch_assoc($searchQuery)){
                            echo "<tr>";
                            echo "<td class='text-center'>{$res['id']}</td>";
                            echo "<td>{$res['customer_id']}</td>";
                            echo "<td>{$res['firstname']} {$res['lastname']}</td>";
                            echo "<td>{$res['phonenumber']}</td>";
                            echo "<td>{$res['address']}</td>";
                            echo "<td><img src='src/img/view.svg'></td>";
                            echo "</tr>";
                        }
                    } else{
                        echo "No Data Found";
                    }
                }
                else{
                    $connQuery = mysqli_query($database, "SELECT * FROM `customers`");

                    if($connQuery){
                        while($dataRow = mysqli_fetch_assoc($connQuery)){
                            echo "<tr>";
                            echo "<td class='text-center'>{$dataRow['id']}</td>";
                            echo "<td>{$dataRow['customer_id']}</td>";
                            echo "<td>{$dataRow['firstname']} {$dataRow['lastname']}</td>";
                            echo "<td>{$dataRow['phonenumber']}</td>";
                            echo "<td>{$dataRow['address']}</td>";
                            echo "<td><img src='src/img/view.svg'></td>";
                            echo "</tr>";
                        }
                    }
                }
            ?>
        </tbody>
    </table>
</div>