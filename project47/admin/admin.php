<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="bar1">
        <div class="box1">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="box2">
            Rean Web
        </div>
        <div class="box3">
            <span>
                makmach1122@gmail.com
            </span>
            <i class="fa-solid fa-right-from-bracket"></i>
        </div>
    </div>
    <div class="left-menu">
        <ul>
            <li>
                <a>
                    <i class="fa-solid fa-user-gear"></i>
                    <span>
                        System
                    </span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="">User</a>
                    </li>
                </ul>
            </li>
            <li>
                <a>
                    <i class="fa-solid fa-plus"></i>
                    <span>
                        Setup
                    </span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="">Category</a>
                    </li>
                    <li>
                        <a href="">News</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="bar2">
            <div class="box1">
                <div class="btnAdd">
                    <i class="fa-solid fa-plus"></i>
                    Add
                </div>
                <div class="search-box">
                    <input type="text" placeholder="Search">
                    <select name="" id="">
                        <option value="">--Select--</option>
                        <option value="">Category</option>
                        <option value="">News</option>
                    </select>
                    <div class="btnSearch">
                        <i class="fa-solid fa-search"></i>
                    </div>
                </div>
            </div>
            <div class="box1">
                <ul>
                    <li>
                        <select name="" id="">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                        </select>
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-left"></i>
                    </li>
                    <li>
                        2 / 2 of 16
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                </ul>
            </div>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Product 1</td>
                <td>100</td>
                <td>Active</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Product 2</td>
                <td>200</td>
                <td>Active</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Product 3</td>
                <td>300</td>
                <td>Active</td>
            </tr>
        </table>
    </div>
</body>

</html>