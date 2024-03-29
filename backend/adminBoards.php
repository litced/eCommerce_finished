<?php

include "../view/includes/header.php";
require_once "../vendor/autoload.php";
include_once "../src/config/instance.php";

use src\config\instance;

$connector = $connection->conn();
$stmn = $connector->prepare("SELECT * FROM workers");
$stmn->execute();

$ssm = $connector->prepare("SELECT * FROM products");
$ssm->execute();

$zzm = $connector->prepare("SELECT * FROM users");
$zzm->execute();

$orders = $connector->prepare("SELECT * FROM orders");
$orders->execute();

$category = $connector->prepare("SELECT * FROM category");
$category->execute();

?>
<div class="main-panel" style="margin: 1%;">
   <div class="content-wrapper">
      <div class="row">

         <!-- Product Table -->
         <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">Product(s)</h4>
                  <table id="tableproduct">
                     <thead>
                        <tr>
                           <td>Select</td>
                           <td>Product_id</td>
                           <td>picture</td>
                           <td>Product_Name</td>
                           <td>Quantity</td>
                           <td>Description</td>
                           <td>Price</td>
                        </tr>
                     </thead>
                     <tbody>

                        <?php foreach ($ssm as $fetch) : ?>
                           <tr>
                              <td>
                                 <form method="post" id="workerremover">
                                    <button name="inforemover" class="removeproduct" href="<?php echo $fetch["idp"]; ?>">Delete</button>
                                 </form>
                              </td>
                              <td><?= $fetch["idp"] ?></td>
                              <td><img src="../products/<?= $fetch["pictures"] ?>" height="50px" width="50px"></td>
                              <td><?= $fetch["pname"] ?></td>
                              <td><?= $fetch["quantity"] ?></td>
                              <td><?= $fetch["descriptions"] ?></td>
                              <td><?= $fetch["price"] ?></td>

                           </tr>

                        <?php endforeach; ?>

                     </tbody>
                  </table>
                  <div class="productbuttons">
                     <button onclick="OpenModal()">Add</button>
                     <button>Update</button>
                  </div>
               </div>
            </div>
         </div>

         <!-- Orders Table -->
         <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">Customer(s)</h4>
                  <table>
                     <table>
                        <thead>
                           <tr>
                              <td>Id</td>
                              <td>Firstname</td>
                              <td>Lastname</td>
                              <td>Username</td>
                              <td>Roles</td>
                              <td>action</td>

                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($zzm as $fetch) : ?>
                              <tr>
                                 <td><?= $fetch["id"]; ?></td>
                                 <td><?= $fetch["firstname"]; ?></td>
                                 <td><?= $fetch["lastname"]; ?></td>
                                 <td><?= $fetch["username"]; ?></td>
                                 <td><?= $fetch["roles"]; ?></td>
                                 <td>
                                    <div class="productbuttons">
                                       <button class="update_button" onclick="OpenUpdateModal()">Update</button>
                                    </div>
                                 </td>


                              </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  </table>
                  <canvas id="barChart" style="height:230px"></canvas>
               </div>
            </div>
         </div>

         <!-- Worker Table -->
         <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">Worker(s)</h4>
                  <table id="tableuser">
                     <thead>
                        <tr>
                           <td>action</td>
                           <td>Id</td>
                           <td>Firstname</td>
                           <td>Lastname</td>
                           <td>Username</td>
                           <td>Role</td>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($stmn as $fetch) : ?>
                           <tr>
                              <td>
                                 <form method="post" id="workerremover">
                                    <button name="inforemover" class="removeuser" href="<?php echo $fetch["id"]; ?>">Delete</button>
                                 </form>
                              </td>
                              <td><?= $fetch["id"]; ?></td>
                              <td><?= $fetch["firstname"]; ?></td>
                              <td><?= $fetch["lastname"]; ?></td>
                              <td><?= $fetch["username"]; ?></td>
                              <td><?= $fetch["roles"]; ?></td>

                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
                  <div class="productbuttons">
                     <button onclick="OpenModalworker()">Add</button>
                     <button>Update</button>
                  </div>
               </div>
            </div>
         </div>

         <!-- order Table -->
         <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">Order(s)</h4>
                  <table>
                     <thead>
                        <tr>
                           <td>order_id</td>
                           <td>productId</td>
                           <td>Order_date</td>
                           <td>Quantity</td>
                           <td>Price</td>
                           <td>Total</td>
                           <td>Method</td>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($orders as $fetch) : ?>
                           <tr>
                              <td><?= $fetch["order_id"] ?></td>
                              <td><?= $fetch["productId"] ?></td>
                              <td><?= $fetch["order_date"] ?></td>
                              <td><?= $fetch["productQuantity"] ?>pces</td>
                              <td><?= $fetch["productPrice"] ?>$</td>
                              <td><?= $fetch["total"] ?>$</td>
                              <td><?= $fetch["method"] ?></td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <!-- Category Table -->
         <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">Categori(s)</h4>
                  <table>
                     <thead>
                        <tr>
                           <td>Id</td>
                           <td>Category_name</td>
                           <td>Creation_date</td>

                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($category as $fetch) : ?>
                           <tr>
                              <td><?= $fetch["-category"] ?></td>
                              <td><?= $fetch["category_name"] ?></td>
                              <td><?= $fetch["CREATED_AT"] ?></td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
                  <div class="productbuttons">
                     <button onclick="OpenModalCategory()">Add</button>
                     <button>Update</button>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
</div>


<!-- ------------------------CATEGORY MODAL--------------------- -->
<div id="windowCategory" onclick="CloseCategoryModal()"></div>
<div id="modalCategory">
   <span class="close" onclick="CloseCategoryModal()">&times;</span>



   <form method="post" action="" id="addcategory">
      <div id="body-modal"></div>
      <div class="ModalTitle">
         <h2>Add Category</h2>
      </div>
      <div class="UpdateForm">
         <input type="text" class="UpdateCon" name="Categoryname" id="categorynams" placeholder="Name of the Category" value="">
      </div>
      <div id="modalbuttons">
         <input type="submit" class="ModalButtonSave" value="save">
      </div>

   </form>

</div>

<!-- -----------------------ADDING WORKER MODAL----------------------- -->
<div id="windowworker" onclick="CloseModalworker()"></div>
<div id="modalworker">
   <span class="close" onclick="CloseModalworker()">&times;</span>



   <form method="post" action="" id="addworker">
      <div id="body-modal"></div>
      <div class="ModalTitle">
         <h2>Add Workers</h2>
      </div>
      <div class="UpdateForm">
         <input type="text" class="UpdateCon" name="firstname" id="productnames" placeholder="firstname" value="">
      </div>
      <div class="UpdateForm">
         <input type="text" class="UpdateCon" name="lastname" id="productquans" placeholder="lastname">
      </div>
      <div class="UpdateForm">
         <input type="text" class="UpdateCon" name="username" id="productprices" placeholder="username">
      </div>
      <div id="modalbuttons">
         <input type="submit" class="ModalButtonSave" value="save">
      </div>



      <!-- -----------------------ADDING PRODUCT MODAL----------------------- -->
      <div id="window" onclick="CloseModal()"></div>
      <div id="modal">
         <span class="close" onclick="CloseModal()">&times;</span>



         <form method="post" action="" id="addproduct">
            <div id="body-modal"></div>
            <div class="ModalTitle">
               <h2>Add Products</h2>
            </div>
            <div class="UpdateForm">
               <input type="text" class="UpdateCon" name="productname" id="productnames" placeholder="Name of the product" value="">
            </div>
            <div class="UpdateForm">
               <input type="text" class="UpdateCon" name="productquan" id="productquans" placeholder="The amount available">
            </div>
            <div class="UpdateForm">
               <input type="text" class="UpdateCon" name="productprice" id="productprices" placeholder="The Product Price">
            </div>
            <div class="UpdateForm">
               <input type="text" class="UpdateCon" name="productdescr" id="productdes" placeholder="Description">
            </div>
            <label for="productimg">Product Img</label>
            <input type="file" name="productImg" id="productimg" value="Img of the product">

            <div id="modalbuttons">
               <input type="submit" class="ModalButtonSave" value="save">
            </div>

         </form>

      </div>

      <!-- -----------------------ADDING WORKER MODAL----------------------- -->
      <div id="windowworker" onclick="CloseModalworker()"></div>
      <div id="modalworker">
         <span class="close" onclick="CloseModalworker()">&times;</span>



         <form method="post" action="" id="addworker">
            <div id="body-modal"></div>
            <div class="ModalTitle">
               <h2>Add Workers</h2>
            </div>
            <div class="UpdateForm">
               <input type="text" class="UpdateCon" name="firstname" id="productnames" placeholder="firstname" value="">
            </div>
            <div class="UpdateForm">
               <input type="text" class="UpdateCon" name="lastname" id="productquans" placeholder="lastname">
            </div>
            <div class="UpdateForm">
               <input type="text" class="UpdateCon" name="username" id="productprices" placeholder="username">
            </div>


            <label for="roles">Roles</label>
            <select name="roles" id="role">
               <option value="Worker">Worker</option>
               <option value="Admin">Admin</option>
            </select>

            <div id="modalbuttons">
               <input type="submit" class="ModalButtonSave" value="save">
            </div>

         </form>

      </div>
      <!-- -----------------------CUSTOMER/ADMIN UPDATE MODAL----------------------- -->
      <div id="updateusermodalwindow" onclick="CloseModalupdate()"></div>
      <div id="updateusermodal">
         <span class="close" onclick="CloseModalupdate()">&times;</span>



         <form method="post" id="update_user" class="needs-validation" novalidate>
            <div class="ModalTitle">
               <h2>Update User</h2>
            </div>
            <div class="modal-body">
               <div class="form-group" style="display: none;">
                  <input type="text" class="form-control" name="id" id="theid" placeholder="the_id" value="" required>
               </div>
               <div class="form-group">
                  <label for="productnames">First Name</label>
                  <input type="text" class="form-control" name="firstname" id="upfirstname" placeholder="First Name" value="" required>
                  <div class="invalid-feedback">
                     Please enter a first name.
                  </div>
               </div>

               <div class="form-group">
                  <label for="productquans">Last Name</label>
                  <input type="text" class="form-control" name="lastname" id="uplastname" placeholder="Last Name" required>
                  <div class="invalid-feedback">
                     Please enter a last name.
                  </div>
               </div>

               <div class="form-group">
                  <label for="productprices">Username</label>
                  <input type="text" class="form-control" name="username" id="upusername" placeholder="Username" required>
                  <div class="invalid-feedback">
                     Please enter a username.
                  </div>
               </div>

               <div class="form-group">
                  <label for="role">Roles</label>
                  <select class="form-control" name="roles" id="Uprole" required>
                     <option value="customer">customer</option>
                     <option value="admin">Admin</option>
                  </select>
                  <div class="invalid-feedback">
                     Please select a role.
                  </div>
               </div>
            </div>

            <div class="modal-footer buttonsupdate">
               <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="CloseModalupdate()">Close</button>
               <input type="submit" class="btn btn-primary" value="Save">
            </div>
         </form>


      </div>





      <script>
         function OpenModal() {
            $("#window").fadeIn(300);
            $("#modal").fadeIn(300)
         }

         function CloseModal() {
            $("#window").fadeOut(300)
            $("#modal").fadeOut(300, function() {
               $(this).hide();
            })

         }

         // ----------------------- WORKER MODAL------------------------

         function OpenModalworker() {
            $("#windowworker").fadeIn(300);
            $("#modalworker").fadeIn(300)
         }

         function CloseModalworker() {
            $("#windowworker").fadeOut(300)
            $("#modalworker").fadeOut(300, function() {
               $(this).hide();
            })

         }
         // ---------------------------UPDATE MODAL--------------------------
         function OpenUpdateModal() {
            $("#updateusermodalwindow").fadeIn(300);
            $("#updateusermodal").fadeIn(300)
         }

         function CloseModalupdate() {
            $("#updateusermodalwindow").fadeOut(300)
            $("#updateusermodal").fadeOut(300, function() {
               $(this).hide();
            })

         }
         // ---------------------------CATEGORY MODAL--------------------------
         function OpenModalCategory() {
            $("#windowCategory").fadeIn(300);
            $("#modalCategory").fadeIn(300)
         }

         function CloseCategoryModal() {
            $("#windowCategory").fadeOut(300)
            $("#modalCategory").fadeOut(300, function() {
               $(this).hide();
            })

         }


         $(document).ready(function() {
            let $updatebutton = $(".update_button")
            $updatebutton.on('click', function() {
               let row = $(this).closest('tr');
               let id = row.find('td:eq(0)').text();
               let firstname = row.find('td:eq(1)').text();
               let lastname = row.find('td:eq(2)').text();
               let username = row.find('td:eq(3)').text();
               let role = row.find('td:eq(4)').text();

               $("#upfirstname").val(firstname);
               $("#uplastname").val(lastname);
               $("#upusername").val(username);
               $("#Uprole").val(role);
               $("#theid").val(id);

            })
         })
      </script>

      </html>